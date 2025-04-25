<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Staff;
use App\Models\Visitor;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\ReturnBook;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'categoryCount' => Category::count(),
            'staffCount' => Staff::count(),
            'visitorCount' => Visitor::count(),
            'borrowingCount' => Borrowing::count(),
            'booksCount' => Book::count(),
            'retunbookCount' => ReturnBook::count()
        ]);
    }
}
