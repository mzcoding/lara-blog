<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";

    protected $fillable = [
        'title', 'description'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];


}
