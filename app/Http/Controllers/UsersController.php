<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserInfo()
    {
        return response(Auth::user(), 200);
        
    }
}
