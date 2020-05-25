<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = [
        'id', 'like', 'comment_id', 'user_id'
    ];

    public function comment() {
        return $this->belongsTo('App\Models\Comment');
    }
}
