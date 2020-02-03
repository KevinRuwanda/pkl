<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminTausiyah;
use Illuminate\Support\Facades\DB;
class AdminTausiyahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('AdminTausiyah');
        // $tausiyah = AdminTausiyah::get();
        $tausiyah= DB::table('admin_tausiyah')->paginate(5);
        return view('AdminTausiyah', ['tausiyah' => $tausiyah]);
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
      $new_tausiyah = new AdminTausiyah;
      $new_tausiyah->judul = $request->get('judul');
      $new_tausiyah->deskripsi = $request->get('deskripsi');
      $new_tausiyah->save();
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
        return view('EditTausiyah')->with('tausiyah', AdminTausiyah::find($id));
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
      $data = \App\AdminTausiyah::find($id);
      // $data->name_produk = $request->get('name_produk');
      $data->judul = $request->get('judul');
      $data->deskripsi = $request->get('deskripsi');
      $data->save();
      return redirect('/AdminTausiyah');
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
      $galeri = \App\AdminTausiyah::findOrFail($id);
      // Storage::deleteDirectory("storage/jadwal_manasik/".$jadwal->id);
      $galeri->delete();
      return back();
    }
}
