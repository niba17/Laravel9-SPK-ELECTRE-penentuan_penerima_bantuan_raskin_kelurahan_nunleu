<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{
    // public function index(Type $var = null)
    // {
    //     $kriteria = Kriteria::with(['kriteria_sub_kriteria'])->get();
    //     $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria'])->get();

    //     return view('kriteria', ['kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
    // }

    public function create()
    {
        return view('add.kriteria-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'unique:kriteria|max:100|required',
            'cost_benefit' => 'required',
            'bobot' => 'required|gt:0|lte:100|numeric'
        ];

        $messages = [
            'nama.unique' => 'Kriteria sudah ada!',
            'nama.max' => 'Kriteria tidak boleh lebih dari :max karakter!',
            'nama.required' => 'Kriteria wajib diisi!',
            'cost_benefit.required' => 'Cost / Benefit wajib diisi!',
            'bobot.required' => 'Nilai Preferensi wajib diisi!',
            'bobot.gt' => 'Nilai Preferensi minimal adalah 1!',
            'bobot.lte' => 'Nilai Preferensi maksimal adalah 100!',
            'bobot.numeric' => 'Nilai Preferensi harus berupa angka!',
        ];

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $kriteria = Kriteria::create($arrayAdd->all());

        if ($kriteria) {
            Session::flash('succMessage', 'Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $c_b = ['Cost', 'Benefit'];
        return view('edit.kriteria-edit', ['kriteria' => $kriteria, 'c_b' => $c_b]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kriteria = Kriteria::findOrFail($id);

        if ($request->nama != $kriteria->nama) {
            $rules['nama'] = 'unique:kriteria|max:100|required';

            $messages['nama.unique'] = 'Kriteria sudah ada!';
            $messages['nama.max'] = 'Kriteria tidak boleh lebih dari :max karakter!';
            $messages['nama.required'] = 'Kriteria wajib diisi!';

        }

        $rules['cost_benefit'] = 'required';
        $rules['bobot'] = 'required|gt:0|lte:100|numeric';

        $messages['cost_benefit.required'] = 'Cost / Benefit wajib diisi!';
        $messages['bobot.required'] = 'Nilai Preferensi wajib diisi!';
        $messages['bobot.gt'] = 'Nilai Preferensi minimal adalah 1!';
        $messages['bobot.lte'] = 'Nilai Preferensi maksimal adalah 100!';
        $messages['bobot.numeric'] = 'Nilai Preferensi harus berupa angka!';

        $request->validate($rules, $messages);

        $arrayUp = [];
        $arrayUp = $request;

        $result = $kriteria->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    // public function request()
    // {
    //     $kriteria = Kriteria::with(['sub_kriteria.bobot_siswa'])->get();
    //     return response()->json([$kriteria]);
    // }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $result = $kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal dihapus!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function request()
    {
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria.kriteria'])->get();

        return response()->json([$kriteria, $sub_kriteria]);
    }

    public function request_penduduk()
    {
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria.kriteria'])->get();

        return response()->json([$kriteria, $sub_kriteria]);
    }
}