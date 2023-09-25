<?php

namespace tauseedzaman\ComingSoon\Http\Middleware;

use tauseedzaman\ComingSoon\Models\ComingSoon;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComingSoonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $coming_soon_enabled = config('comingsoon.coming_soon_enabled');

        if ($coming_soon_enabled) {
            $requestedUrl = $request->fullUrl();

            // Get the corresponding "Coming Soon" data based on the URL (you may need to adjust the logic)
            $comingSoonData = ComingSoon::where('page_url', $requestedUrl)->first();

            if ($comingSoonData && Carbon::now() < $comingSoonData->launch_time) {
                return response()->view('comingsoon::coming_soon', compact('comingSoonData'));
            }
        }

        return $next($request);
    }
}
