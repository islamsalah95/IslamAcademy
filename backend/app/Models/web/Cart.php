<?php

namespace App\Models\web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'course_id',
        'course_title',
        'course_price',
        'user_id',
        'course_image',
        'created_at',

    ];
}
