<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        $contact = DB::table('contact')->where('type', 'wa')->first();
        return view('admin.contact.detail', compact(['contact']));
    }

    public function edit()
    {
        $contact = DB::table('contact')->where('type', 'wa')->first();
        return view('admin.contact.edit', compact(['contact']));
    }

    public function update(Request $request)
    {
        $data = [
            'content' => $request->content
        ];

        if (DB::table('contact')->where('type', 'wa')->limit(1)->update($data)) {
            return redirect()->route('admin.contact');
        }
        else{
            return back();
        }
    }
}
