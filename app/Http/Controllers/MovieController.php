<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.catalog.list-catalog', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalog.add-catalog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'poster_url' => 'nullable|required|image|max:5000',
            'trailer_url' => 'nullable|required|file|mimes:mp4,mov,avi,wmv|max:50000',
            'duration' => 'required',
            'release_date' => 'required|date',
            'age_rating' => 'required',
        ]);

        $posterPath = null;
        if ($request->hasFile('poster_url')) {
            $posterPath = $request->file('poster_url')->store('posters', 'public');
        }
        $trailerFilePath = null;
        if ($request->hasFile('trailer_url')) {
            $trailerFilePath = $request->file('trailer_url')->store('trailer', 'public');
        }

        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'poster_url' => $posterPath,
            'trailer_url' => $trailerFilePath,
            'duration' => $request->duration,
            'release_date' => $request->release_date,
            'age_rating' => $request->age_rating,
        ]);

        return redirect()->route('catalog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.catalog.detail-catalog', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.catalog.update-catalog', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'poster_url' => 'nullable|image|max:5000',
            'trailer_url' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:50000',
            'duration' => 'required',
            'release_date' => 'required|date',
            'age_rating' => 'required',
        ]);

        $movie = Movie::findOrFail($id);

        // Xử lý poster: nếu có file mới thì cập nhật, nếu không giữ nguyên
        if ($request->hasFile('poster_url')) {
            if ($movie->poster_url) {
                Storage::disk('public')->delete($movie->poster_url); // Xóa file cũ
            }
            $posterPath = $request->file('poster_url')->store('posters', 'public');
            $movie->poster_url = $posterPath;
        }

        // Xử lý trailer: nếu có file mới thì cập nhật, nếu không giữ nguyên
        if ($request->hasFile('trailer_url')) {
            if ($movie->trailer_url) {
                Storage::disk('public')->delete($movie->trailer_url); // Xóa file cũ
            }
            $trailerPath = $request->file('trailer_url')->store('trailers', 'public');
            $movie->trailer_url = $trailerPath;
        }

        // Cập nhật các trường khác
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;
        $movie->age_rating = $request->age_rating;

        $movie->save();

        return redirect()->route('catalog.index')->with('success', 'Movie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('catalog.index');
    }
}
