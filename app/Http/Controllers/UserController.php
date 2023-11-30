<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function validateName(Request $request)
    {
        if(!isset($request->userName)) {
            return response()->json([ 'success' => false, 'message' => "The 'userName' parameter must be provided!"]);
        }

        $user = User::where('userName', $request->userName)->first();

        return response()->json([
            'success' => isset($user),
            'message' => isset($user) ? "User already exists!" : "User name is valid!"
        ]);
    }

    public function create(Request $request)
    {
        if(!User::validator($request)) {
            return response()->json([ 'success' => false, 'message' => "Please check the parameters 'publicKey', 'walletAddress' and 'userName'!"]);
        }

        $user = User::create([
            'funds' => 0,
            'userName' => $request->userName,
            'surName' => $request->surName,
            'avatarUrl' => $request->avatarUrl,
            'walletAddress' => $request->walletAddress,
            'publicKey' => urldecode($request->publicKey),
            'publicHash' => hash('sha256', urldecode($request->publicKey))
        ]);

        return response()->json([
            'success' => true,
            'user' => ['id' => $user->id, 'publicHash' => $user->publicHash ],
        ]);
    }

    public function delete(Request $request)
    {
        $request->user->delete();
        // User::where('id', $request->user->id)->delete();

        return response()->json(['success' => true, 'message' => "User deleted successfully"]);
    }

    public function search(Request $request)
    {
        $user = User::where('userName', $request->userName)->select([ "id", "userName", "surName" ])->get();

        return response()->json([
           'success' => isset($user),
           'user' => $user
        ]);
    }

    public function founds(Request $request)
    {
        return response()->json(['success' => true, 'founds' => $request->user->funds]);
    }


    public function existUser(Request $request)
    {
        if(empty($request->id)) {
            return response()->json([ 'success' => false, 'message' => 'Check the parameter `id`' ]);
        }

        $user = User::where('id', $request->id)->first();

        return response()->json([
            'success' => !empty($user),
            'message' => empty($user) ? "The user not exist!" : "Yes, the user exist"
        ]);
    }

    public function list()
    {
        $users = User::select(['id', "userName", "publicKey"])->get();

        foreach($users as $user) {
            $user->publicKey = urlencode($user->publicKey);
        }

        return response()->json(['success' => true, 'users' => $users]);
    }

    public function deleteAll() 
    {
        $users = User::all();

        foreach($users as $user)
            $user->delete();

        return response()->json(['success' => true, 'message' => "User deleted successfully"]);
    }
}
