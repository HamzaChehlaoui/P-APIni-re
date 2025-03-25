<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class JwtGuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {

            if (JWTAuth::parseToken()->authenticate()) {
                return response()->json(['message' => 'Already authenticated'], Response::HTTP_FORBIDDEN);
            }
        } catch (\Exception $e) {
            
            return $next($request);
        }

        return $next($request);
    }
}
