<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Penduduk;
use App\Models\Perhitungan;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

class PerhitunganController extends Controller
{
    protected $perhitungan;
    public function __construct()
    {
        $this->perhitungan = new Perhitungan();
    }

    public function hasil(Type $var = null)
    {
        $validator = $this->perhitungan->validator();
        if ($validator[0] == false) {

            $akun = User::get();
            $penduduk = Penduduk::get();
            $kriteria = Kriteria::get();
            $sub_kriteria = SubKriteria::get();

            session()->forget(['succSAWMessage']);
            Session::flash('errSAWMessage', $validator[1]);

            return view('home', ['akun' => $akun, 'penduduk' => $penduduk, 'kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
        } elseif ($validator[0] == true) {

            $electre = $this->perhitungan->electre();
            // dd($electre);
            $penduduk = Penduduk::with(['penduduk_sub_kriteria.kriteria', 'penduduk_sub_kriteria.sub_kriteria'])->get();
            $kriteria = Kriteria::get();
            $sub_kriteria = SubKriteria::get();

            $kriteria_rsort = $this->perhitungan->bubble_sort_dengan_index($kriteria, 'bobot');

            Session::flash('succSAWMessage', 'Berhasil menghitung ' . count($penduduk) . ' penduduk!');
            session()->forget(['errSAWMessage']);
            return view('perhitungan.perhitungan-hasil', ['penduduk' => $penduduk, 'kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria, 'kriteria_rsort' => $kriteria_rsort, 'electre' => $electre]);
        }

    }
    public function cetak()
    {

        $electre = $this->perhitungan->electre();

        session()->forget(['succSAWMessage', 'errSAWMessage']);
        return view('cetak.perhitungan-hasil', ['electre' => $electre]);

    }
}