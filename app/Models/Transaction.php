<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'id','wallet_id','name'
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class)
        ->select('id','user_id');
    }

}
