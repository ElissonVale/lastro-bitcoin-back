<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUserMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->hasHeader('Authorization')) {
            return response()->json([ 'success' => false, 'message' => 'Unauthorized' ], Response::HTTP_UNAUTHORIZED);
        }

        $publicKey = $request->header('Authorization');
        
        if(empty(User::where('publicKey', urldecode($publicKey))->first()))  {
            return response()->json([ 'success' => false, 'message' => 'Unauthorized' ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
