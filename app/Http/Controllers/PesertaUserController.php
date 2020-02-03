<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\FormRequestStore;
use Illuminate\Support\Facades\input;
use App\AdminDataJamaah;
class PesertaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('PesertaUser');
    }

    public function search(Request $request)
    {
      \Validator::make($request->all(),
      [
        'nama' => 'required|min:2',
      ],
      [
        'nama.required' => 'Tidak Boleh Kosong!',
        'nama.min' => 'Minimal 2 Huruf',
      ]
      )->validate();
      $nama = input::get('nama');
      if ($nama != "") {
         $jamaah = AdminDataJamaah::where('no_porsi','LIKE','%'.$nama.'%')->orWhere('no_depag','LIKE','%'.$nama.'%')->get();
         if(count($jamaah) > 0)
            return view('PesertaUser')->withDetails($jamaah)->withQuery ( $nama );
      }
      return view ('PesertaUser')->withMessage('Data Tidak Ada !');
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
}
