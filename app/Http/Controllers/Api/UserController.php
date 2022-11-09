<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(UserRequest $request,User $user)
    {
        try{
            $user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return $this->success([
                'name' => $request->name,
                'email' => $request->email,
            ],
            'user created success');


        }catch(Exception $e){
            return $this->error('failed create user',201);
        }
    }

    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            return $user->name;

        }catch(Exception $e){
            return $this->error('failed delete user',201);
        }
    }
}
