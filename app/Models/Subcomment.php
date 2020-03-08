<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcomment extends Model
{
    protected $table = 'subcomments';

    protected $fillable = [
        'id', 'comment', 'video_id', 'comment_id'
    ];
}
