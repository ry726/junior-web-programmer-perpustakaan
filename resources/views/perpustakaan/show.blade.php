@extends('layouts.app')

@section('content')
    <h2>{{ $perpustakaan->nama_buku }}</h2>

    <p><strong>Author:</strong> {{ $perpustakaan->author }}</p>
    <p><strong>Genre:</strong> {{ $perpustakaan->genre_buku }}</p>
    <p><strong>Ketersediaan:</strong> {{ $perpustakaan->ketersediaan }}</p>
    <p><strong>Cover:</strong>
        @if($perpustakaan->cover_buku)
            <div>
                <img src="{{ asset('storage/'.$perpustakaan->cover_buku) }}" alt="cover" width="200">
            </div>
        @else
            <span>—</span>
        @endif
    </p>

    <p>
        <a href="{{ route('perpustakaan.edit', $perpustakaan) }}">Edit</a> |
        <a href="{{ route('perpustakaan.index') }}">Kembali</a>
    </p>
@endsection
