@extends('layouts.app')

@section('content')
<h1>Detail Staf</h1>

@if($staff->photo)
<p><img src="{{ asset('storage/' . $staff->photo) }}" width="150"></p>
@endif

<p><strong>Nama:</strong> {{ $staff->name }}</p>
<p><strong>Email:</strong> {{ $staff->email }}</p>
<p><strong>No Telepon:</strong> {{ $staff->phone }}</p>
<p><strong>Alamat:</strong> {{ $staff->address }}</p>
<p><strong>Jenis Kelamin:</strong> {{ $staff->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</p>
<p><strong>Tanggal Bergabung:</strong> {{ $staff->join_date }}</p>

<a href="{{ route('staff.index') }}">Kembali ke daftar</a>
@endsection