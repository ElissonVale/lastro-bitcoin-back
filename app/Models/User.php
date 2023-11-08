<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'userName',
        'walletAddress',
        'publicKey',
    ];


    public static function validate($request)
    {
        $validator = Validator::make($request->all(), [
            'userName' => 'required|unique:users',
            'walletAddress' => 'required|min:50',
            'publicKey' => 'required|min:100',
        ]);

        return !$validator->fails();
    }
}
