@extends('layouts.app')

@section('content')
<h1>Edit Kategori</h1>

@if($errors->any())
<div>
    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf @method('PUT')

    <label>Nama Kategori</label>
    <input type="text" name="name" value="{{ old('name', $category->name) }}">

    <label>Deskripsi</label>
    <textarea name="description">{{ old('description', $category->description) }}</textarea>

    <button type="submit">Update</button>
</form>
@endsection