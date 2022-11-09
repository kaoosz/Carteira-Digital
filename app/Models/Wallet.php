<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    
    protected $table = 'wallets';

    protected $fillable =[
        'id','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)
        ->select('id','name','email');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class,'wallet_id','id')
        ->select('id','wallet_id','name');
    }
}
