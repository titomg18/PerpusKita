<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
     * Relasi ke Denda
     */
    public function fine(): HasOne
    {
        return $this->hasOne(Fine::class);
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
        switch ($this->status) {
            case 'dipinjam':
                return 'Sedang Dipinjam';
            case 'request_return':
                return 'Menunggu Persetujuan';
            case 'dikembalikan':
                return 'Dikembalikan';
            default:
                return ucfirst($this->status ?? '');
        }
    }

    /**
     * Accessor untuk warna status
     */
    public function getStatusColorAttribute(): string
    {
        switch ($this->status) {
            case 'dipinjam':
                return 'bg-blue-100 text-blue-800';
            case 'request_return':
                return 'bg-amber-100 text-amber-800';
            case 'dikembalikan':
                return 'bg-gray-100 text-gray-800';
            default:
                return 'bg-gray-100 text-gray-800';
        }
    }
}
