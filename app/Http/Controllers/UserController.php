<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request)
    {
        if(!User::validator($request)) {
            return response()->json([ 'success' => false, 'message' => "Please check the parameters 'publicKey', 'walletAddress' and 'userName'!"]);
        }

        $user = User::create($request->all());

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
        $user = User::where('publicKey', $request->publicKey)->first();

        return response()->json(['success' => true, 'found' => $user->funds]);
    }
}
