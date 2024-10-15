<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Actor extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'actor_name',
        'biography',
        'image',
    ];
    protected $dates = ['deleted_at'];
}
