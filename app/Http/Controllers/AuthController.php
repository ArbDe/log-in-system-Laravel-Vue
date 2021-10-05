<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function register(Request $request){

        $fields= $request->validate([
            'name'=>'required|string',
            'surname'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'username'=>'required|string|unique:users',
            'password'=>'required|string|confirmed',
            'dob'=>'required',
            'gender'=>'required',
        ]);

        $user = User::create([
            'name'=>$fields['name'],
            'surname'=>$fields['surname'],
            'email'=>$fields['email'],
            'username'=>$fields['username'],
            'password'=>bcrypt($fields['password']),
            'dob'=>$fields['dob'],
            'gender'=>$fields['gender'],            
        ]);

        $response = [
            'user'=>$user
        ];

        return response($response, 200);
    }
    
    public function login(Request $request){

        $fields= $request->validate([
            'username'=>'required|string|',
            'password'=>'required|string|',
        ]);

        // $user = User::where('email'->);

        $user = DB::table('users')
                    ->select('username', 'email', 'name', 'password')
                    ->where('email', $fields['username'])
                    ->orWhere('username', $fields['username'])
                    ->first();


        if (!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message'=>'Bad Credentials'
            ], 401);
        }

        $response = [
            'username'=>$user->username,
            'name'=>$user->name,
            'email'=>$user->email,
        ];

        return response($response, 201);

       
    }




    public function index()
    {
        return [
            'name'=>'Arben',
            'surname'=>'Dedaj',
            'age' => '24'
        ];
    }
    //
}
