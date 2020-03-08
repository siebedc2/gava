<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'id', 'title', 'description', 'video', 'course_id', 'exclusive'
    ];
}
