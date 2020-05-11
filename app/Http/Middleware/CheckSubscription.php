<?php

namespace App\Http\Middleware;

use Closure;
use \App\Services\Video as VideoService;
use \App\Services\Subscription as SubscriptionService;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $videoService           = new VideoService();
        $subscriptionService    = new SubscriptionService();
        $video                  = $videoService->getById($request->route()->parameter('video_id'));

        if($video->exclusive == 'y' && $subscriptionService->notSubsribedWhenVideoWasCreated($video->created_at, $video->course->user->id)) {
            return redirect('/subscribe/' . $video->course->user->id);
        }
        
        return $next($request);
    }
}
