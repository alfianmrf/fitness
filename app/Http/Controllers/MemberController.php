<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class MemberController extends Controller
{
    public function delete($id)
    {
        $member = DB::table('users')->where('id', $id);
        $member->delete();
        return redirect()->back();
    }

    public function detail($id)
    {
        $member = DB::table('users')->where('id', $id)->first();
        return view('admin.member.detail', compact(['member']));
    }

    public function edit($id)
    {
        $member = DB::table('users')->where('id', $id)->first();
        return view('admin.member.edit', compact(['member']));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => ucwords(strtolower($request->name)),
            'id_member' => strtolower($request->id_member),
            'address' => $request->address,
            'job' => $request->job,
            'gender' => $request->gender,
        ];

        $datetime = new \DateTime();

        if (DB::table('users')->where('id', $id)->update($data)) {
            return redirect()->route('admin');
        }
        else{
            return back();
        }
    }
}
