<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'poster_url',
        'trailer_url',
        'duration',
        'release_date',
        'age_rating',
    ];
}
