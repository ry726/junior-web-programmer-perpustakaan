<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpus = Perpustakaan::all();
        return view('perpustakaan.index', ['perpus' => $perpus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perpustakaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_buku' => 'required|string|max:255',
            'ketersediaan' => 'nullable|in:tersedia,tidak tersedia',
            'author' => 'nullable|string|max:255',
            'genre_buku' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('cover_buku')) {
            $path = $request->file('cover_buku')->store('covers', 'public');
            $data['cover_buku'] = $path;
        }

        $perpus = Perpustakaan::create($data);

        if ($request->wantsJson()) {
            return response()->json($perpus, 201);
        }

        return redirect()->route('perpustakaan.index')->with('success', 'Buku berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perpustakaan $perpustakaan)
    {
        if(request()->wantsJson()) {
            return response()->json($perpustakaan);
        }

        return view('perpustakaan.show', ['perpustakaan' => $perpustakaan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perpustakaan $perpustakaan)
    {
        return view('perpustakaan.edit', ['perpustakaan' => $perpustakaan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perpustakaan $perpustakaan)
    {
        $data = $request->validate([
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_buku' => 'required|string|max:255',
            'ketersediaan' => 'nullable|in:tersedia,tidak tersedia',
            'author' => 'nullable|string|max:255',
            'genre_buku' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('cover_buku')) {
            if ($perpustakaan->cover_buku && Storage::disk('public')->exists($perpustakaan->cover_buku)) {
                Storage::disk('public')->delete($perpustakaan->cover_buku);
            }

            $path = $request->file('cover_buku')->store('covers', 'public');
            $data['cover_buku'] = $path;
        }

        $perpustakaan->update($data);

        if ($request->wantsJson()) {
            return response()->json($perpustakaan);
        }

        return redirect()->route('perpustakaan.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perpustakaan $perpustakaan)
    {
        if ($perpustakaan->cover_buku && Storage::disk('public')->exists($perpustakaan->cover_buku)) {
            Storage::disk('public')->delete($perpustakaan->cover_buku);
        }

        $perpustakaan->delete();

        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('perpustakaan.index')->with('success', 'Buku berhasil dihapus.');
    }
}
