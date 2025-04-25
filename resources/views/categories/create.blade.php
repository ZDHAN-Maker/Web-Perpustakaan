@extends('layouts.app')

@section('content')
<h1>Tambah Kategori</h1>

@if($errors->any())
<div>
    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <label>Nama Kategori</label>
    <input type="text" name="name" value="{{ old('name') }}">

    <label>Deskripsi</label>
    <textarea name="description">{{ old('description') }}</textarea>

    <button type="submit">Simpan</button>
</form>
@endsection