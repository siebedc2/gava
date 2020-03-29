<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'id', 'name'
    ];

    public function courses() {
        return $this->belongsToMany('App\Models\Course')->using('App\Models\CourseTag');
    }
}
