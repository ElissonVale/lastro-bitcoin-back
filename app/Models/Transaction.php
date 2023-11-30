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
    const MIN_WALLET = "|min:26";

    protected $fillable = [
        'id',
        'userTo',
        'userFrom',
        'amount',
        'description',
        'state', // 'created', 'sended', 'received', 'accepted', 'rejected', 'confirm' => default 'created'
        'network', // 'lightning', 'bitcoin' => default 'bitcoin'
        'created_at'
    ];

    public static function validator($request)
    {
        $validator = Validator::make($request->all(), [
            'userTo' => 'required'.MIN_UUID,
            'userFrom' => 'required'.MIN_UUID,
            'amount' => 'required',
        ]);

        return !$validator->fails();
    }
}
