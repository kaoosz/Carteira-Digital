<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return TransactionResource::collection(Transaction::all());
    }

    public function store($id,TransactionRequest $request)
    {
        try{

            $wallet = Wallet::findOrFail($id);

            $wallet->transaction()->create([
                'name' => $request->name,
            ]);
            
            return $this->success([
                'name' => $request->name,
            ],
            'transaction created');
            
        }catch(Exception $e)
        {
            return $this->error('failed create transaction',201);
        }

    }

}
