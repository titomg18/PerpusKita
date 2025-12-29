<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'loan_date',
        'due_date',
        'return_date',
        'status',
    ];

    protected $casts = [
        'loan_date' => 'date',
        'due_date' => 'date',
        'return_date' => 'date',
    ];

    /**
     * Relasi ke User (Peminjam)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Buku
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Scope untuk pencarian
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->whereHas('user', function($q) use ($keyword) {
            $q->where('name', 'like', "%{$keyword}%");
        })->orWhereHas('book', function($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%");
        });
    }

    /**
     * Accessor untuk label status
     */
    public function getStatusLabelAttribute(): string
    {
        return $this->status === 'dipinjam' ? 'Sedang Dipinjam' : 'Sudah Dikembalikan';
    }

    /**
     * Accessor untuk warna status
     */
    public function getStatusColorAttribute(): string
    {
        return $this->status === 'dipinjam' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800';
    }
}
