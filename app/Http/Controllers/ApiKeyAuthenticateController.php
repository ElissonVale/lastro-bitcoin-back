<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthenticateManager;
use App\Models\ApiKeyAuthenticate;

class ApiKeyAuthenticateController extends Controller
{
    public function generate(Request $request)
    {
        if(empty($request->cipher))
        {
            return response()->json(['success' => false, 'message' => 'cipher not available']);
        }

        $apiKey = AuthenticateManager::generateKey($request->cipher);

        return response()->json([
            'apiKey' => $apiKey->apiKey,
            'expires' => $apiKey->expire
        ]);
    }

    public function list(Request $request)
    {
        $apiKeys = ApiKeyAuthenticate::all();

        return response()->json(['success' => true, 'apiKeys' => $apiKeys ]);
    }
}
