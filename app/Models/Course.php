<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'id', 'title', 'description', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function courseTags() {
        return $this->hasOne('App\Models\CourseTag');
    }

    public function videos() {
        return $this->hasOne('App\Models\Course');
    }
}
