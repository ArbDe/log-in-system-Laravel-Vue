<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Response;

use App\Models\User;
use Illuminate\Validation\ValidationException;
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
            'user'=>$user,
        ];

        return response($response, 200);
    }
    
    public function login(Request $request){

        // dump($request);

        $fields= $request->validate([
            'username'=>'required|string|',
            'password'=>'required|string|',
        ]);

        // $user = User::where('email'->);

        $user = User::where('email', $fields['username'])
                            ->orWhere('username', $fields['username'])->first();         


        if (!$user || !Hash::check($fields['password'], $user->password)){
           
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect']
            ]);
        }

        $token = $user->createToken(env('APP_KEY'))->plainTextToken;


        $response = [
           
            "message"=>"Sucess!",
            "token"=>$token
        ];

        return response($response, 201);
       
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message'=>'Logged out!'
        ], 200);
    }

    public function test(){
        return [
            'adad'=>'asdasd',
            'adasd'=>'asdasd',
            'adad'=>'asdasd',
            'aadad'=>'asdasd',
            'adsdad'=>'asdasd',
            'adadsda'=>'asdasd',
        ];
    }
    
}
