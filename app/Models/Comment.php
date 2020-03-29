<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'id', 'comment', 'video_id', 'user_id'
    ];

    // Relation between Comment and User
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function video() {
        return $this->hasOne('App\Models\Video');
    }
}
