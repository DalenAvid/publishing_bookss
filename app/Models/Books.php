<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title',
        'author',
        'rating',
        'cover_image_url',
        'comment',
        'description',
        'language',
        'age_recommendation',
        'publication_year',
    ];
}
