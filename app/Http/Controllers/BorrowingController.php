<?php

// app/Http/Controllers/BorrowingController.php
namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Visitor;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['book', 'visitor'])->latest()->paginate(10);
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('status', 'available')->get();
        $visitors = Visitor::where('status', 'active')->get();
        return view('borrowings.create', compact('books', 'visitors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'borrow_code' => 'required|unique:borrowings|max:20',
            'visitor_id' => 'required|exists:visitors,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'notes' => 'nullable',
        ]);

        $book = Book::find($request->book_id);
        if ($book->status != 'available') {
            return back()->with('error', 'Book is not available for borrowing.');
        }

        $borrowing = Borrowing::create($validated);

        // Update book status
        $book->update(['status' => 'borrowed']);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing created successfully.');
    }

    public function show(Borrowing $borrowing)
    {
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        $books = Book::all();
        $visitors = Visitor::all();
        return view('borrowings.edit', compact('borrowing', 'books', 'visitors'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'borrow_code' => 'required|max:20|unique:borrowings,borrow_code,' . $borrowing->id,
            'visitor_id' => 'required|exists:visitors,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'notes' => 'nullable',
        ]);

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated successfully.');
    }

    public function destroy(Borrowing $borrowing)
    {
        // Update book status back to available if not returned
        if ($borrowing->status == 'borrowed') {
            $borrowing->book->update(['status' => 'available']);
        }

        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success', 'Borrowing deleted successfully.');
    }
}
