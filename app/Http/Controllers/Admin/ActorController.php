<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    
    const PATH_VIEW='admin/actors.';
    public function index(Request $request)
    {
        //$data = Actor::query()->get();
        $search = $request->input('search');
        $data = Actor::withTrashed()->when($search, function ($query) use ($search) {
            return $query->where('actor_name', 'LIKE', "%{$search}%");
        })->paginate(4);
         // Lấy thông tin cần thiết cho paginator
        $currentPage = $data->currentPage(); // Trang hiện tại
        $total = $data->total(); // Tổng số item
        $perPage = $data->perPage(); // Số lượng item trên mỗi trang
        $totalPages = $data->lastPage(); // Tổng số trang

        return view(self::PATH_VIEW.__FUNCTION__,compact('data', 'currentPage', 'total', 'perPage', 'totalPages', 'search'));
    }

   
    public function create()
    {
       
            return view(self::PATH_VIEW.__FUNCTION__);
        
    }

    
    public function store(StoreActorRequest $request)
    {
        $this->validate($request, [
        'actor_name' => 'required|string|max:255',
        'biography' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif', 
    ], [
       
        'actor_name.required' => 'The actor name is required.',
        'actor_name.string' => 'The actor name must be a valid string.',
        'actor_name.max' => 'The actor name must not exceed 255 characters.',
        'biography.required' => 'The biography is required.',
        'biography.string' => 'The biography must be a valid string.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
        
    ]);
        $data=$request->except('image');
       $data['type']=isset($request->type)?1:0;
       if($request->hasFile('image')){
        $data['image']=Storage::put('actors', $request->file('image'));
       }else{
        $data['image']='';
       }
       Actor::query()->create($data);
       return redirect()->route('actors.index');
    }

   
    public function show(Actor $actor)
    {
        
    }

   
    public function edit(Actor $actor)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('actor'));
    }

    
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        $this->validate($request, [
            'actor_name' => 'required|string|max:255',
            'biography' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $data=$request->except('image');
        $data['type']=isset($request->type) ? 1 : 0;
        if($request->hasFile('image')){
            $data['image']=Storage::put('actors',$request->file('image'));
            //
            if(!empty($actor->image)&& Storage::exists($actor->image)){
                Storage::delete($actor->image);
            }
            //
        }else{
            $data['image']= $actor->image;
            
        }
       //
       $actor->update($data);
       //
        return redirect()->route('actors.index');
    }

    //xóa mềm
    public function destroy(Actor $actor)
    {
        $actor->delete();
    
        return back()->with('success', 'Actor deleted successfully (soft delete).');
    }
    //khôi phục
    public function restore($id)
    {
        $actor = Actor::withTrashed()->find($id);
        if ($actor) {
            $actor->restore();
            return back()->with('success', 'Actor restored.');
        }

        return back()->with('error', 'Actor not found.');
    }
        //xóa vĩnh viễn
    public function forceDelete($id)
    {
        $actor = Actor::withTrashed()->find($id);
        if ($actor) {
            if ($actor->image && Storage::exists($actor->image)) {
                Storage::delete($actor->image);
            }
            $actor->forceDelete();
            return back()->with('success', 'Actor permanently deleted.');
        }

        return back()->with('error', 'Actor not found.');
    }
}
