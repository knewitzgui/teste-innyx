<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request){
        $users = User::get(['nome', 'email', 'cep']);

        return view('home', ['users' => $users]);
    }
}
