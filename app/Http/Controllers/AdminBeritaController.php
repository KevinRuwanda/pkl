<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminBerita;
use Illuminate\Support\Facades\DB;
class AdminBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('AdminBerita');
        // $berita = AdminBerita::get();
        $berita= DB::table('berita_admin')->paginate(20);
        return view('AdminBerita', ['berita' => $berita]);
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
        'gambar' => 'required|mimes:jpg,jpeg,png|max:1024',
        'judul' => 'required',
        'deskripsi' => 'required',
      ],
      [
        'judul.required' => 'Judul Tidak Boleh Kosong!',
        'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
        'gambar.required' => 'Gambar Tidak Boleh Kosong!',
        'gambar.mimes' => 'Format Gambar Harus JPG,JPEG,PNG'
      ]
      )->validate();
      $new_berita = new AdminBerita;
      $new_berita->judul = $request->get('judul');
      $new_berita->deskripsi = $request->get('deskripsi');
      $gambar = $request->file('gambar');
      if ($gambar) {
        $gambar_path1 = $gambar->store('berita','public');
        $new_berita->gambar = $gambar_path1;
      }
      $new_berita->save();
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
        return view('EditBerita')->with('berita', AdminBerita::find($id));
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
      $data = \App\AdminBerita::find($id);
      // $data->name_produk = $request->get('name_produk');
      $data->judul = $request->get('judul');
      $data->deskripsi = $request->get('deskripsi');
      $data->save();
      return redirect('/AdminBerita');
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
      $galeri = \App\AdminBerita::findOrFail($id);
      // Storage::deleteDirectory("storage/jadwal_manasik/".$jadwal->id);
      $galeri->delete();
      return back();
    }
}
