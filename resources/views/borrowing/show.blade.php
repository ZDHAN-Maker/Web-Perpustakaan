@extends('layouts.app')

@section('content')
<h1>Detail Peminjaman</h1>

<p><strong>Kode:</strong> {{ $borrowing->borrow_code }}</p>
<p><strong>Pengunjung:</strong> {{ $borrowing->visitor->name }}</p>
<p><strong>Buku:</strong> {{ $borrowing->book->title }}</p>
<p><strong>Tanggal Pinjam:</strong> {{ $borrowing->borrow_date->format('d-m-Y') }}</p>
<p><strong>Tanggal Kembali:</strong> {{ $borrowing->due_date->format('d-m-Y') }}</p>
<p><strong>Status:</strong> {{ $borrowing->status }}</p>
<p><strong>Catatan:</strong> {{ $borrowing->notes }}</p>

<a href="{{ route('borrowings.index') }}">Kembali</a>
@endsection