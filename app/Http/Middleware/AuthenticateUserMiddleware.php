<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $headers = $request->headers->all();

        if(!$request->hasHeader('Authorization')) {
            return response()->json([ 'message' => 'Unauthorized' ], Response::HTTP_UNAUTHORIZED);
        }

        if(!User::where('publicKey', $headers['authorization'][0])->first())  {
            return response()->json([ 'message' => 'Unauthorized' ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
