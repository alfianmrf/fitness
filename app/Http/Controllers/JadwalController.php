<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index()
    {
        $schedules = DB::table('schedule')->orderByRaw('FIELD(day, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")')->orderBy('time', 'asc')->get();
        return view('admin.jadwal.detail', compact(['schedules']));
    }

    public function add()
    {
        return view('admin.jadwal.add');
    }

    public function edit($id)
    {
        $schedule = DB::table('schedule')->where('id', $id)->first();
        return view('admin.jadwal.edit', compact(['schedule']));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'day' => $request->day,
            'time' => $request->time,
            'end' => $request->end,
            'close' => $request->close,
        ];

        if (DB::table('schedule')->where('id', $id)->update($data)) {
            return redirect()->route('admin.jadwal');
        }
        else{
            return back();
        }
    }

    public function new(Request $request)
    {
        $data = [
            'day' => $request->day,
            'time' => $request->time,
            'end' => $request->end,
            'close' => $request->close,
        ];

        if (DB::table('schedule')->insert($data)) {
            return redirect()->route('admin.jadwal');
        }
        else{
            return back();
        }
    }

    public function delete($id)
    {
        $schedule = DB::table('schedule')->where('id', $id);
        $schedule->delete();
        return redirect()->back();
    }
}
