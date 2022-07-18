<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('welcome', ['type' => 'login']);
    }


    public function registerView()
    {
        return view('welcome', ['type' => 'register']);
    }



    public function login(Request $request)
    {
       $credentials = $request->only(['email', 'password']);
       
        if(\Auth::attempt($credentials, true) ){
            return response()->json([
                'login' => true,
                'user' => User::select(['name', 'email'])->whereId(Auth::id())->first(),
                'errors' => null
            ], status: 200);
        }else{
            return response()->json([
                'login' => false,
                'errors' => 'Usuario o Email Incorrecto'
            ], status:422);  
        }
    }

    public function register(Request $request)
    {

        DB::beginTransaction();
        try{
            $user = new User($request->all());
            $user->save();
            DB::commit();
            return response()->json([
                'saved' => true,
                'errors' => null,
            ], status: 200);
        
        } catch(\Exception $e){
        DB::rollBack(); 
        return response()->json([
            'saved' => false,
            'errors' => $e->getMessage(),
        ], status: 500);  
    }
}

   public function logout()
    {
        Auth::logout();
        return \response()->json([
            'logout' => true
        ]);
    }
}


    /* DB::beginTransaction();
        $user = new User($request->all());
        $user->save();
        
        DB::rollBack(); 
        return response()->json([
            'saved' => true,
            'error' => null
        ], status: 200);*/
        