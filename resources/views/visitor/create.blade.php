@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengunjung</h1>

    <form action="{{ route('visitors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('visitors.form')
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection