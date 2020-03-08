<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTag extends Model
{
    protected $table = 'courses_tags';

    protected $fillable = [
        'id', 'tag_id', 'course_id'
    ];
}
