<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    /**
     * Menampilkan daftar denda
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        
        $fines = Fine::with(['loan.user', 'loan.book'])
            ->when($keyword, function($query) use ($keyword) {
                return $query->search($keyword);
            })
            ->latest()
            ->paginate(10);

        // Hitung statistik untuk dashboard denda
        $totalFinesAmount = Fine::sum('fine_amount');
        $unpaidCount = Fine::where('status', 'belum dibayar')->count();
        $paidCount = Fine::where('status', 'dibayar')->count();

        return view('admin.fines', compact('fines', 'totalFinesAmount', 'unpaidCount', 'paidCount'));
    }

    /**
     * Tandai denda sebagai dibayar
     */
    public function markAsPaid($id)
    {
        $fine = Fine::findOrFail($id);
        
        $fine->update([
            'status' => 'dibayar'
        ]);

        return back()->with('success', 'Denda berhasil ditandai sebagai lunas.');
    }

    /**
     * Menghapus data denda
     */
    public function destroy($id)
    {
        $fine = Fine::findOrFail($id);
        $fine->delete();

        return back()->with('success', 'Data denda berhasil dihapus.');
    }
}
