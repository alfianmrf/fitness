<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    public function index()
    {
        $information = DB::table('information')->get();
        return view('admin.informasi.detail', compact(['information']));
    }

    public function add()
    {
        return view('admin.informasi.add');
    }

    public function edit($id)
    {
        $information = DB::table('information')->where('id', $id)->first();
        return view('admin.informasi.edit', compact(['information']));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($photo = $request->file('photo')) {
            $destinationPath = 'assets/information/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        }else{
            unset($data['photo']);
        }

        if (DB::table('information')->where('id', $id)->update($data)) {
            return redirect()->route('admin.informasi');
        }
        else{
            return back();
        }
    }

    public function new(Request $request)
    {

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($photo = $request->file('photo')) {
            $destinationPath = 'assets/information/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        }

        if (DB::table('information')->insert($data)) {
            return redirect()->route('admin.informasi');
        }
        else{
            return back();
        }
    }

    public function delete($id)
    {
        $information = DB::table('information')->where('id', $id);
        $information->delete();
        return redirect()->back();
    }
}
