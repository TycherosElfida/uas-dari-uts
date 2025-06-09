<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    // We explicitly set the table name because Laravel would guess "photo_galleries"
    // but our migration created "photo_galleries_table", so we make sure they match.
    // Actually, the migration was named create_photo_galleries_table but the table
    // it created was `photo_galleries`, so this line is not strictly needed but good to know.
    // protected $table = 'photo_galleries';


    protected $fillable = [
        'title',
        'description',
        'image_path',
        'display_order',
    ];
}
