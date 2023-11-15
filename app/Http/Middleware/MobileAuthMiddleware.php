<?php

namespace App\Http\Middleware;

use Closure;
use \Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKeyAuthenticate;

class AppException extends Exception {

}

class MobileAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try
        {
            if(!$request->hasHeader('apiKey')) {
                throw new AppException('Unauthorized. apiKey is required!');
            }

            $apiKey = ApiKeyAuthenticate::where('apiKey', $request->header('apiKey'))->first();

            if(empty($apiKey))  {
                throw new AppException('Unauthorized. Invalid key authorization!');
            }

            if(!$apiKey->active || $apiKey->expire < date('Y-m-d H:i:s', time())) {
                throw new AppException("Unauthorized. apiKey is expired!");
            }

            $apiKey->update([
                'requests' => $apiKey->requests += 1
            ]);
        } catch (AppException $ex) {
            return response()->json(['success' => false,'message' => $ex->getMessage() ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}



