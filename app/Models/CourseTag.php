<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseTag extends Pivot
{
    protected $table = 'courses_tags';

    protected $fillable = [
        'id', 'tag_id', 'course_id'
    ];


}
