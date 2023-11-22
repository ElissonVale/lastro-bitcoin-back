<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasUuids;
    use HasFactory;

    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'email',
        'password'
    ]; 

    public static function validator($request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|min:5',
            'lastName' => 'required|min:5',
            'email' => 'required|min:10',
            'password' => 'required|min:10'
        ]);

        return !$validator->fails();
    }
}
