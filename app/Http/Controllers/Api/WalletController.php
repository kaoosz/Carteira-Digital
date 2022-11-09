<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResource;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WalletController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return WalletResource::collection(Wallet::all());
    }

    
    public function store($id)
    {
        try{
            $user = User::findOrFail($id);

            $user->wallet()->create([
               $user->id
            ]);

            return $this->success([
                'user id' => $user->id,
            ],
            'wallet created');

        }catch(Exception $e)
        {
            return $this->error('failed create wallet',201);
        }
    }

}
