<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminJadwalManasik;
use App\AdminGaleri;
use App\AdminBerita;
use App\AdminTausiyah;
use Illuminate\Support\Facades\DB;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('HomeUser');
        // $jadwal = AdminJadwalManasik::get();
        $galeri = AdminGaleri::get();
        // $berita = AdminBerita::get();
        $berita = DB::table('berita_admin')->paginate(3);
        $jadwal = DB::SELECT("SELECT * FROM jadwal_manasik ORDER BY id DESC LIMIT 1");
        $tausiyah = DB::SELECT("SELECT * FROM admin_tausiyah ORDER BY id DESC LIMIT 1");
        return view('HomeUser', ['jadwal' => $jadwal, 'tausiyah' => $tausiyah], ['galeri' => $galeri->all(), 'berita'=> $berita]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $berita = \App\AdminBerita::findOrFail($id);
      return view('BeritaAcaraUser',compact('berita'));
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
}
