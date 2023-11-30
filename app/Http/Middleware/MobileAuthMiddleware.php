<?php

namespace App\Http\Middleware;

use Closure;
use \Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKeyAuthenticate;

class AppError extends Exception { }

class MobileAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try
        {
            if(!$request->hasHeader('api-key')) {
                throw new AppError('Unauthorized. apiKey is required!');
            }

            $apiKey = ApiKeyAuthenticate::where('apiKey', $request->header('api-key'))->first();

            if(empty($apiKey))  {
                throw new AppError('Unauthorized. Invalid key authorization!');
            }

            if(!$apiKey->active || $apiKey->expire < date('Y-m-d H:i:s', time())) {
                throw new AppError("Unauthorized. apiKey is expired!");
            }

            $apiKey->update([
                'requests' => $apiKey->requests += 1
            ]);
        } catch (AppError $ex) {
            return response()->json(['success' => false,'message' => $ex->getMessage() ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}



