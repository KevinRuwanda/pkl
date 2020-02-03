<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminJadwalManasik;
use Storage;
use Illuminate\Support\Facades\DB;
class AdminJadwalManasikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('AdminJadwalManasik');
        // $jadwal = AdminJadwalManasik::get();
        $jadwal= DB::table('jadwal_manasik')->paginate(10);
        return view('AdminJadwalManasik', ['jadwal' => $jadwal]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      \Validator::make($request->all(),
      [
        'jadwal' => 'required|mimes:jpg,jpeg,png|max:1024',
      ],
      [
        'jadwal.required' => 'Gambar Tidak Boleh Kosong!',
        'jadwal.mimes' => 'Format Gambar Harus JPG,JPEG,PNG'
      ]
      )->validate();
        $new_jadwal = new AdminJadwalManasik;
        $gambar = $request->file('jadwal');
        if ($gambar) {
          $gambar_path1 = $gambar->store('jadwal_manasik','public');
          $new_jadwal->jadwal = $gambar_path1;
        }
        $new_jadwal->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $Request,$id)
    {
      $jadwal = \App\AdminJadwalManasik::findOrFail($id);
      Storage::deleteDirectory("storage/jadwal_manasik/".$jadwal->id);
      $jadwal->delete();
      return back();
    }
}
