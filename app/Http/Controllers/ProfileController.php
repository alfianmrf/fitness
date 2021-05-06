<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $datetime = new \DateTime();
        $user = Auth::user();
        $user->name = ucwords(strtolower($request->name));
        $user->id_member = strtolower($request->id_member);
        $user->address = $request->address;
        $user->job = $request->job;
        $user->gender = $request->gender;

        if ($user->save()) {
            Session::flash('success', 'Profil berhasil diperbarui!');
            return redirect()->route('profile');
        }
        else{
            Session::flash(__('Maaf! Terjadi kesalahan.'))->error();
            return back();
        }
    }
}
