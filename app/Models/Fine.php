<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'days_late',
        'fine_amount',
        'status',
    ];

    /**
     * Relasi ke Peminjaman
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    /**
     * Scope untuk pencarian berdasarkan peminjam atau buku
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->whereHas('loan', function($q) use ($keyword) {
            $q->search($keyword);
        });
    }
}
