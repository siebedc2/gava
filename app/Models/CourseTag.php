<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTag extends Model
{
    protected $table = 'courses_tags';

    protected $fillable = [
        'id', 'tag_id', 'course_id'
    ];

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function tag() {
        return $this->belongsTo('App\Models\Tag');
    }

}
