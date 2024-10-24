<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{


    //liet ke - react
    public function index(Request $request)
    {
       
    $searchMessage = '';
    $search = $request->input('search');
    
    $directors = Director::when($search, function ($query) use ($search) {
        return $query->where('director_name', 'LIKE', "%{$search}%");
    })->paginate(10);
    if ($request->ajax() && $search) {
        $directors = Director::where('director_name', 'LIKE', "%{$search}%")->get();
        return response()->json($directors);
    }
    if ($search) {
        $searchMessage = "Showing results for: '{$search}'";
    }
    return view('admin.director.index', [
        'directors' => $directors,
        'search' => $search,
        'searchMessage' => $searchMessage 
    ]);
    }
   
    

    //them - create 
    public function create()
    {
        return view('admin.director.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'director_name' => 'required|string|max:255',
            'biography' => 'required|string|max:255'
        ]);
        Director::create([
            'director_name' => $request->director_name,
            'biography' => $request->biography
        ]);
        return redirect('admin/directors')->with('status', 'Director Created Successfully');
    }
    public function show(Director $director)
    {
        return view('admin.director.show');
    }

    //cap nhat - update
    public function edit(Director $director)
    {

        return view('admin.director.edit', compact('director'));
    }

    public function update(Request $request, Director $director)
    {
        $request->validate([
            'director_name' => 'required|string|max:255',
            'biography' => 'required|string|max:255'
        ]);
        $director->update([
            'director_name' => $request->director_name,
            'biography' => $request->biography
        ]);
        return redirect('admin/directors')->with('status', 'Director Updated Successfully');
    }

    //xóa mềm
    public function destroy(Director $director)
    {
        $director->delete();
        return redirect('admin/directors')->with('status', 'Director Delete Successfully');
    }

   
   
}
