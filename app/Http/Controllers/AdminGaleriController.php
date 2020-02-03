<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminGaleri;
use Illuminate\Support\Facades\DB;
class AdminGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('AdminGaleri');
        // $galeri = AdminGaleri::get();
        $galeri = DB::table('galeri_admin')->paginate(20);
        return view('AdminGaleri', ['galeri' => $galeri]);
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
        'keterangan' => 'required',
      ],
      [
        'keterangan.required' => 'Judul Tidak Boleh Kosong!',
        'gambar.required' => 'Gambar Tidak Boleh Kosong!',
        'gambar.mimes' => 'Format Gambar Harus JPG,JPEG,PNG'
      ]
      )->validate();
      $new_galeri = new AdminGaleri;
      $new_galeri->keterangan = $request->get('keterangan');
      $gambar = $request->file('gambar');
      if ($gambar) {
        $gambar_path1 = $gambar->store('galeri','public');
        $new_galeri->gambar = $gambar_path1;
      }
      $new_galeri->save();
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
        return view('EditGaleri')->with('galeri', AdminGaleri::find($id));
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
      $data = \App\AdminGaleri::find($id);
      // $data->name_produk = $request->get('name_produk');
      $data->keterangan = $request->get('judul');
      $data->save();
      return redirect('/AdminGaleri');
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
      $galeri = \App\AdminGaleri::findOrFail($id);
      // Storage::deleteDirectory("storage/jadwal_manasik/".$jadwal->id);
      $galeri->delete();
      return back();
    }
}
