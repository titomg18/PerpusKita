<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use App\Models\Fine;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Menampilkan daftar peminjaman
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        
        $loans = Loan::with(['user', 'book'])
            ->when($keyword, function($query) use ($keyword) {
                return $query->search($keyword);
            })
            ->latest()
            ->paginate(10);

        return view('admin.loans', compact('loans'));
    }

    /**
     * Menyimpan data peminjaman baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock <= 0) {
            return back()->with('error', 'Stok buku habis.');
        }

        $loanDate = Carbon::now();
        $dueDate = $loanDate->copy()->addDays(7);

        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => $loanDate->toDateString(),
            'due_date' => $dueDate->toDateString(),
            'status' => 'dipinjam',
        ]);

        // Kurangi stok buku
        $book->decrement('stock');

        return redirect()->route('admin.loans.index')
            ->with('success', 'Peminjaman berhasil didaftarkan. Batas pengembalian: ' . $dueDate->format('d/m/Y'));
    }

    /**
     * Proses pengembalian buku
     */
    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);

        if ($loan->status === 'dikembalikan') {
            return back()->with('error', 'Buku sudah dikembalikan sebelumnya.');
        }

        $returnDate = Carbon::now();
        $loan->update([
            'return_date' => $returnDate->toDateString(),
            'status' => 'dikembalikan',
        ]);

        $this->calculateFine($loan, $returnDate);

        // Tambah stok buku kembali
        $loan->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan.');
    }

    /**
     * Approve a user's return request (admin)
     */
    public function approveReturn($id)
    {
        $loan = Loan::findOrFail($id);

        if ($loan->status !== 'request_return') {
            return back()->with('error', 'Tidak ada permintaan pengembalian untuk peminjaman ini.');
        }

        $returnDate = Carbon::now();
        $loan->update([
            'status' => 'dikembalikan',
            'return_date' => $returnDate->toDateString(),
        ]);

        $this->calculateFine($loan, $returnDate);

        $loan->book->increment('stock');

        return back()->with('success', 'Permintaan pengembalian disetujui. Buku dikembalikan.');
    }

    /**
     * Reject a user's return request (admin)
     */
    public function rejectReturn($id)
    {
        $loan = Loan::findOrFail($id);

        if ($loan->status !== 'request_return') {
            return back()->with('error', 'Tidak ada permintaan pengembalian untuk peminjaman ini.');
        }

        $loan->update([
            'status' => 'dipinjam',
        ]);

        return back()->with('success', 'Permintaan pengembalian ditolak. Status kembali ke dipinjam.');
    }

    /**
     * Menghapus data peminjaman
     */
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        
        // Jika status masih dipinjam, kembalikan stok buku sebelum hapus
        if ($loan->status === 'dipinjam') {
            $loan->book->increment('stock');
        }
        
        $loan->delete();

        return back()->with('success', 'Data peminjaman berhasil dihapus.');
    }

    /**
     * API untuk pencarian user (dropdown)
     */
    public function getUsers(Request $request)
    {
        $keyword = $request->get('q');
        $users = User::where('role', 'user')
            ->where('name', 'like', "%{$keyword}%")
            ->limit(10)
            ->get(['id', 'name']);
        
        return response()->json($users);
    }

    /**
     * API untuk pencarian buku (dropdown)
     */
    public function getBooks(Request $request)
    {
        $keyword = $request->get('q');
        $books = Book::where('stock', '>', 0)
            ->where('title', 'like', "%{$keyword}%")
            ->limit(10)
            ->get(['id', 'title', 'stock']);
        
        return response()->json($books);
    }

    /**
     * Helper untuk menghitung denda
     */
    private function calculateFine($loan, $returnDate)
    {
        $dueDate = Carbon::parse($loan->due_date);
        
        if ($returnDate->gt($dueDate)) {
            $daysLate = $returnDate->diffInDays($dueDate);
            $finePerDay = 1000; // Bisa disesuaikan
            $totalFine = $daysLate * $finePerDay;

            Fine::create([
                'loan_id' => $loan->id,
                'days_late' => $daysLate,
                'fine_amount' => $totalFine,
                'status' => 'belum dibayar',
            ]);
        }
    }
}
