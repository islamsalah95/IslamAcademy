<?php

namespace App\Models\web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'coach',
        'title',
        'desc_en',
        'des_ar',
        'price' ,
        'image',
        'created_at',
    ];
}
