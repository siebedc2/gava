<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'id', 'name'
    ];

    public function courseTags() {
        return $this->belongsTo('App\Models\CourseTag');
    }
}
