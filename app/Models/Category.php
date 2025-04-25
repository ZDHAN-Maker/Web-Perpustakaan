<?php

// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Category.php
    protected $fillable = ['nama_kategori', 'deskripsi'];


    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
