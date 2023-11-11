<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ApiKeyAuthenticate extends Model
{
    use HasUuids;
    use HasFactory;

    protected $fillable = [
        'id',
        'userId',
        'apiKey',
        'expire',
        'active',
        'requests'
    ];

    public function validate($request)
    {
        $validator = Validator::make($request->all(), [
            'apiKey' =>'required|string|max:64',
            'expire' =>'required|date',
        ]);

        return !$validator->fails();
    }
}
