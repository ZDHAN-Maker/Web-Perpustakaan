<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'isbn', 'title', 'author', 'publisher', 'publication_year',
        'page_count', 'stock', 'shelf_location', 'description',
        'cover_image', 'status'
    ];

    protected $casts = [
        'publication_year' => 'integer',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}