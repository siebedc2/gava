<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoReport extends Model
{
    protected $table = 'video_reports';

    protected $fillable = [
        'id', 'report', 'video_id'
    ];
}
