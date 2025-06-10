<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'book_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'stock',
        'cover_image',
    ];

    /**
     * Get the loans for the book.
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'book_id', 'book_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        // This event runs right before a new book is created.
        static::creating(function (Book $book) {
            // It generates a URL-friendly slug from the book's title.
            // e.g., "The Lord of the Rings" becomes "the-lord-of-the-rings"
            $book->slug = Str::slug($book->title);
        });

        // This event runs right before an existing book is updated.
        static::updating(function (Book $book) {
            // We only want to re-generate the slug if the title has changed.
            if ($book->isDirty('title')) {
                $book->slug = Str::slug($book->title);
            }
        });
    }
}
