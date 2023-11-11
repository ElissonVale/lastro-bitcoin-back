<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKeyAuthenticate;

class MobileAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if(!$request->hasHeader('apiKey')) {
                throw new \Exception('Unauthorized. apiKey is required!');
            }

            $apiKey = ApiKeyAuthenticate::where('apiKey', $request->header('apiKey'))->first();

            if(empty($apiKey))  {
                throw new \Exception('Unauthorized. Invalid key authorization!');
            }

            if(!$apiKey->active || $apiKey->expire < date('Y-m-d H:i:s', time())) {
                throw new \Exception("Unauthorized. apiKey is expired!");
            }

            $apiKey->update([
                'requests' => $apiKey->requests += 1
            ]);
        } catch (\Exception $ex) {
            return response()->json(['success' => false,'message' => $ex->getMessage() ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}



