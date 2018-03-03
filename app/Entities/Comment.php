<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = "id";

    protected $fillable = [
        'article_id',
        'user_id',
        'status',
        'comment'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
