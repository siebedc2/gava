<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    protected $table = 'upvotes';

    protected $fillable = [
        'id', 'upvote', 'comment_id', 'user_id'
    ];
}
