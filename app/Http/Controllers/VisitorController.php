<?php

// app/Http/Controllers/VisitorController.php
namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::latest()->paginate(10);
        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {
        return view('visitors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|unique:visitors|max:20',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:visitors|max:255',
            'phone' => 'required|max:20',
            'address' => 'required',
            'gender' => 'required|in:M,F',
            'registration_date' => 'required|date',
            'expiration_date' => 'nullable|date|after:registration_date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('visitor-photos', 'public');
        }

        Visitor::create($validated);

        return redirect()->route('visitors.index')->with('success', 'Visitor created successfully.');
    }

    public function show(Visitor $visitor)
    {
        return view('visitors.show', compact('visitor'));
    }

    public function edit(Visitor $visitor)
    {
        return view('visitors.edit', compact('visitor'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        $validated = $request->validate([
            'member_id' => 'required|max:20|unique:visitors,member_id,' . $visitor->id,
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:visitors,email,' . $visitor->id,
            'phone' => 'required|max:20',
            'address' => 'required',
            'gender' => 'required|in:M,F',
            'registration_date' => 'required|date',
            'expiration_date' => 'nullable|date|after:registration_date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($visitor->photo) {
                Storage::disk('public')->delete($visitor->photo);
            }
            $validated['photo'] = $request->file('photo')->store('visitor-photos', 'public');
        }

        $visitor->update($validated);

        return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully.');
    }

    public function destroy(Visitor $visitor)
    {
        if ($visitor->photo) {
            Storage::disk('public')->delete($visitor->photo);
        }

        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully.');
    }
}
