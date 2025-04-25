@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengunjung</h1>

    <form action="{{ route('visitors.update', $visitor) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('visitors.form', ['visitor' => $visitor])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection