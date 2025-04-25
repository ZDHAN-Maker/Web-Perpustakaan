@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pengunjung</h1>
    <a href="{{ route('visitors.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <p><strong>Kode Anggota:</strong> {{ $visitor->member_id }}</p>
            <p><strong>Nama:</strong> {{ $visitor->name }}</p>
            <p><strong>Email:</strong> {{ $visitor->email }}</p>
            <p><strong>No. Telepon:</strong> {{ $visitor->phone }}</p>
            <p><strong>Alamat:</strong> {{ $visitor->address }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $visitor->gender }}</p>
            <p><strong>Tanggal Daftar:</strong> {{ $visitor->registration_date }}</p>
            <p><strong>Tanggal Kadaluarsa:</strong> {{ $visitor->expiration_date }}</p>
            <p><strong>Status:</strong> {{ $visitor->status }}</p>
            @if($visitor->photo)
            <p><strong>Foto:</strong><br><img src="{{ asset('storage/' . $visitor->photo) }}" width="150"></p>
            @endif
        </div>
    </div>
</div>
@endsection