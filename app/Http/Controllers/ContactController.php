<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        $contact = DB::table('contact')->get();
        return view('admin.contact.detail', compact(['contact']));
    }

    public function add()
    {
        return view('admin.contact.add');
    }

    public function edit($id)
    {
        $contact = DB::table('contact')->where('id', $id)->first();
        return view('admin.contact.edit', compact(['contact']));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'content' => $request->content,
        ];

        if ($logo = $request->file('logo')) {
            $destinationPath = 'assets/contact/';
            $profileImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $profileImage);
            $data['logo'] = "$profileImage";
        }else{
            unset($data['photo']);
        }

        if (DB::table('contact')->where('id', $id)->update($data)) {
            return redirect()->route('admin.contact');
        }
        else{
            return back();
        }
    }

    public function new(Request $request)
    {
        $data = [
            'name' => $request->name,
            'content' => $request->content,
        ];

        if ($logo = $request->file('logo')) {
            $destinationPath = 'assets/contact/';
            $profileImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $profileImage);
            $data['logo'] = "$profileImage";
        }

        if (DB::table('contact')->insert($data)) {
            return redirect()->route('admin.contact');
        }
        else{
            return back();
        }
    }

    public function delete($id)
    {
        $contact = DB::table('contact')->where('id', $id);
        $contact->delete();
        return redirect()->back();
    }
}
