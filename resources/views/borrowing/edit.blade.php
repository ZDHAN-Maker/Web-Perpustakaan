@extends('layouts.app')

@section('content')
<h1>Edit Peminjaman</h1>

<form method="POST" action="{{ route('borrowings.update', $borrowing) }}">
    @csrf @method('PUT')

    <label>Kode Peminjaman</label>
    <input type="text" name="borrow_code" value="{{ $borrowing->borrow_code }}">

    <label>Pengunjung</label>
    <select name="visitor_id">
        @foreach ($visitors as $visitor)
        <option value="{{ $visitor->id }}" {{ $borrowing->visitor_id == $visitor->id ? 'selected' : '' }}>
            {{ $visitor->name }}
        </option>
        @endforeach
    </select>

    <label>Buku</label>
    <select name="book_id">
        @foreach ($books as $book)
        <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>
            {{ $book->title }}
        </option>
        @endforeach
    </select>

    <label>Tanggal Pinjam</label>
    <input type="date" name="borrow_date" value="{{ $borrowing->borrow_date->format('Y-m-d') }}">

    <label>Tanggal Kembali</label>
    <input type="date" name="due_date" value="{{ $borrowing->due_date->format('Y-m-d') }}">

    <label>Catatan</label>
    <textarea name="notes">{{ $borrowing->notes }}</textarea>

    <button type="submit">Update</button>
</form>
@endsection