<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    //
    public function listShowtime(){
        $listShowtime = Showtime::all();
        return view();
    }
}
