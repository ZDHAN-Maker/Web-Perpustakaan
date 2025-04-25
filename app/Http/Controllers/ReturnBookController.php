<?php

// app/Http/Controllers/ReturnBookController.php
namespace App\Http\Controllers;

use App\Models\ReturnBook;
use App\Models\Borrowing;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReturnBookController extends Controller
{
    public function index()
    {
        $returns = ReturnBook::with(['borrowing.book', 'staff'])->latest()->paginate(10);
        return view('return_books.index', compact('returns'));
    }

    public function create()
    {
        $borrowings = Borrowing::where('status', 'borrowed')->get();
        $staffs = Staff::all();
        return view('return_books.create', compact('borrowings', 'staffs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id|unique:return_books,borrowing_id',
            'staff_id' => 'required|exists:staff,id',
            'return_date' => 'required|date',
            'fine' => 'required|integer|min:0',
            'notes' => 'nullable',
        ]);

        $borrowing = Borrowing::find($request->borrowing_id);

        // Update borrowing status
        $borrowing->update([
            'status' => 'returned',
            'return_date' => $request->return_date,
            'fine' => $request->fine,
        ]);

        // Update book status
        $borrowing->book->update(['status' => 'available']);

        // Create return record
        ReturnBook::create($validated);

        return redirect()->route('return-books.index')->with('success', 'Book returned successfully.');
    }

    public function show(ReturnBook $returnBook)
    {
        return view('return_books.show', compact('returnBook'));
    }

    public function edit(ReturnBook $returnBook)
    {
        $borrowings = Borrowing::all();
        $staffs = Staff::all();
        return view('return_books.edit', compact('returnBook', 'borrowings', 'staffs'));
    }

    public function update(Request $request, ReturnBook $returnBook)
    {
        $validated = $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id|unique:return_books,borrowing_id,' . $returnBook->id,
            'staff_id' => 'required|exists:staff,id',
            'return_date' => 'required|date',
            'fine' => 'required|integer|min:0',
            'notes' => 'nullable',
        ]);

        $returnBook->update($validated);

        return redirect()->route('return-books.index')->with('success', 'Return record updated successfully.');
    }

    public function destroy(ReturnBook $returnBook)
    {
        $returnBook->delete();
        return redirect()->route('return-books.index')->with('success', 'Return record deleted successfully.');
    }
}
