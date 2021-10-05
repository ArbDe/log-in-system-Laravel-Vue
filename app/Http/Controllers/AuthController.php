<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
