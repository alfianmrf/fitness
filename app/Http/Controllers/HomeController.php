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
        $information = DB::table('information')->where('id', $id)->first();
        return view('informasi', compact(['information']));
    }

    public function notifikasi()
    {
        $user = Auth::user();
        $notification = DB::table('transaction')->where('id_member', $user->id_member)->get();
        return view('notifikasi', compact(['notification']));
    }

    public function contact()
    {
        $contacts = DB::table('contact')->get();
        return view('contact', compact(['contacts']));
    }

    public function pembayaran()
    {
        $user = Auth::user();
        $payment = DB::table('transaction')->where([
            ['id_member', $user->id_member],
            ['verification', 0],
        ])->get();
        return view('pembayaran', compact(['payment']));
    }

    public function admin(Request $request)
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            $user = DB::table('users')->when($request->keyword, function ($query) use ($request) {
                $query
                ->where('name', 'like', "%{$request->keyword}%")
                ->orWhere('id_member', 'like', "%{$request->keyword}%")
                ->orWhere('address', 'like', "%{$request->keyword}%");
            })->where('role', 'user')->get();

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
