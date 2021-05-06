<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('home');
        }
        else{
            return view('login');
        }
    }

    public function member()
    {
        return view('member');
    }

    public function contact()
    {
        return view('contact');
    }
}
