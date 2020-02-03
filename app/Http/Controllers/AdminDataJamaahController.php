<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminDataJamaah;
use Illuminate\Support\Facades\DB;
class AdminDataJamaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $jamaah = AdminDataJamaah::get();
      return view('AdminDataJamaah', ['jamaah' => $jamaah->all()]);
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
        'nama' => 'required',
        'tempat' => 'required',
        'date' => 'required',
        'phone' => 'required|max:12',
        'perumahan' => 'required',
        'kelurahan' => 'required',
        'kecamatan' => 'required',
        'tahun' => 'required|min:4',
        'porsi' => 'required',
        'no' => 'required',
        'bank' => 'required',
        'pendidikan' => 'required',
        'pekerjaan' => 'required',
        'daftar' => 'required',
        'status' => 'required',
        'jeniskelamin' => 'required',
        'rt' => 'required',
        'rw' => 'required',
        'desa' => 'required',
        'bimbingan' => 'required',
        'rombongan' => 'required',
        'kloter' => 'required',
      ],
      [
        'nama.required' => 'Nama Tidak Boleh Kosong!',
        'tempat.required' => 'Tempat Tidak Boleh Kosong!',
        'date.required' => 'Tanggal Lahir Tidak Boleh Kosong!',
        'phone.required' => 'No.Telphone Tidak Boleh Kosong!',
        'phone.max' => 'No.Telphone Maksimal 12 angka!',
        'perumahan.required' => 'Perumahan Tidak Boleh Kosong!',
        'kelurahan.required' => 'Kelurahan Tidak Boleh Kosong!',
        'kecamatan.required' => 'Kecamatan Tidak Boleh Kosong!',
        'tahun.required' => 'Tahun Keberangkatan Tidak Boleh Kosong!',
        'porsi.required' => 'No.Porsi Tidak Boleh Kosong!',
        'no.required' => 'No.Depag Tidak Boleh Kosong!',
        'bank.required' => 'Bank Tidak Boleh Kosong!',
        'pendidikan.required' => 'Pendidikan Tidak Boleh Kosong!',
        'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong!',
        'daftar.required' => 'Tahun Pendaftaran Tidak Boleh Kosong!',
        'status.required' => 'Status Tidak Boleh Kosong!',
        'bank.required' => 'Bank Tidak Boleh Kosong!',
        'jeniskelamin.required' => 'Jenis Kelamin Tidak Boleh Kosong!',
        'rt.required' => 'RT Kosong!',
        'rw.required' => 'RW Kosong!',
        'rombongan.required' => 'Rombongan Kosong!',
        'kloter.required' => 'Kloter Kosong!',
        'desa.required' => 'Desa Tidak Boleh Kosong!',
        'bimbingan.required' => 'Bimbingan Tidak Boleh Kosong!',
      ]
      )->validate();

      $new_jamaah = new AdminDataJamaah;
      $new_jamaah->nama = $request->get('nama');
      $new_jamaah->tempat = $request->get('tempat');
      $new_jamaah->tanggal_lahir = $request->get('date');
      $new_jamaah->telphone = $request->get('phone');
      $new_jamaah->perumahan = $request->get('perumahan');
      $new_jamaah->kelurahan = $request->get('kelurahan');
      $new_jamaah->kecamatan = $request->get('kecamatan');
      $new_jamaah->thn_keberangkatan = $request->get('tahun');
      $new_jamaah->no_porsi = $request->get('porsi');
      $new_jamaah->no_depag = $request->get('no');
      $new_jamaah->bank = $request->get('bank');
      $new_jamaah->pendidikan = $request->get('pendidikan');
      $new_jamaah->pekerjaan = $request->get('pekerjaan');
      $new_jamaah->tanggal_daftar = $request->get('daftar');
      $new_jamaah->status = $request->get('status');
      $new_jamaah->desa = $request->get('desa');
      $new_jamaah->rt = $request->get('rt');
      $new_jamaah->rw = $request->get('rw');
      $new_jamaah->rombongan = $request->get('rombongan');
      $new_jamaah->kloter = $request->get('kloter');
      $new_jamaah->bimbingan = $request->get('bimbingan');
      $new_jamaah->jenis_kelamin = $request->get('jeniskelamin');
      $new_jamaah->save();
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
        return view('EditJamaah')->with('jamaah', AdminDataJamaah::find($id));
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
      \Validator::make($request->all(),
      [
        'nama' => 'required',
        'tempat' => 'required',
        'date' => 'required',
        'phone' => 'required|max:12',
        'perumahan' => 'required',
        'kelurahan' => 'required',
        'kecamatan' => 'required',
        'tahun' => 'required|min:4',
        'porsi' => 'required',
        'no' => 'required',
        // 'bank' => 'required',
        // 'pendidikan' => 'required',
        // 'pekerjaan' => 'required',
        'daftar' => 'required',
        // 'status' => 'required',
        // 'jeniskelamin' => 'required',
        'rt' => 'required',
        'rw' => 'required',
        // 'desa' => 'required',
        // 'bimbingan' => 'required'
      ],
      [
        'nama.required' => 'Nama Tidak Boleh Kosong!',
        'tempat.required' => 'Tempat Tidak Boleh Kosong!',
        'date.required' => 'Tanggal Lahir Tidak Boleh Kosong!',
        'phone.required' => 'No.Telphone Tidak Boleh Kosong!',
        'phone.max' => 'No.Telphone Maksimal 12 angka!',
        'perumahan.required' => 'Perumahan Tidak Boleh Kosong!',
        'kelurahan.required' => 'Kelurahan Tidak Boleh Kosong!',
        'kecamatan.required' => 'Kecamatan Tidak Boleh Kosong!',
        'tahun.required' => 'Tahun Keberangkatan Tidak Boleh Kosong!',
        'porsi.required' => 'No.Porsi Tidak Boleh Kosong!',
        'no.required' => 'No.Depag Tidak Boleh Kosong!',
        // 'bank.required' => 'Bank Tidak Boleh Kosong!',
        // 'pendidikan.required' => 'Pendidikan Tidak Boleh Kosong!',
        // 'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong!',
        'daftar.required' => 'Tahun Pendaftaran Tidak Boleh Kosong!',
        // 'status.required' => 'Status Tidak Boleh Kosong!',
        'bank.required' => 'Bank Tidak Boleh Kosong!',
        // 'jeniskelamin.required' => 'Jenis Kelamin Tidak Boleh Kosong!',
        'rt.required' => 'RT Kosong!',
        'rw.required' => 'RW Kosong!',
        // 'desa.required' => 'Desa Tidak Boleh Kosong!',
        'bimbingan.required' => 'Bimbingan Tidak Boleh Kosong!',
      ]
      )->validate();

      $data = \App\AdminDataJamaah::find($id);
      $data->nama = $request->get('nama');
      $data->tempat = $request->get('tempat');
      $data->tanggal_lahir = $request->get('date');
      $data->telphone = $request->get('phone');
      $data->perumahan = $request->get('perumahan');
      $data->kelurahan = $request->get('kelurahan');
      $data->kecamatan = $request->get('kecamatan');
      $data->thn_keberangkatan = $request->get('tahun');
      $data->no_porsi = $request->get('porsi');
      $data->no_depag = $request->get('no');
      $data->bank = $request->get('bank');
      $data->pendidikan = $request->get('pendidikan');
      $data->pekerjaan = $request->get('pekerjaan');
      $data->tanggal_daftar = $request->get('daftar');
      $data->status = $request->get('status');
      $data->pekerjaan = $request->get('pekerjaan');
      $data->rt = $request->get('rt');
      $data->rw = $request->get('rw');
      $data->desa = $request->get('desa');
      $data->bimbingan = $request->get('bimbingan');
      $data->jenis_kelamin = $request->get('jeniskelamin');
      $data->kloter = $request->get('kloter');
      $data->bimbingan = $request->get('bimbingan');
      $data->save();
      return redirect('/AdminDataJamaah');
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
      $galeri = \App\AdminDataJamaah::findOrFail($id);
      // Storage::deleteDirectory("storage/jadwal_manasik/".$jadwal->id);
      $galeri->delete();
      return back();
    }
}
