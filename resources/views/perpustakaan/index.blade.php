@extends('layouts.app')

@section('content')
    <p><a href="{{ route('perpustakaan.create') }}">Tambah Buku Baru</a></p>

    @if($perpus->isEmpty())
        <p>Tidak ada buku.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Nama Buku</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Ketersediaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perpus as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>
                        @if($p->cover_buku)
                            <div><img src="{{ asset('storage/'.$p->cover_buku) }}" alt="cover" width="60"></div>
                        @endif
                    </td>
                    <td>{{ $p->nama_buku }}</td>
                    <td>{{ $p->author }}</td>
                    <td>{{ $p->genre_buku }}</td>
                    <td>{{ $p->ketersediaan }}</td>
                    <td>
                        <a href="{{ route('perpustakaan.show', $p) }}">Lihat</a> |
                        <a href="{{ route('perpustakaan.edit', $p) }}">Edit</a> |
                        <form action="{{ route('perpustakaan.destroy', $p) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
