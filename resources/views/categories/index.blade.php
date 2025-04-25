@extends('layouts.app')

@section('content')
<h1>Daftar Kategori</h1>

@if(session('success'))
<div>{{ session('success') }}</div>
@endif

<a href="{{ route('categories.create') }}">Tambah Kategori</a>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.show', $category) }}">Lihat</a>
                <a href="{{ route('categories.edit', $category) }}">Edit</a>
                <form method="POST" action="{{ route('categories.destroy', $category) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}
@endsection