<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->latest()->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sinopsis' => ['required', 'string'],
            'year' => ['required', 'integer', 'between:1900,2100'],
            'genre_id' => ['required', 'exists:genres,id'],
            'poster' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $path = $request->file('poster')->store('images', 'public');

        Film::create([
            'title' => $request->title,
            'sinopsis' => $request->sinopsis,
            'year' => $request->year,
            'genre_id' => $request->genre_id,
            'poster' => 'storage/' . $path,
        ]);

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('admin.films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sinopsis' => ['required', 'string'],
            'year' => ['required', 'integer', 'between:1900,2100'],
            'genre_id' => ['required', 'exists:genres,id'],
            'poster' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = [
            'title' => $request->title,
            'sinopsis' => $request->sinopsis,
            'year' => $request->year,
            'genre_id' => $request->genre_id,
        ];

        if ($request->hasFile('poster')) {
            if ($film->poster && str_starts_with($film->poster, 'storage/')) {
                $oldPath = str_replace('storage/', '', $film->poster);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('poster')->store('images', 'public');
            $data['poster'] = 'storage/' . $path;
        }

        $film->update($data);

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        DB::transaction(function () use ($film) {
            $film->perans()->delete();
            $film->kritiks()->delete();

            if ($film->poster && str_starts_with($film->poster, 'storage/')) {
                $oldPath = str_replace('storage/', '', $film->poster);
                Storage::disk('public')->delete($oldPath);
            }

            $film->delete();
        });

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil dihapus.');
    }
}
