<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'id', 'stars', 'user_id', 'video_id'
    ];

    public function video() {
        return $this->belongsTo('App\Models\Video');
    }
}
