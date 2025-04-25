@extends('layouts.app')

@section('content')
<h1>Edit Staf</h1>

@if($errors->any())
<div>
    <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('staff.update', $staff) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name', $staff->name) }}"><br>

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $staff->email) }}"><br>

    <label>No Telepon</label>
    <input type="text" name="phone" value="{{ old('phone', $staff->phone) }}"><br>

    <label>Alamat</label>
    <textarea name="address">{{ old('address', $staff->address) }}</textarea><br>

    <label>Jenis Kelamin</label>
    <select name="gender">
        <option value="M" {{ $staff->gender == 'M' ? 'selected' : '' }}>Laki-laki</option>
        <option value="F" {{ $staff->gender == 'F' ? 'selected' : '' }}>Perempuan</option>
    </select><br>

    <label>Tanggal Bergabung</label>
    <input type="date" name="join_date" value="{{ old('join_date', $staff->join_date) }}"><br>

    @if($staff->photo)
    <p><img src="{{ asset('storage/' . $staff->photo) }}" width="100"></p>
    @endif

    <label>Ganti Foto</label>
    <input type="file" name="photo"><br>

    <button type="submit">Update</button>
</form>
@endsection