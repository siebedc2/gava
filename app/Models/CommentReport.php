<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReport extends Model
{
    protected $table = 'comments';

    protected $fillable = [

        'id', 'report', 'comment_id'
    ];

    // Relation between Comment and User
    public function comment() {
        return $this->hasOne('App\Models\Comment');
    }
}
