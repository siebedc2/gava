<?php 
    $commentService = new App\Services\Comment();
    $subscriptionService = new App\Services\Subscription();
    $likeService = new App\Services\Like();
    $upvoteService = new App\Services\Upvote();
    $videoService = new App\Services\Video();
    $CommentReportService = new App\Services\CommentReport();
    $comments = $commentService->getAll($videoId ? $videoId : '');
    $video = $videoService->getById($videoId ? $videoId : '');
?>

<div class="comments">
    @foreach($comments as $comment)
    @if($subscriptionService->hasSubscription($comment->user->id, $video->course->user->id))
    <div class="comment">
        <div class="row">
            <div class="col-12">
                @if($subscriptionService->hasSubscription($comment->user->id, $video->course->user->id))
                <div class="d-inline-block rounded-pill premium-comment-user">
                    <p class="mb-0 text-white"><img class="premium_comment_username_icon mb-1 mr-1" src="/images/premium_white.svg" alt="Premium icon">{{ $comment->user->name }}</p>
                </div>
                @else
                <p class="normal-comment-user mb-0">{{ $comment->user->name }}</p>
                @endif
            </div>
        </div>
        <div class="row mt-2 mb-1">
            <div class="col-12">
                @if($comment->type == 'text')
                <p class="text-black mb-0">{{ $comment->comment }}</p>
                @else
                <video width="320" height="auto" class="d-block" controls>
                    <source src="/images/uploads/{{$comment->comment}}" type="video/mp4">
                </video>
                @endif
            </div>
        </div>
        @auth
        <div class="row">
            <p class="videoId" hidden>{{$videoId ? $videoId : ''}}</p>
            <p class="commentId" hidden>{{$comment->id}}</p>
            <div class="col-8 d-flex">
                <div class="d-flex align-items-center">
                    <span class="upvote-comment">
                    @if($upvoteService->getUpvoteByUserId($comment->id, Auth::id()) > 0)
                    <img src="/images/upvote-lightblue.svg" alt="Upvote icon">
                    @else
                    <img src="/images/upvote-grey.svg" alt="Upvote icon">
                    @endif</span>
                    <p class="upvote-amount mt-1 mb-0 ml-2">{{ $upvoteService->getUpvoteAmount($comment->id) }}</p>
                </div>
                <div class="ml-4 d-flex align-items-center">
                    <span class="like-comment">
                    @if($likeService->getLikeByUserId($comment->id, Auth::id()) > 0)
                    <img src="/images/like.svg" alt="Like icon">
                    @else
                    <img src="/images/like-grey.svg" alt="Like icon">
                    @endif
                    </span>
                    <p class="like-amount mt-1 mb-0 ml-2">{{ $likeService->getLikeAmount($comment->id) }}</p>
                </div>
                <div class="ml-4 d-flex align-items-center">
                    <span class="add-textsubcomment"><img src="/images/text_comment.svg" alt="Text comment icon"></span>
                    <p class="mt-1 mb-0 ml-2">reply</p>
                </div>
                <div class="ml-4 d-flex align-items-center">
                    <label for="video-subcomment" class="add-video-subcomment d-flex mt-2">
                        <span class="mt-1"><img src="/images/video_comment.svg" alt="Video comment icon"></span>
                        <p class="mt-1 mb-0 ml-2">reply</p>
                    </label>

                    <form class="d-none video-subcomment-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="video-subcomment" id="video-subcomment" type="file" accept="video/*" class="video-subcomment d-none form-control">
                        </div>

                        <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                        <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">

                    </form>
                </div>
                @if($comment->user->id != Auth::id())
                <div class="ml-4 d-flex align-items-center">
                    <span class="@if($CommentReportService->hasAlready($comment->id, Auth::id()) > 0) reported @endif report-comment"><img class="report-icon" src="/images/report.svg"  alt="Report icon"></span>
                </div>
                @endif
            </div>

            <div class="col-12 mt-2">
                <form class="d-none subcomment-form" action="">
                    <div class="form-group">
                        <input type="text" class="rounded-pill border-0 bg-light form-control pr-5" id="subcomment" placeholder="write a subcomment">
                    </div>

                    <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                    <input type="hidden" class="videoId" name="videoId" value="{{$videoId ? $videoId : ''}}">

                    <button type="submit" class="add-subcomment border-0 bg-transparent"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
        @endauth
    </div>
    <div class="subcomments mt-1 mb-4">
        <?php $subcomments = $commentService->getSubcomment($comment->id) ?>
        @foreach($subcomments as $subcomment)
        <div class="subcomment pl-4 mb-2">
            <div class="row">
                <div class="col-12">
                    @if($subscriptionService->hasSubscription($subcomment->user->id, $video->course->user->id))
                    <div class="d-inline-block rounded-pill premium-comment-user mb-2">
                        <p class="mb-0 text-white"><img class="premium_comment_username_icon mb-1 mr-1" src="/images/premium_white.svg" alt="Premium icon">{{ $subcomment->user->name }}</p>
                    </div>
                    @else
                    <p class="normal-comment-user mb-2">{{$subcomment->user->name }}</p>
                    @endif

                    @if($subcomment->type == 'text')
                    <p class="text-black mb-0">{{ $subcomment->comment }}</p>
                    @else
                    <video width="320" height="auto" class="d-block" controls>
                        <source src="/images/uploads/{{$subcomment->comment}}" type="video/mp4">
                    </video>
                    @endif
                </div>
            </div>
            @auth
            <div class="row">
                <p class="videoId" hidden>{{$videoId ? $videoId : ''}}</p>
                <p class="commentId" hidden>{{$subcomment->id}}</p>
                <div class="col-8 d-flex">
                    <div class="d-flex align-items-center">
                        <span class="upvote-comment">
                        @if($upvoteService->getUpvoteByUserId($subcomment->id, Auth::id()) > 0)
                        <img src="/images/upvote-lightblue.svg" alt="Upvote icon">
                        @else
                        <img src="/images/upvote-grey.svg" alt="Upvote icon">
                        @endif
                        </span>
                        <p class="upvote-amount mt-1 mb-0 ml-2">{{ $upvoteService->getUpvoteAmount($subcomment->id) }}</p>
                    </div>
                    <div class="ml-4 d-flex align-items-center">
                        <span class="like-comment">
                        @if($likeService->getLikeByUserId($subcomment->id, Auth::id()) > 0)
                        <img src="/images/like.svg" alt="Like icon">
                        @else
                        <img src="/images/like-grey.svg" alt="Like icon">
                        @endif
                        </span>
                        <p class="like-amount mt-1 mb-0 ml-2">{{ $likeService->getLikeAmount($subcomment->id) }}</p>
                    </div>
                    <div class="ml-4 d-flex align-items-center">
                        <span class="add-textsubcomment"><img src="/images/text_comment.svg" alt="Text comment icon"></span>
                        <p class="mt-1 mb-0 ml-2">reply</p>
                    </div>
                    <div class="ml-4 d-flex align-items-center">
                        <label for="video-subcomment" class="add-video-subcomment d-flex mt-2">
                            <span class="mt-1"><img src="/images/video_comment.svg" alt="Video comment icon"></span>
                            <p class="mt-1 mb-0 ml-2">reply</p>
                        </label>

                        <form class="d-none video-subcomment-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input name="video-subcomment" id="video-subcomment" type="file" accept="video/*" class="video-subcomment d-none form-control">
                            </div>

                            <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                            <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">
                        </form>
                    </div>
                    @if($subcomment->user->id != Auth::id())
                    <div class="ml-4 d-flex align-items-center">
                        <span class="@if($CommentReportService->hasAlready($subcomment->id, Auth::id()) > 0) reported @endif report-comment"><img class="report-icon" src="/images/report.svg" alt="Report icon"></span>
                    </div>
                    @endif
                </div>

                <div class="col-12 mt-2">
                    <form class="d-none subcomment-form" action="">
                        <div class="form-group">
                            <input type="text" class="rounded-pill border-0 bg-light form-control pr-5" id="subcomment" placeholder="write a subcomment">
                        </div>

                        <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                        <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">

                        <button type="submit" class="add-subcomment border-0 bg-transparent"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
        @endforeach
    </div>
    @endif
    @endforeach
    @foreach($comments as $comment)
    @if(!$subscriptionService->hasSubscription($comment->user->id, $video->course->user->id))
    <div class="comment">
        <div class="row">
            <div class="col-12">
                @if($subscriptionService->hasSubscription($comment->user->id, $video->course->user->id))
                <div class="d-inline-block rounded-pill premium-comment-user">
                    <p class="mb-0 text-white"><img class="premium_comment_username_icon mb-1 mr-1" src="/images/premium_white.svg" alt="Premium icon">{{ $comment->user->name }}</p>
                </div>
                @else
                <p class="normal-comment-user mb-0">{{ $comment->user->name }}</p>
                @endif
            </div>
        </div>
        <div class="row mt-2 mb-1">
            <div class="col-12">
                @if($comment->type == 'text')
                <p class="text-black mb-0">{{ $comment->comment }}</p>
                @else
                <video width="320" height="auto" class="d-block" controls>
                    <source src="/images/uploads/{{$comment->comment}}" type="video/mp4">
                </video>
                @endif
            </div>
        </div>
        @auth
        <div class="row">
            <p class="videoId" hidden>{{$videoId ? $videoId : ''}}</p>
            <p class="commentId" hidden>{{$comment->id}}</p>
            <div class="col-8 d-flex">
                <div class="d-flex align-items-center">
                    <span class="upvote-comment">
                    @if($upvoteService->getUpvoteByUserId($comment->id, Auth::id()) > 0)
                    <img src="/images/upvote-lightblue.svg" alt="Upvote icon">
                    @else
                    <img src="/images/upvote-grey.svg" alt="Upvote icon">
                    @endif
                    </span>
                    <p class="upvote-amount mt-1 mb-0 ml-2">{{ $upvoteService->getUpvoteAmount($comment->id) }}</p>
                </div>
                <div class="ml-4 d-flex align-items-center">
                    <span class="like-comment">
                    @if($likeService->getLikeByUserId($comment->id, Auth::id()) > 0)
                    <img src="/images/like.svg" alt="Like icon">
                    @else
                    <img src="/images/like-grey.svg" alt="Like icon">
                    @endif
                    </span>
                    <p class="like-amount mt-1 mb-0 ml-2">{{ $likeService->getLikeAmount($comment->id) }}</p>
                </div>
                <div class="ml-4 d-flex align-items-center">
                    <span class="add-textsubcomment"><img src="/images/text_comment.svg" alt="Text comment icon"></span>
                    <p class="mt-1 mb-0 ml-2">reply</p>
                </div>
                <div class="ml-4 d-flex align-items-center">
                    <label for="video-subcomment" class="add-video-subcomment d-flex mt-2">
                        <span class="mt-1"><img src="/images/video_comment.svg" alt="Video comment icon"></span>
                        <p class="mt-1 mb-0 ml-2">reply</p>
                    </label>

                    <form class="d-none video-subcomment-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="video-subcomment" id="video-subcomment" type="file" accept="video/*" class="video-subcomment d-none form-control">
                        </div>

                        <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                        <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">

                    </form>
                </div>
                @if($comment->user->id != Auth::id())
                <div class="ml-4 d-flex align-items-center">
                    <span class="@if($CommentReportService->hasAlready($comment->id, Auth::id()) > 0) reported @endif report-comment"><img class="report-icon" src="/images/report.svg"  alt="Report icon"></span>
                </div>
                @endif
            </div>

            <div class="col-12 mt-2">
                <form class="d-none subcomment-form" action="">
                    <div class="form-group">
                        <input type="text" class="rounded-pill border-0 bg-light form-control pr-5" id="subcomment" placeholder="write a subcomment">
                    </div>

                    <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                    <input type="hidden" class="videoId" name="videoId" value="{{$videoId ? $videoId : ''}}">

                    <button type="submit" class="add-subcomment border-0 bg-transparent"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
        @endauth
    </div>
    <div class="subcomments mt-1 mb-4">
        <?php $subcomments = $commentService->getSubcomment($comment->id) ?>
        @foreach($subcomments as $subcomment)
        <div class="subcomment pl-4 mb-2">
            <div class="row">
                <div class="col-12">
                    @if($subscriptionService->hasSubscription($subcomment->user->id, $video->course->user->id))
                    <div class="d-inline-block rounded-pill premium-comment-user mb-2">
                        <p class="mb-0 text-white"><img class="premium_comment_username_icon mb-1 mr-1" src="/images/premium_white.svg" alt="Premium icon">{{ $subcomment->user->name }}</p>
                    </div>
                    @else
                    <p class="normal-comment-user mb-2">{{$subcomment->user->name }}</p>
                    @endif

                    @if($subcomment->type == 'text')
                    <p class="text-black mb-0">{{ $subcomment->comment }}</p>
                    @else
                    <video width="320" height="auto" class="d-block" controls>
                        <source src="/images/uploads/{{$subcomment->comment}}" type="video/mp4">
                    </video>
                    @endif
                </div>
            </div>
            @auth
            <div class="row">
                <p class="videoId" hidden>{{$videoId ? $videoId : ''}}</p>
                <p class="commentId" hidden>{{$subcomment->id}}</p>
                <div class="col-8 d-flex">
                    <div class="d-flex align-items-center">
                        <span class="upvote-comment">
                        @if($upvoteService->getUpvoteByUserId($subcomment->id, Auth::id()) > 0)
                        <img src="/images/upvote-lightblue.svg" alt="Upvote icon">
                        @else
                        <img src="/images/upvote-grey.svg" alt="Upvote icon">
                        @endif
                        </span>
                        <p class="upvote-amount mt-1 mb-0 ml-2">{{ $upvoteService->getUpvoteAmount($subcomment->id) }}</p>
                    </div>
                    <div class="ml-4 d-flex align-items-center">
                        <span class="like-comment">
                        @if($likeService->getLikeByUserId($subcomment->id, Auth::id()) > 0)
                        <img src="/images/like.svg" alt="Like icon">
                        @else
                        <img src="/images/like-grey.svg" alt="Like icon">
                        @endif
                        </span>
                        <p class="like-amount mt-1 mb-0 ml-2">{{ $likeService->getLikeAmount($subcomment->id) }}</p>
                    </div>
                    <div class="ml-4 d-flex align-items-center">
                        <span class="add-textsubcomment"><img src="/images/text_comment.svg" alt="Text comment icon"></span>
                        <p class="mt-1 mb-0 ml-2">reply</p>
                    </div>
                    <div class="ml-4 d-flex align-items-center">
                        <label for="video-subcomment" class="add-video-subcomment d-flex mt-2">
                            <span class="mt-1"><img src="/images/video_comment.svg" alt="Video comment icon"></span>
                            <p class="mt-1 mb-0 ml-2">reply</p>
                        </label>

                        <form class="d-none video-subcomment-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input id="video-subcomment" name="video-subcomment" type="file" accept="video/*" class="video-subcomment d-none form-control">
                            </div>
                            
                            <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                            <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">

                        </form>
                    </div>
                    @if($subcomment->user->id != Auth::id())
                    <div class="ml-4 d-flex align-items-center">
                        <span class="@if($CommentReportService->hasAlready($subcomment->id, Auth::id()) > 0) reported @endif report-comment"><img class="report-icon" src="/images/report.svg" alt="Report icon"></span>
                    </div>
                    @endif
                </div>

                <div class="col-12 mt-2">
                    <form class="d-none subcomment-form" action="">
                        <div class="form-group">
                            <input type="text" class="rounded-pill border-0 bg-light form-control pr-5" id="subcomment" placeholder="write a subcomment">
                        </div>

                        <input type="hidden" class="commentId" name="commentId" value="{{$comment->id}}">
                        <input type="hidden" class="videoId" name="videoId" value="{{$video->id}}">

                        <button type="submit" class="add-subcomment border-0 bg-transparent"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
        @endforeach
    </div>
    @endif
    @endforeach
</div>