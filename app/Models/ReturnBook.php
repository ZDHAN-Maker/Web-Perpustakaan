<?php

// app/Models/ReturnBook.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    protected $fillable = [
        'borrowing_id',
        'staff_id',
        'return_date',
        'fine',
        'notes'
    ];

    protected $dates = ['return_date'];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
