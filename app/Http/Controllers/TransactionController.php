<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    const PUB_KEY_REQUIRED = "The 'userId' parameter must be provided!";

    public function listTransactions(Request $request)
    {
        if(!isset($request->userId)) {
            return response()->json(['success' => false,'message' => PUB_KEY_REQUIRED]);
        }

        $user = User::where('id', $request->userId)->first();

        $transactionsSended = Transaction::where('from', $user->id)->get();
        $transactionsReceived = Transaction::where('to', $user->id)->get();

        return response()->json(['success' => true, 'transactions' => [
            'transactionsSended' => $transactionsSended,
            'transactionsReceived' => $transactionsReceived
        ]]);
    }
}
