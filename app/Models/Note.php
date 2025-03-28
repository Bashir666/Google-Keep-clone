<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'content', 'user_id', 'color_name', 'appearance_type', 'image_path','archived'];
}
