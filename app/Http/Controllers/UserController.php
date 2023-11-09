<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private $PUB_KEY_REQUIRED = "The 'publicKey' parameter must be provided!";

    public function validateName(Request $request)
    {
        if(!isset($request->userName)) {
            return response()->json([ 'success' => false, 'message' => "The 'userName' parameter must be provided!"]);
        }

        $user = User::where('userName', $request->userName)->first();

        return response()->json([
            'success' => !isset($user),
            'message' => isset($user) ? "User already exists!" : "User name is valid!"
        ]);
    }

    public function create(Request $request)
    {
        if(!User::validator($request)) {
            return response()->json([ 'success' => false, 'message' => "Please check the parameters 'publicKey', 'walletAddress' and 'userName'!"]);
        }

        $user = User::create([
            'userName' => $request->userName,
            'surName' => $request->surName,
            'avatarUrl' => $request->avatarUrl,
            'walletAddress' => $request->walletAddress,
            'publicKey' => urldecode($request->publicKey),
        ]);

        return response()->json([
            'success' => true,
            'userId' => $user->id
        ]);
    }

    public function delete(Request $request)
    {
        if(!isset($request->publicKey)) {
            return response()->json(['success' => false,'message' => $this->PUB_KEY_REQUIRED]);
        }

        User::where('publicKey', urldecode($request->publicKey))->delete();

        return response()->json(['success' => true, 'message' => "User deleted successfully"]);
    }

    public function search(Request $request) {
        if(!isset($request->userName)) {
            return response()->json(['success' => false,'message' => "The 'userName' parameter must be provided!"]);
        }

        $user = User::where('userName', $request->userName)->select([ "id", "userName", "surName" ])->get();

        return response()->json([
           'success' => isset($user),
           'user' => $user
        ]);
    }

    public function found(Request $request)
    {
        if(!isset($request->publicKey)) {
            return response()->json(['success' => false,'message' => $this->PUB_KEY_REQUIRED]);
        }

        $user = User::where('publicKey', urldecode($request->publicKey))->first();

        return response()->json(['success' => true, 'found' => $user->funds]);
    }

    public function list()
    {
        $users = User::all();

        foreach($users as $user) {
            $user->publicKey = urlencode($user->publicKey);
        }

        return response()->json(['success' => true, 'users' => $users]);
    }
}
