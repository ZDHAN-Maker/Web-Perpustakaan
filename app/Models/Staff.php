<?php

// app/Models/Staff.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'join_date',
        'photo'
    ];

    public function returnBooks()
    {
        return $this->hasMany(ReturnBook::class);
    }
}
