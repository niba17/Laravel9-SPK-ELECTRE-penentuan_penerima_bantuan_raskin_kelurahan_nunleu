@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Kriteria')
@section('content')

    <div class="container-fluid py-5">
        <div class="row p-4">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">

                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Tambah Kriteria</h4>
                                            <hr>
                                            {{-- <div class="bd-example"> --}}
                                            <form action="/kriteria-store" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                id="nama" name="nama" value="{{ old('nama') }}"
                                                                aria-describedby="emailHelp" placeholder="...">
                                                            @error('nama')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                                        <a href="/kriteria_sub_kriteria"
                                                            class="btn btn-outline-danger">Batal</a>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="cost_benefit" class="form-label">Cost /
                                                                Benefit</label>
                                                            <select
                                                                class="form-select @error('cost_benefit') is-invalid @enderror"
                                                                aria-label="Default select example" name="cost_benefit"
                                                                id="cost_benefit">
                                                                <option selected disabled>Pilih Cost / Benefit ...
                                                                </option>
                                                                <option value="Cost">
                                                                    Cost
                                                                </option>
                                                                <option value="Benefit">
                                                                    Benefit
                                                                </option>
                                                            </select>
                                                            @error('cost_benefit')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="bobot" class="form-label">Nilai
                                                                Preferensi</label>
                                                            <input type="number"
                                                                class="form-control @error('bobot') is-invalid @enderror"
                                                                id="bobot" name="bobot" value="{{ old('bobot') }}"
                                                                aria-describedby="emailHelp" placeholder="...">
                                                            @error('bobot')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
