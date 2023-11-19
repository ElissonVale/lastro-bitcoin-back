<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasUuids;
    use HasFactory;

    const MIN_UUID = "|min:36";

    private $fillable = [
        'id',
        'userTo',
        'userFrom',
        'message',
        'state'
    ];

    public static function validate($request)
    {
        $validator = Validator::make($request->all(), [
            'userTo' => 'required'.MIN_UUID,
            'userFrom' => 'required'.MIN_UUID,
            'message' => 'required|min:15|max:250',
            'state' => 'required'
        ]);

        return !$validator->fails();
    }
}
