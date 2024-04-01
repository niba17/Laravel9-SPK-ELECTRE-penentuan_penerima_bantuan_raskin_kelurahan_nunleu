<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\SubKriteria;
use App\Models\Penduduk;

class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        $akun = User::get();
        $penduduk = Penduduk::get();
        $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::get();

        session()->forget(['succSAWMessage']);

        return view('home', ['akun' => $akun, 'penduduk' => $penduduk, 'kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
    }
}