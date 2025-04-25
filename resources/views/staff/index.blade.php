@extends('layouts.app')

@section('content')
<h1>Daftar Staf</h1>

@if(session('success'))
<div>{{ session('success') }}</div>
@endif

<a href="{{ route('staff.create') }}">Tambah Staf</a>

<table>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Bergabung</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($staffs as $staff)
        <tr>
            <td>
                @if($staff->photo)
                <img src="{{ asset('storage/' . $staff->photo) }}" width="50">
                @endif
            </td>
            <td>{{ $staff->name }}</td>
            <td>{{ $staff->email }}</td>
            <td>{{ $staff->phone }}</td>
            <td>{{ $staff->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $staff->join_date }}</td>
            <td>
                <a href="{{ route('staff.show', $staff) }}">Lihat</a>
                <a href="{{ route('staff.edit', $staff) }}">Edit</a>
                <form action="{{ route('staff.destroy', $staff) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $staffs->links() }}
@endsection