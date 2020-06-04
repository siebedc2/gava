<?php

namespace App\Http\Middleware;

use Closure;
use \App\Services\Course as CourseService;
use Auth;

class CheckOwner
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
        $courseService = new CourseService();

        if($request->route()->parameter('course_id') != null) {
            $course = $courseService->getById($request->route()->parameter('course_id'));

            if($course->user_id != Auth::id()) {
                return back();
            }
        }

        return $next($request);
    }
}
