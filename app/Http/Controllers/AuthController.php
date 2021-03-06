<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login');
    }
  
    public function login(Request $request)
    {
        $rules = [
            'id_member'             => 'required',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'id_member.required'    => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'id_member' => $request->input('id_member'),
            'password'  => $request->input('password'),
            'role'      => 'user'
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister()
    {
        return view('register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'id_member'             => 'required|unique:users,id_member',
            'password'              => 'required|confirmed',
            'address'               => 'required'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'id_member.required'    => 'Username wajib diisi',
            'id_member.unique'      => 'Username sudah terdaftar',
            'address.required'      => 'Alamat wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->role = 'user';
        $user->name = ucwords(strtolower($request->name));
        $user->id_member = strtolower($request->id_member);
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        // $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Berhasil menambahkan member!');
            return redirect()->route('admin');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }

    public function showFormLoginAdmin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('admin');
        }
        return view('admin.login');
    }
  
    public function loginAdmin(Request $request)
    {
        $rules = [
            'id_member'             => 'required',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'id_member.required'    => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'id_member' => $request->input('id_member'),
            'password'  => $request->input('password'),
            'role'      => 'admin'
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('admin');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('admin.login');
        }
  
    }

    public function logoutAdmin()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('admin.login');
    }
}
