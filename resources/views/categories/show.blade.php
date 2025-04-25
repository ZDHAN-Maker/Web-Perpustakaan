@extends('layouts.app')

@section('content')
<h1>Detail Kategori</h1>

<p><strong>Nama:</strong> {{ $category->name }}</p>
<p><strong>Deskripsi:</strong> {{ $category->description }}</p>

<a href="{{ route('categories.index') }}">Kembali ke daftar</a>
@endsection