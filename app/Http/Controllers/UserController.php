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
    public function create(Request $request)
    {
        if(!User::validator($request)) {
            return response()->json([ 'success' => false, 'message' => "Please check the parameters 'publicKey', 'walletAddress' and 'userName'!"]);
        }

        $user = User::create([
            'id' => Str::uuid(),
            'userName' => $request->userName,
            'walletAddress' => $request->walletAddress,
            'publicKey' => $request->publicKey,
        ]);

        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }

    public function delete(Request $request)
    {
        if(!isset($request->publicKey)) {
            return response()->json(['success' => false,'message' => "The 'publicKey' parameter must be provided!"]);
        }

        User::where('publicKey', $request->publicKey)->delete();

        return response()->json(['success' => true, 'message' => "User deleted successfully"]);
    }

    public function listTransactions(Request $request)
    {
        if(!isset($request->publicKey)) {
            return response()->json(['success' => false,'message' => "The 'publicKey' parameter must be provided!"]);
        }

        $user = User::where('publicKey', $request->publicKey)->first();

        $transactionsSended = Transaction::where('from', $user->id)->get();
        $transactionsReceived = Transaction::where('to', $user->id)->get();

        return response()->json(['success' => true, 'transactions' => [
            'transactionsSended' => $transactionsSended,
            'transactionsReceived' => $transactionsReceived
        ]]);
    }

    public function found(Request $request)
    {
        if(!isset($request->publicKey)) {
            return response()->json(['success' => false,'message' => "The 'publicKey' parameter must be provided!"]);
        }

        $user = User::where('publicKey', $request->publicKey)->first();

        return response()->json(['success' => true, 'found' => $user->funds]);
    }

    public function list(Request $request)
    {
        $users = User::all();
        return response()->json(['success' => true, 'users' => $users]);
    }
}
