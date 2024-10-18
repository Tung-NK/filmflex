<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'directors';
    protected $fillable = [
        'director_name',
        'biography'
    ];

}
