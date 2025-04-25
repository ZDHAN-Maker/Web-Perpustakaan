<?php

// app/Models/Borrowing.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'borrow_code',
        'visitor_id',
        'book_id',
        'borrow_date',
        'due_date',
        'return_date',
        'fine',
        'status',
        'notes'
    ];

    protected $dates = ['borrow_date', 'due_date', 'return_date'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function returnBook()
    {
        return $this->hasOne(ReturnBook::class);
    }
}
