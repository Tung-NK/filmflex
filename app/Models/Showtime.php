<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    protected $table = 'showtime';
    protected $fillable = [
        'movie_id','translation_id','start_time','end_time','date'
    ] ;
}
