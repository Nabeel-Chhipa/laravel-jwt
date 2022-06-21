<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function _construct() {
        $this->middleware('auth:api', [
            'except'=>['register', 'login']
        ]);
    }

    public function register(Request $request) {

        $requiredFields = array(
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed|min:10'
        );
         
        $makeValidation = Validator::make($request->all(), $requiredFields);
        if($makeValidation->fails()) {
            return response()->json($makeValidation->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $makeValidation->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'message'=>'User Registered',
            'user'=>$user
        ], 201);
    }

    public function login(Request $request) {

        $requiredFields = array(
            'email'=>'required|email',
            'password'=>'required|string|min:10'
        );
        $makeValidation = Validator::make($request->all(), $requiredFields);
        if($makeValidation->fails()) {
            return response()->json($makeValidation->errors(), 422);
        }
        if(!$token=auth()->attempt($makeValidation->validated())) {
            return response()->json(['error'=>'Unauthorized'],401);
        }
        return $this->NewToken($token);
    }

    public function NewToken($token) {
        return response()->json([
            'access'=>$token,
            'type'=>'bearer',
            'expires'=>auth()->factory()->getTTL()*60,
            'userInfo'=>auth()->user()
        ]);
    }

    public function userProfile() {
        return response()->json(auth()->user());
    }

    public function logout() {
        auth()->logout();
        return response()->json(['message'=>'Logout']);
    }
}