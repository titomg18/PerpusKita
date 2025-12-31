<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar denda untuk user yang sedang login
     */
    public function index()
    {
        $fines = Fine::with(['loan.book'])
            ->whereHas('loan', function($q) {
                $q->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('fines', compact('fines'));
    }

    /**
     * Tandai denda sebagai dibayar oleh user (simple flow)
     */
    public function pay($id)
    {
        $fine = Fine::findOrFail($id);

        // pastikan milik user atau admin bisa
        if ($fine->loan->user_id !== auth()->id()) {
            abort(403);
        }

        $fine->update(['status' => 'dibayar']);

        return back()->with('success', 'Terima kasih — denda Anda sudah ditandai dibayar.');
    }
}
