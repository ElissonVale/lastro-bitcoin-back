<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\KeyGenService;

class KeyGenController extends Controller
{
    public function generatePairKey()
    {
        $pairKeys = KeyGenService::generatePairKey();

        return response()->json([
            'success' => true, 'publicKey' => $pairKeys["publicKey"], 'privateKey' => $pairKeys["privateKey"],
        ]);
    }

    public function recoverPairKeys(Request $request)
    {
        if(!isset($request->privateKey)) {
            return response()->json([ 'success' => false, 'message' => "The 'privateKey' parameter must be provided!"]);
        }

        $pairKeys = KeyGenService::recoverPairKeys($request->privateKey);

        return response()->json([
            'success' => true, 'publicKey' => $pairKeys["publicKey"], 'privateKey' => $pairKeys["privateKey"],
        ]);
    }

}
