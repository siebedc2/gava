<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable = [
        'id', 'creator_id', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function creator() {
        return $this->belongsTo('App\Models\User', 'creator_id');
    }
}
