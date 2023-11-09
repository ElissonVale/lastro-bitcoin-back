<?php

namespace App\Http\Services;

use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\PublicKeyLoader;

class KeyGenService {

    public static function generatePairKey()
    {
        $privateKey = RSA::createKey();

        $publicKey = $privateKey->getPublicKey();

        $publicKeyString = str_replace(["-----BEGIN PUBLIC KEY-----\r\n", "\r\n-----END PUBLIC KEY-----"], "", (string)$publicKey);
        $privateKeyString = str_replace(["-----BEGIN PRIVATE KEY-----\r\n", "\r\n-----END PRIVATE KEY-----"], "", (string)$privateKey);

        return [
            'publicKey' => urlencode($publicKeyString),
            'privateKey' => urlencode($privateKeyString),
        ];
    }

    public static function recoverPairKeys(string $privateKey)
    {
        $privateKey = PublicKeyLoader::load("-----BEGIN PRIVATE KEY-----\r\n".urldecode($privateKey)."\r\n-----END PRIVATE KEY-----");

        $publicKey = $privateKey->getPublicKey();

        $publicKeyString = str_replace(["-----BEGIN PUBLIC KEY-----\r\n", "\r\n-----END PUBLIC KEY-----"], "", (string)$publicKey);
        $privateKeyString = str_replace(["-----BEGIN PRIVATE KEY-----\r\n", "\r\n-----END PRIVATE KEY-----"], "", (string)$privateKey);

        return [
            'publicKey' => urlencode($publicKeyString),
            'privateKey' => urlencode($privateKeyString),
        ];
    }
}
