@extends('layouts.app')

@section('content')
<h1>Daftar Peminjaman</h1>

@if(session('success'))
<div>{{ session('success') }}</div>
@endif

<a href="{{ route('borrowings.create') }}">Tambah Peminjaman</a>

<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Pengunjung</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrowings as $borrowing)
        <tr>
            <td>{{ $borrowing->borrow_code }}</td>
            <td>{{ $borrowing->visitor->name }}</td>
            <td>{{ $borrowing->book->title }}</td>
            <td>{{ $borrowing->borrow_date->format('d-m-Y') }}</td>
            <td>{{ $borrowing->status }}</td>
            <td>
                <a href="{{ route('borrowings.show', $borrowing) }}">Lihat</a>
                <a href="{{ route('borrowings.edit', $borrowing) }}">Edit</a>
                <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $borrowings->links() }}
@endsection