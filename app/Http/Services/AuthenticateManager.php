<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\ApiKeyAuthenticate;

class AuthenticateManager {

    public function authenticateKey(Request $request) {
        return $request;
    }

    public function authenticateUser(Request $request) {
        return $request;
    }

    public static function generateKey($cipher)
    {
        $timeCipher = (string) time();
        return ApiKeyAuthenticate::create([
            'apiKey' => hash('sha256', $cipher.$timeCipher),
            'expire' => date('Y-m-d H:i:s', time() + 99999999),
            'requests' => 0
        ]);
    }
}
