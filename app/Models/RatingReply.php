<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingReply extends Model
{
    protected $table = 'rating_replies';

    protected $fillable = [
        'id', 'reply', 'rating_id'
    ];

    public function rating() {
        return $this->belongsTo('App\Models\Rating');
    }
}
