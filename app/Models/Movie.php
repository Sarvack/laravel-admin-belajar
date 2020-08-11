<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'director', 'describe', 'rate', 'released', 'released_at', 'created_at', 'updated_at'
    ];
}
