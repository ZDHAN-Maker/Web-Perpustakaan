@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pengunjung</h1>
    <a href="{{ route('visitors.create') }}" class="btn btn-primary mb-3">Tambah Pengunjung</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr>
                <td>{{ $visitor->member_id }}</td>
                <td>{{ $visitor->name }}</td>
                <td>{{ $visitor->email }}</td>
                <td>{{ $visitor->status }}</td>
                <td>
                    <a href="{{ route('visitors.show', $visitor) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('visitors.edit', $visitor) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('visitors.destroy', $visitor) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $visitors->links() }}
</div>
@endsection