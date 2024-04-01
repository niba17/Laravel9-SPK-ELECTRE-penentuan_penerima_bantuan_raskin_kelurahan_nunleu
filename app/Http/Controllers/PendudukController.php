<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Tingkat;
use App\Models\Kelas;
use App\Models\Kecamatan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Kelurahan;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PendudukController extends Controller
{
    // public function index(Type $var = null)
    // {
    //     $siswa = Penduduk::get();

    //     return view('siswa', ['siswa' => $siswa]);
    // }

    public function create()
    {
        return view('add.penduduk-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:penduduk|max:50|required';
        $messages['nama.unique'] = 'Nama Penduduk sudah ada!';
        $messages['nama.max'] = 'Nama Penduduk tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama Penduduk wajib diisi!';

        $rules['nik'] = 'unique:penduduk|max:50|required';
        $messages['nik.unique'] = 'NIK sudah ada!';
        $messages['nik.max'] = 'NIK tidak boleh lebih dari :max karakter!';
        $messages['nik.required'] = 'NIK wajib diisi!';

        $rules['jk'] = 'required';
        $messages['jk.required'] = 'Jenis Kelamin dipilih!';

        $rules['tgl_lahir'] = 'required';
        $messages['tgl_lahir.required'] = 'Tanggal lahir wajib diisi!';

        $rules['alamat'] = 'required';
        $messages['alamat.required'] = 'Alamat wajib diisi!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $kasus = Penduduk::create($arrayAdd->all());

        if ($kasus) {
            Session::flash('succMessage', 'Penduduk berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Penduduk gagal ditambahkan!');
        }

        return redirect('/penduduk_sub_kriteria');
    }

    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $jk = ['Laki - Laki', 'Perempuan'];

        return view('edit.penduduk-edit', ['penduduk' => $penduduk, 'jk' => $jk]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $penduduk = Penduduk::findOrFail($id);

        if ($request->nama != $penduduk->nama) {
            $rules['nama'] = 'unique:penduduk|max:50|required';
            $messages['nama.unique'] = 'Nama Penduduk Sudah ada!';
            $messages['nama.required'] = 'Nama Penduduk wajib Diisi!';
            $messages['nama.max'] = 'Nama Penduduk tidak boleh lebih dari :max karakter!';
        }

        if ($request->nik != $penduduk->nik) {
            $rules['nik'] = 'unique:penduduk|required';
            $messages['nik.unique'] = 'NIK Sudah ada!';
            $messages['nik.required'] = 'NIK wajib Diisi!';
        }

        $rules['jk'] = 'required';
        $messages['jk.required'] = 'Jenis kelamin wajib diisi!';

        $rules['tgl_lahir'] = 'required';
        $messages['tgl_lahir.required'] = 'Tanggal wajib diisi!';

        $rules['alamat'] = 'required';
        $messages['alamat.required'] = 'Alamat wajib diisi!';


        $request->validate($rules, $messages);

        $result = $penduduk->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Penduduk berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Penduduk gagal diubah!');
        }

        return redirect('/penduduk_sub_kriteria');
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $result = $penduduk->delete();

        if ($result) {
            Session::flash('succMessage', 'Penduduk berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Penduduk gagal dihapus!');
        }

        return redirect('/penduduk_sub_kriteria');
    }

    public function request()
    {
        $penduduk = Penduduk::with(['penduduk_sub_kriteria.sub_kriteria.kriteria_sub_kriteria'])->get();
        $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::get();

        return response()->json([$penduduk, $kriteria, $sub_kriteria]);
    }
}