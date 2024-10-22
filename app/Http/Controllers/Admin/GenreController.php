<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data_genre = Genre::withTrashed()->when($search, function ($query) use ($search) {
            return $query->where('actor_name', 'LIKE', "%{$search}%");
        })->paginate(5);
        $currentPage = $data_genre->currentPage(); // Trang hiện tại
        $total = $data_genre->total(); // Tổng số item
        $perPage = $data_genre->perPage(); // Số lượng item trên mỗi trang
        $totalPages = $data_genre->lastPage(); // Tổng số trang
        return view('admin.genre.index', compact('data_genre', 'totalPages', 'perPage', 'total', 'currentPage', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorRequest $request)
    {
        $this->validate($request, [
            'genre_name' => 'required|string|max:255',
            'genre_poster' => 'required|image|mimes:jpeg,png,jpg,gif', 
        ], [
           
            'genre_name.required' => 'The actor name is required.',
            'genre_name.string' => 'The actor name must be a valid string.',
            'genre_name.max' => 'The actor name must not exceed 255 characters.',
            'genre_poster.image' => 'The file must be an image.',
            'genre_poster.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
            
        ]);
            $data_genre=$request->except('genre_poster');
           $data_genre['type']=isset($request->type)?1:0;
           if($request->hasFile('genre_poster')){
            $data_genre['genre_poster']=Storage::put('genres', $request->file('genre_poster'));
           }else{
            $data_genre['genre_poster']='';
           }
           Genre::query()->create($data_genre);
           return redirect()->route('genres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Genre::findOrFail($id);
        return view('admin.catalog.detail-catalog', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genre::findOrFail($id);
        return view('admin.genre.edit', compact('genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $this->validate($request, [
            'genre_name' => 'required|string|max:255',
            'genre_poster' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $data_genre = $request->except('genre_poster');
        // $data['type']=isset($request->type) ? 1 : 0;
        if($request->hasFile('genre_poster')){
            $data_genre['genre_poster']=Storage::put('genres',$request->file('genre_poster'));
            if(!empty($genre->genre_poster)&& Storage::exists($genre->genre_poster)){
                Storage::delete($genre->genre_poster);
                // logger($genre->genre_poster);
            }
        }else{
            $data_genre['genre_poster']= $genre->genre_poster; 
        }
        // Genre::query()->create($data_genre);
        $genre->update($data_genre);
        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $idGenre = Genre::findOrFail($id);
        $idGenre->delete();
        return back()->with('success', 'Movie deleted successfully');
    }
    //khôi phục
    public function restore($id)
    {
        $genre = Genre::withTrashed()->find($id);
        if ($genre) {
            $genre->restore();
            return back()->with('success', 'Movie restored.');
        }

        return back()->with('error', 'Movie not found.');
    }
    //xóa vĩnh viễn
    public function forceDelete($id)
    {
        $genre = Genre::withTrashed()->find($id);
        if ($genre) {
            if ($genre->image && Storage::exists($genre->image)) {
                Storage::delete($genre->image);
            }
            $genre->forceDelete();
            return back()->with('success', 'Movie permanently deleted.');
        }

        return back()->with('error', 'Movie not found.');
    }
}
