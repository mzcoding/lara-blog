<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'author',
        'short_text',
        'full_text'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
