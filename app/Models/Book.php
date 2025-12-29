<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'publisher',
        'year',
        'stock',
    ];

    protected $casts = [
        'year' => 'integer',
        'stock' => 'integer',
    ];

    /**
     * Relasi ke kategori
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope untuk pencarian
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('author', 'like', "%{$keyword}%")
                    ->orWhere('publisher', 'like', "%{$keyword}%")
                    ->orWhereHas('category', function($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    });
    }

    /**
     * Accessor untuk status stok
     */
    public function getStockStatusAttribute(): string
    {
        if ($this->stock > 10) {
            return 'Tersedia Banyak';
        } elseif ($this->stock > 0) {
            return 'Tersedia';
        } else {
            return 'Habis';
        }
    }

    /**
     * Accessor untuk warna status stok
     */
    public function getStockStatusColorAttribute(): string
    {
        if ($this->stock > 10) {
            return 'bg-green-100 text-green-800';
        } elseif ($this->stock > 0) {
            return 'bg-blue-100 text-blue-800';
        } else {
            return 'bg-red-100 text-red-800';
        }
    }
}