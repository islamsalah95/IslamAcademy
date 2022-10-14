<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'viewers_id',
        'user_id',
        'created_at',
        'updated_at',

    ];

}
