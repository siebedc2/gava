<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoTag extends Model
{
    protected $table = 'video_tags';

    protected $fillable = [
        'id', 'tag_id', 'video_id'
    ];
}
