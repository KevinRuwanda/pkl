<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminTambahPeriode;
class AdminTambahPeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
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
        'tahun1' => 'required|min:4',
        'tahun2' => 'required|min:4',
      ],
      [
        'tahun1.required' => 'Tahun1 Tidak Boleh Kosong!',
        'tahun2.required' => 'Tahun2 Tidak Boleh Kosong!',
        'tahun1.min' => 'Tahun1 Minimal 4 Angka!',
        'tahun2.min' => 'Tahun1 Minimal 4 Angka!',
        'gambar.required' => 'Gambar Tidak Boleh Kosong!',
        'gambar.mimes' => 'Format Gambar Harus JPG,JPEG,PNG',
      ]
      )->validate();
      $new_periode = new AdminTambahPeriode;
      $new_periode->tahun_periode1 = $request->get('tahun1');
      $new_periode->tahun_periode2 = $request->get('tahun2');
      $gambar = $request->file('gambar');
      if ($gambar) {
        $gambar_path1 = $gambar->store('periode','public');
        $new_periode->gambar = $gambar_path1;
      }
      $new_periode->save();
      return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('AdminDataPengurus');
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
      $galeri = \App\AdminTambahPeriode::findOrFail($id);
      // Storage::deleteDirectory("storage/jadwal_manasik/".$jadwal->id);
      $galeri->delete();
      return back();
    }
}
