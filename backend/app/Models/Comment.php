<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'comment',
        'playlist_id ',
        'user_name',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
