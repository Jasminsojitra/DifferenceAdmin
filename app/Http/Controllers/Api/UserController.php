<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    use ResponseTrait;
    public function configuration(Request $request)
    {
        $user = User::where('email', $request->udid)->first();
        if (!$user) {

            $user = new User();
            $user->name = $request->udid;
            $user->email = $request->udid;
            $user->password = $request->udid;
            $user->coins = 100;
            $user->solved = 0;
            $user->save();

            $user->assignRole('player');


        }

        Auth::login($user);

        $accessToken = Auth::user()->createToken('auth')->accessToken;
        $user = [
            'accessToken' => $accessToken,
            'user' => UserResource::make(Auth::user())
        ];

        return $this->success('success', $user);
    }


}