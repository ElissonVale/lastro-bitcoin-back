<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasUuids;
    use HasFactory;

    protected $fillable = [
        'id',
        'userName',
        'surName',
        'avatarUrl',
        'walletAddress',
        'publicKey',
        'funds'
    ];

    public static function validator($request)
    {
        $validator = Validator::make($request->all(), [
            'userName' => 'required|min:30',
            'publicKey' => 'required|min:100',
        ]);

        return !$validator->fails();
    }
}
