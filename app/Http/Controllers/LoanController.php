<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $loans = Loan::with('book')
            ->where('user_id', $user->id)
            ->orderBy('loan_date', 'desc')
            ->get();

        return view('loans', compact('loans'));
    }

    /**
     * User requests to return a book — set status to request_return
     */
    public function requestReturn($id, Request $request)
    {
        $user = $request->user();
        $loan = Loan::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        if ($loan->status !== 'dipinjam') {
            return back()->with('error', 'Status peminjaman tidak bisa dikembalikan saat ini.');
        }

        $loan->update([
            'status' => 'request_return'
        ]);

        return back()->with('success', 'Permintaan pengembalian dikirim. Menunggu persetujuan admin.');
    }
}
