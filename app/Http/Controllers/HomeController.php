<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            $schedules = DB::table('schedule')->orderByRaw('FIELD(day, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")')->orderBy('time', 'asc')->get();
            $information = DB::table('information')->get();
            if($role == "admin"){
                return redirect()->to('admin');
            } else if($role == "user"){
                return view('home', compact(['schedules', 'information']));
            }
            else{
                return view('login');
            }
        }
        else{
            return view('login');
        }
    }

    public function informasi($id)
    {
        $information = DB::table('information')->where('id', $id)->first();
        return view('informasi', compact(['information']));
    }

    public function member()
    {
        return view('member');
    }

    public function contact()
    {
        $contact = DB::table('contact')->where('type', 'wa')->first();
        return view('contact', compact(['contact']));
    }

    public function admin()
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            $user = DB::table('users')->where('role', 'user')->get();
            if($role == "admin"){
                return view('admin.home', compact(['user']));
            } else if($role == "user"){
                return view('home');
            }
            else{
                return view('admin.login');
            }
        }
        else{
            return view('admin.login');
        }
    }
}
