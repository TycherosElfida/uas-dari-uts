<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the user (admin) who wrote the article.
     */
    public function author(): BelongsTo
    {
        // We can explicitly name the foreign key 'user_id' if we want to be clear
        return $this->belongsTo(User::class, 'user_id');
    }
}
