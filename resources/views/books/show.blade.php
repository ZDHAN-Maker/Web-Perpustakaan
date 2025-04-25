@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Buku</h5>
        <div>
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover Buku" class="img-fluid rounded mb-3" style="max-height: 300px;">
                @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px; width: 100%;">
                    <span class="text-muted">Tidak ada cover</span>
                </div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Judul Buku</th>
                        <td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th>Pengarang</th>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>{{ $book->publisher }}</td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>{{ $book->isbn }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>{{ $book->publication_year }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Halaman</th>
                        <td>{{ $book->page_count }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $book->stock }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($book->status == 'available')
                            <span class="badge bg-success">Tersedia</span>
                            @elseif($book->status == 'borrowed')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                            @elseif($book->status == 'damaged')
                            <span class="badge bg-danger">Rusak</span>
                            @else
                            <span class="badge bg-secondary">Hilang</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Lokasi Rak</th>
                        <td>{{ $book->shelf_location ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>
                            @if($book->categories->count() > 0)
                            @foreach($book->categories as $category)
                            <span class="badge bg-primary">{{ $category->name }}</span>
                            @endforeach
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                </table>

                <h5 class="mt-4">Deskripsi</h5>
                <p>{{ $book->description ?? 'Tidak ada deskripsi' }}</p>
            </div>
        </div>

        <div class="mt-4">
            <h5>Riwayat Peminjaman</h5>
            @if($book->borrowings->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Peminjaman</th>
                            <th>Pengunjung</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($book->borrowings as $borrowing)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $borrowing->borrow_code }}</td>
                            <td>{{ $borrowing->visitor->name }}</td>
                            <td>{{ $borrowing->borrow_date->format('d/m/Y') }}</td>
                            <td>
                                @if($borrowing->return_date)
                                {{ $borrowing->return_date->format('d/m/Y') }}
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if($borrowing->status == 'borrowed')
                                <span class="badge bg-warning text-dark">Dipinjam</span>
                                @elseif($borrowing->status == 'returned')
                                <span class="badge bg-success">Dikembalikan</span>
                                @elseif($borrowing->status == 'overdue')
                                <span class="badge bg-danger">Terlambat</span>
                                @else
                                <span class="badge bg-secondary">Hilang</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info">Belum ada riwayat peminjaman untuk buku ini.</div>
            @endif
        </div>
    </div>
</div>
@endsection