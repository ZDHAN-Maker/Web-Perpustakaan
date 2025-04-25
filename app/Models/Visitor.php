<?php

// app/Models/Visitor.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'member_id',
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'registration_date',
        'expiration_date',
        'status',
        'photo'
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
