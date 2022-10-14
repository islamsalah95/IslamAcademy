<?php

namespace App\Models\web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlists extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'course_id',
        'video',
        'viewers',
        'content',
        'created_at',
        'updated_at',

    ];
}
