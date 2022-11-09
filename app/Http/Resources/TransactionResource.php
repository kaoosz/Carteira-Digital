<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'wallet_id' => $this->wallet_id,
            'wallet id owner of transaction' => $this->wallet,
        ];

    }
}
