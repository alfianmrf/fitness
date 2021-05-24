<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaction = DB::table('transaction')->when($request->keyword, function ($query) use ($request) {
            $query
            ->where('id_member', 'like', "%{$request->keyword}%")
            ->orWhere('name_member', 'like', "%{$request->keyword}%");
        })->get();
        return view('admin.transaksi.detail', compact(['transaction']));
    }

    public function add()
    {
        $id_member = DB::table('users')->where('role', 'user')->get(['id_member', 'name']);
        return view('admin.transaksi.add', compact(['id_member']));
    }

    public function edit($id)
    {
        $transaction = DB::table('transaction')->where('id', $id)->first();
        return view('admin.transaksi.edit', compact(['transaction']));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'total' => $request->total,
            'type' => $request->type,
        ];

        if (DB::table('transaction')->where('id', $id)->update($data)) {
            return redirect()->route('admin.transaksi');
        }
        else{
            return back();
        }
    }

    public function new(Request $request)
    {
        $data = [
            'id_member' => $request->id_member,
            'name_member' => $request->name,
            'total' => $request->total,
            'type' => $request->type,
            'verification' => 0,
        ];

        if (DB::table('transaction')->insert($data)) {
            return redirect()->route('admin.transaksi');
        }
        else{
            return back();
        }
    }

    public function delete($id)
    {
        $information = DB::table('transaction')->where('id', $id);
        $information->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $name = DB::table('users')->where('id_member', $request->get('id_member'))
            ->get('name');
    
        return response()->json($name);
    }

    public function pembayaranUpload(Request $request, $id)
    {
        $data = [];

        if ($photo = $request->file('photo')) {
            $destinationPath = 'assets/upload/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        }else{
            unset($data['photo']);
        }

        if (DB::table('transaction')->where('id', $id)->update($data)) {
            return redirect()->route('pembayaran');
        }
        else{
            return back();
        }
    }

    public function notifikasi()
    {
        $notification = DB::table('transaction')->where([
            ['verification', 0],
            ['photo', '!=', null]
        ])->get();
        return view('admin.notifikasi.detail', compact(['notification']));
    }

    public function verifikasi(Request $request, $id)
    {
        $data = [
            'verification' => 1
        ];

        if (DB::table('transaction')->where('id', $id)->update($data)) {
            return redirect()->route('admin.notifikasi');
        }
        else{
            return back();
        }
    }
}
