<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Exceptions\OutsideWorkingHours;
use Carbon\Carbon;

class TimeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $startTime = Carbon::createFromTime(9, 0, 0);
        $endTime = Carbon::createFromTime(21, 0, 0);
    
        $now = Carbon::now();
    
        if ($now->lessThan($startTime) || $now->greaterThan($endTime)) {
            throw OutsideWorkingHours::create();
        }
    
        return $next($request);
    }
}
