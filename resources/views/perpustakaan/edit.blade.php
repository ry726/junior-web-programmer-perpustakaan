@extends('layouts.app')

@section('content')
    <h2>Edit Buku</h2>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perpustakaan.update', $perpustakaan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Buku</label><br>
            <input type="text" name="nama_buku" value="{{ old('nama_buku', $perpustakaan->nama_buku) }}">
        </div>
        <div>
            <label>Author</label><br>
            <input type="text" name="author" value="{{ old('author', $perpustakaan->author) }}">
        </div>
        <div>
            <label>Genre</label><br>
            <input type="text" name="genre_buku" value="{{ old('genre_buku', $perpustakaan->genre_buku) }}">
        </div>
        <div>
            <label>Ketersediaan</label><br>
            <select name="ketersediaan">
                <option value="tersedia" {{ old('ketersediaan', $perpustakaan->ketersediaan)=='tersedia' ? 'selected' : '' }}>tersedia</option>
                <option value="tidak tersedia" {{ old('ketersediaan', $perpustakaan->ketersediaan)=='tidak tersedia' ? 'selected' : '' }}>tidak tersedia</option>
            </select>
        </div>
        <div>
            <label>Cover (upload new image to replace)</label><br>
            @if($perpustakaan->cover_buku)
                <div>
                    <img src="{{ asset('storage/'.$perpustakaan->cover_buku) }}" alt="cover" width="120">
                </div>
            @endif
            <input type="file" name="cover_buku">
        </div>
        <div>
            <button type="submit">Update</button>
            <a href="{{ route('perpustakaan.index') }}">Batal</a>
        </div>
    </form>
@endsection
