<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUuids;
    use HasFactory;

    const MIN_UUID = "|min:36";
    const MIN_WALLET = "|min:36";

    protected $fillable = [
        'id',
        'userTo',
        'userFrom',
        'amount',
        'walletFrom',
        'walletTo',
    ];

    public static function validator($request){
        $validator = Validator::make($request->all(), [
            'userTo' =>'required'.MIN_UUID,
            'userFrom' =>'required'.MIN_UUID,
            'amount' =>'required',
            'walletFrom' =>'required'.MIN_WALLET,
            'walletTo' =>'required'.MIN_WALLET,
        ]);

        return!$validator->fails();
    }
}
