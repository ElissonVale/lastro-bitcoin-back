<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MobileAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->hasHeader('apiKey')) {
            return response()->json([ 'success' => false, 'message' => 'Unauthorized apiKey required!' ], Response::HTTP_UNAUTHORIZED);
        }

        if($request->header("apiKey") != env("API_KEY")) {
            return response()->json([ 'success' => false, 'message' => 'Unauthorized, invalid apiKey!' ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
