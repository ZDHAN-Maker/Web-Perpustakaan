@extends('layouts.app')

@section('content')
<h1>Tambah Staf</h1>

@if($errors->any())
<div>
    <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data">
    @csrf

    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name') }}"><br>

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}"><br>

    <label>No Telepon</label>
    <input type="text" name="phone" value="{{ old('phone') }}"><br>

    <label>Alamat</label>
    <textarea name="address">{{ old('address') }}</textarea><br>

    <label>Jenis Kelamin</label>
    <select name="gender">
        <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Laki-laki</option>
        <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Perempuan</option>
    </select><br>

    <label>Tanggal Bergabung</label>
    <input type="date" name="join_date" value="{{ old('join_date') }}"><br>

    <label>Foto</label>
    <input type="file" name="photo"><br>

    <button type="submit">Simpan</button>
</form>
@endsection