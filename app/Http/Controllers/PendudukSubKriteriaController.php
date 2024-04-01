<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Kriteria;
use App\Models\PendudukSubKriteria;
use App\Models\SubKriteria;
use App\Models\KriteriaSubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PendudukSubKriteriaController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::with(['penduduk_sub_kriteria.kriteria', 'penduduk_sub_kriteria.sub_kriteria.kriteria_sub_kriteria'])->get();
        $penduduk_sub_kriteria = SubKriteria::get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::get();
        $kriteria = Kriteria::get();

        session()->forget(['errSAWMessage', 'succSAWMessage']);

        return view('penduduk_sub_kriteria', ['penduduk' => $penduduk, 'penduduk_sub_kriteria' => $penduduk_sub_kriteria, 'kriteria' => $kriteria, 'kriteria_sub_kriteria' => $kriteria_sub_kriteria]);
    }

    public function set($id)
    {
        $penduduk = Penduduk::with(['penduduk_sub_kriteria.sub_kriteria', 'penduduk_sub_kriteria.kriteria'])->findOrFail($id);
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::get();
        $penduduk_sub_kriteria_get = PendudukSubKriteria::get();
        // dd($penduduk);
        return view('set.penduduk_sub_kriteria-set', ['penduduk' => $penduduk, 'kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria, 'penduduk_sub_kriteria_get' => $penduduk_sub_kriteria_get]);
    }

    public function apply(Request $request)
    {
        $kriteria = Kriteria::with(['kriteria_sub_kriteria'])->get();
        $penduduk = Penduduk::with(['penduduk_sub_kriteria'])->findOrFail($request->id);
        $penduduk_sub_kriteria = PendudukSubKriteria::with(['penduduk'])->get();
        $rules['penduduk_id'] = 'required';

        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            if (isset($value_kriteria->kriteria_sub_kriteria) && count($value_kriteria->kriteria_sub_kriteria) > 0) {

                $rules['K_' . $value_kriteria->id] = 'required';

            }

        }

        $messages['penduduk_id.required'] = 'Penduduk wajib dipilih!';

        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            if (isset($value_kriteria->kriteria_sub_kriteria) && count($value_kriteria->kriteria_sub_kriteria) > 0) {

                $messages['K_' . $value_kriteria->id . '.required'] = $value_kriteria->nama . ' wajib dipilih!';

            }

        }

        $request->validate($rules, $messages);

        $arr = [];

        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            $arr[$key_kriteria] = [
                'penduduk_id' => $request->id,
                'kriteria_id' => $value_kriteria->id,
            ];

        }

        $i = 0;
        foreach ($request->all() as $key_request_all => $value_request_all) {

            if ($key_request_all !== '_method' && $key_request_all !== '_token' && $key_request_all !== 'penduduk_id') {

                $arr[$i]['sub_kriteria_id'] = $value_request_all;

                $i++;
            }

        }

        $penduduk_sub_kriteria_arr = [];
        foreach ($penduduk_sub_kriteria as $key_penduduk_sub_kriteria => $value_penduduk_sub_kriteria) {

            $penduduk_sub_kriteria_arr[$key_penduduk_sub_kriteria] = [
                'id' => $value_penduduk_sub_kriteria->id,
                'penduduk_id' => $value_penduduk_sub_kriteria->penduduk_id,
                'kriteria_id' => $value_penduduk_sub_kriteria->kriteria_id,
                'sub_kriteria_id' => $value_penduduk_sub_kriteria->sub_kriteria_id,
            ];

        }

        $temp = [];
        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            if (isset($value_kriteria->kriteria_sub_kriteria) && count($value_kriteria->kriteria_sub_kriteria) > 0) {

                $penduduk_sub_kriteria_id = 0;
                $kriteria_miss = true;
                foreach ($penduduk_sub_kriteria_arr as $key_penduduk_sub_kriteria => $value_penduduk_sub_kriteria) {

                    if ($request->id == $value_penduduk_sub_kriteria['penduduk_id']) {

                        if ($arr[$key_kriteria]['kriteria_id'] == $value_penduduk_sub_kriteria['kriteria_id']) {

                            if ($arr[$key_kriteria]['sub_kriteria_id'] !== $value_penduduk_sub_kriteria['sub_kriteria_id']) {

                                $penduduk_sub_kriteria_id = $value_penduduk_sub_kriteria['id'];
                                $kriteria_miss = false;

                            }

                        }

                    }

                }

                if ($kriteria_miss == true) {

                    $result = PendudukSubKriteria::create($arr[$key_kriteria]);

                } else {

                    $penduduk_sub_kriteria = PendudukSubKriteria::findOrFail($penduduk_sub_kriteria_id);
                    $result = $penduduk_sub_kriteria->update($arr[$key_kriteria]);
                }

            }

        }

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/penduduk_sub_kriteria');
    }

    public function create()
    {
        $penduduk = Penduduk::get();
        return view('add.penduduk_sub_kriteria-add', ['penduduk' => $penduduk]);
    }

    public function store(Request $request)
    {
        $rules = [
            'penduduk_id' => 'required',
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
        ];

        $messages = [
            'penduduk_id.required' => 'Penduduk wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
            'sub_kriteria_id.required' => 'Sub Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = PendudukSubKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/penduduk_sub_kriteria');
    }

    public function edit($id)
    {
        $penduduk = Penduduk::get();
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria', 'penduduk_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria'])->get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::get();
        $penduduk_sub_kriteria = PendudukSubKriteria::with(['penduduk', 'sub_kriteria.kriteria_sub_kriteria'])->findOrFail($id);
        $penduduk_sub_kriteria_get = PendudukSubKriteria::get();

        return view('edit.penduduk_sub_kriteria-edit', ['penduduk_sub_kriteria' => $penduduk_sub_kriteria, 'sub_kriteria' => $sub_kriteria, 'penduduk' => $penduduk, 'kriteria' => $kriteria, 'kriteria_sub_kriteria' => $kriteria_sub_kriteria, 'penduduk_sub_kriteria_get' => $penduduk_sub_kriteria_get]);
    }

    public function update(Request $request, $id)
    {
        $penduduk_sub_kriteria = PendudukSubKriteria::findOrFail($id);
        // dd($request->all());
        $rules = [
            'penduduk_id' => 'required',
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
        ];

        $messages = [
            'penduduk_id.required' => 'Penduduk wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
            'sub_kriteria_id.required' => 'Sub Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = $penduduk_sub_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/penduduk_sub_kriteria');
    }

    public function destroy($id)
    {
        $penduduk_sub_kriteria = PendudukSubKriteria::findOrFail($id);
        $result = $penduduk_sub_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/penduduk_sub_kriteria');
    }
}