@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Perpustakaan</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $categoryCount }}</h5>
                    <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Staf</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $staffCount }}</h5>
                    <a href="{{ route('staff.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Pengunjung</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $visitorCount }}</h5>
                    <a href="{{ route('visitors.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Peminjaman</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $borrowingCount }}</h5>
                    <a href="{{ route('borrowings.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection