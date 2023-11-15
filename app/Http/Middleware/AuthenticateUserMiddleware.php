<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKeyAuthenticate;

class AuthenticateUserMiddleware
{
    // This middleware is responsible for authenticating the users
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if(!$request->hasHeader('Authorization')) {
                throw new \Exception('Unauthorized. Authorization is empty!');
            }

            $userId = $request->header("userId");
            $publicKey = urldecode($request->header('Authorization'));

            $user = User::where('id', $userId)->first();

            if(empty($user))  {
                throw new \Exception('Unauthorized. Invalid key authorization');
            }

            $publicHash = hash('sha256', $publicKey);

            if($user->publicHash != $publicHash) {
                throw new \Exception('Unauthorized. Invalid key to the user!');
            }

            // Register the requests of the key registered
            if($request->hasHeader('apiKey')) {
                $apiAuthenticator = ApiKeyAuthenticate::where('apiKey', $request->getHeader('apiKey'))->first();
                if(!empty($apiAuthenticator)) {
                    $apiAuthenticator->update(['requests' => $apiAuthenticator->requests += 1]);
                }
            }

            $request->merge('user', $user);

        } catch (\Exception $ex) {
            return response()->json(['success' => false,'message' => $ex->getMessage()], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
