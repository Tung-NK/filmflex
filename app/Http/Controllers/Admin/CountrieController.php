<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countrie;

class CountrieController extends Controller
{
    public function listCountrie(){
        $title = 'Danh sách quốc gia';
        $listCountrie = Countrie::paginate(5);
        // return "Hahahahahahahahaha";
        return view('admin.countries.list')->with(['listCountrie' => $listCountrie]);
    }
    public function addCountrie(Request $req){
        $req  ->validate([
            'name' => 'required',
        ]);

        $newCountrie = new Countrie();
        $newCountrie->name = $req->name;
        $newCountrie->save();
        
        return redirect()->back()->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    public function deleteCountrie(Request $req){
        // $req->validate([
        //     'id'=>'required',
        // ]);
        Countrie::where('id',$req->id)->delete();
        return redirect()->back()->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function detailCountrie(Request $req){
        $countrie = Countrie::where('id', $req->id)
        ->select('id','name')
        ->first();
        return json_encode($countrie);
    }
    public function updateCountrie(Request $req){
        // echo $req->name;
        $req->validate([
                'idCountrie'=>'required',
                'name'=>'required',
            ]);
        $countrie = Countrie::where('id', $req->idCountrie);
        if($countrie->exists()){
            $data = [
                'name' => $req->name,
            ];
            $countrie->update($data);
        }
        return redirect()->back()->with([
            'message' => 'Chỉnh sửa thành công'
        ]);
    }
}
