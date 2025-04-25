@extends('layouts.app')

@section('content')
<h1>Tambah Peminjaman</h1>

@if ($errors->any())
<div>
    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('borrowings.store') }}">
    @csrf
    <label>Kode Peminjaman</label>
    <input type="text" name="borrow_code" value="{{ old('borrow_code') }}">

    <label>Pengunjung</label>
    <select name="visitor_id">
        @foreach ($visitors as $visitor)
        <option value="{{ $visitor->id }}">{{ $visitor->name }}</option>
        @endforeach
    </select>

    <label>Buku</label>
    <select name="book_id">
        @foreach ($books as $book)
        <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>

    <label>Tanggal Pinjam</label>
    <input type="date" name="borrow_date">

    <label>Tanggal Kembali</label>
    <input type="date" name="due_date">

    <label>Catatan</label>
    <textarea name="notes"></textarea>

    <button type="submit">Simpan</button>
</form>
@endsection