<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\PublicKeyLoader;

class KeyGenController extends Controller
{
    public function generatePairKey()
    {
        $privateKey = RSA::createKey();

        $publicKey = $privateKey->getPublicKey();

        return [
            'publicKey' => (string)$publicKey,
            'privateKey' => (string)$privateKey,
        ];
    }

    public function recoverPairKeys(Request $request)
    {
        if(!isset($request->privateKey)){
            return response()->json([ 'success' => false, 'message' => "The 'privateKey' parameter must be provided!"]);
        }

        $privateKey = PublicKeyLoader::load($request->privateKey);

        $publicKey = $privateKey->getPublicKey();

        return [
            'publicKey' => (string)$publicKey,
            'privateKey' => (string)$privateKey,
        ];
    }

}