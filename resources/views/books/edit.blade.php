@extends('layouts.app')

@section('title', 'Edit Data Buku')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Data Buku</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="isbn" class="form-label required">ISBN</label>
                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
                        @error('isbn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label required">Judul Buku</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label required">Pengarang</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author', $book->author) }}" required>
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="publisher" class="form-label required">Penerbit</label>
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
                        @error('publisher')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="publication_year" class="form-label required">Tahun Terbit</label>
                        <input type="number" class="form-control @error('publication_year') is-invalid @enderror" id="publication_year" name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" min="1900" max="{{ date('Y') + 1 }}" required>
                        @error('publication_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="page_count" class="form-label required">Jumlah Halaman</label>
                        <input type="number" class="form-control @error('page_count') is-invalid @enderror" id="page_count" name="page_count" value="{{ old('page_count', $book->page_count) }}" min="1" required>
                        @error('page_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label required">Stok</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $book->stock) }}" min="0" required>
                        @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Cover Buku</label>
                        <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image">
                        @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($book->cover_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Current Cover" class="book-cover img-thumbnail">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="remove_cover" name="remove_cover">
                                <label class="form-check-label" for="remove_cover">
                                    Hapus cover saat ini
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="shelf_location" class="form-label">Lokasi Rak</label>
                <input type="text" class="form-control @error('shelf_location') is-invalid @enderror" id="shelf_location" name="shelf_location" value="{{ old('shelf_location', $book->shelf_location) }}">
                @error('shelf_location')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categories" class="form-label">Kategori</label>
                <select class="form-select @error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('categories')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $book->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_available" value="available" {{ old('status', $book->status) == 'available' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_available">Tersedia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_borrowed" value="borrowed" {{ old('status', $book->status) == 'borrowed' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_borrowed">Dipinjam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_damaged" value="damaged" {{ old('status', $book->status) == 'damaged' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_damaged">Rusak</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_lost" value="lost" {{ old('status', $book->status) == 'lost' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_lost">Hilang</label>
                    </div>
                </div>
                @error('status')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#categories').select2({
            placeholder: 'Pilih kategori',
            allowClear: true
        });
    });
</script>
@endpush

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush