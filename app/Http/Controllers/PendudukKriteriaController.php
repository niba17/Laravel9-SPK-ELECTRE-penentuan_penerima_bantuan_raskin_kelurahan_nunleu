<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\PendudukKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PendudukKriteriaController extends Controller
{
    public function create()
    {
        $kriteria = Kriteria::get();

        session()->forget(['succSAWMessage', 'errSAWMessage']);
        return view('add.penduduk_kriteria-add', ['kriteria' => $kriteria]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'penduduk_id' => 'required',
            'kriteria_id' => 'required',
            'bobot' => 'required|gte:1|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib dipilih!',

            'penduduk_id.required' => 'Penduduk wajib dipilih!',

            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gte' => 'Bobot mimal adalah 0!',
        ];

        $request->validate($rules, $messages);

        // if (is_numeric($request->range_awal) == false) {
        //     $error = \Illuminate\Validation\ValidationException::withMessages([
        //         'range_awal' => ['Range awal harus berupa angka!'],
        //     ]);
        //     throw $error;
        // }

        $result = PendudukKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/penduduk');
    }

    public function edit($id)
    {
        $penduduk_kriteria = PendudukKriteria::with(['penduduk', 'kriteria'])->findOrFail($id);
        $kriteria = Kriteria::get();
        // $sub_kriteria = SubKriteria::with(['penduduk_kriteria.penduduk'])->get();

        return view('edit.penduduk_kriteria-edit', ['penduduk_kriteria' => $penduduk_kriteria, 'kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $penduduk_kriteria = PendudukKriteria::findOrFail($id);

        $rules = [
            'kriteria_id' => 'required',
            'penduduk_id' => 'required',
            'bobot' => 'required|gte:1|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib dipilih!',

            'penduduk_id.required' => 'Penduduk wajib dipilih!',

            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gte' => 'Bobot mimal adalah 0!',
        ];

        $request->validate($rules, $messages);

        $result = $penduduk_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/penduduk');
    }

    public function destroy($id)
    {
        $penduduk_kriteria = PendudukKriteria::findOrFail($id);
        $result = $penduduk_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal dihapus!');
        }

        return redirect('/penduduk');
    }
}