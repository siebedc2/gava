<?php

namespace App\Services;

use App\Models\Comment as CommentModel;
use Validator;
use Auth;

class Comment {
    public function validator(array $data) {
        return Validator::make($data, [
            'comment' => 'required'
        ]);
    }

    public function getAll($videoId) {
        $comments = CommentModel::where([
            ['video_id', $videoId],
            ['subcomment', '0']            
            ])->orderBy('id', 'DESC')->get()->sortByDesc(function ($comment) {
                return $comment->upvotes->count();
            });

        return $comments;
    }

    public function getSubcomment($commentId) {
        return CommentModel::where([
            ['comment_id', $commentId],
            ['subcomment', '1']            
            ])->get();
    }

    public function create($comment, $videoId, $commentId = null, $type, $subcomment) {
        $videoComment               = new CommentModel();
        $videoComment->comment      = $comment;
        $videoComment->type         = $type;
        $videoComment->subcomment   = $subcomment;
        $videoComment->comment_id   = $commentId;
        $videoComment->video_id     = $videoId;
        $videoComment->user_id      = Auth::id();
        $videoComment->save();
        return $videoComment;
    }
}