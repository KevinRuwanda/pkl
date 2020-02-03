<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminTambahPeriode;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // $periode = AdminTambahPeriode::get();
      $periode = DB::table('admin_tambah_periode')->paginate(5);
      return view('home', ['periode' => $periode]);
    }
}
