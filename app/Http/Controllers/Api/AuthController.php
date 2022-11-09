<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;



class AuthController extends Controller
{
    use ApiResponser;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credencials = $request->only('email','password');

        if(!auth()->attempt($credencials)){
            return $this->error('Credentials not match', 401);
        }
        auth()->user()->tokens()->delete();

        if(auth()->user()->is_admin){
            return $this->success([
                'user' => auth()->user(),
                'email' => auth()->user()->email,
                'token' => auth()->user()->createToken('Api Token',['server:admin'])->plainTextToken
            ]);
        }
        return $this->success([
            'user' => auth()->user()->name,
            'email' => auth()->user()->email,
            'token' => auth()->user()->createToken('API Token',['server:not'])->plainTextToken
        ]);
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return[
            'message' => 'logout and all tokens deleted'
        ];
    }

}
