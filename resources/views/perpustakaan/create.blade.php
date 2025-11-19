@extends('layouts.app')

@section('content')
    <h2>Tambah Buku</h2>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perpustakaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nama Buku</label><br>
            <input type="text" name="nama_buku" value="{{ old('nama_buku') }}">
        </div>
        <div>
            <label>Author</label><br>
            <input type="text" name="author" value="{{ old('author') }}">
        </div>
        <div>
            <label>Genre</label><br>
            <input type="text" name="genre_buku" value="{{ old('genre_buku') }}">
        </div>
        <div>
            <label>Ketersediaan</label><br>
            <select name="ketersediaan">
                <option value="tersedia" {{ old('ketersediaan')=='tersedia' ? 'selected' : '' }}>tersedia</option>
                <option value="tidak tersedia" {{ old('ketersediaan')=='tidak tersedia' ? 'selected' : '' }}>tidak tersedia</option>
            </select>
        </div>
        <div>
            <label>Cover (upload image)</label><br>
            <input type="file" name="cover_buku">
        </div>
        <div>
            <button type="submit">Simpan</button>
            <a href="{{ route('perpustakaan.index') }}">Batal</a>
        </div>
    </form>
@endsection
