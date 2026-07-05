<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastActiveAt
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()) {
            $request->user()->forceFill(['last_active_at' => now()])->save();
        }

        return $next($request);
    }
}
