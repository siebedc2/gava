<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'id', 'title', 'description', 'video', 'tumbnail', 'course_id', 'exclusive'
    ];

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function ratings() {
        return $this->hasOne('App\Models\Rating');
    }
}
