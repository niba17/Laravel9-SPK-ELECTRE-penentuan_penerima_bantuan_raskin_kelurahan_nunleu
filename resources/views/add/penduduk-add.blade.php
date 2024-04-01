@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Penduduk')
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
                                            <h4 class="card-title">Tambah Penduduk</h4>
                                            <hr>
                                            {{-- <div class="bd-example"> --}}
                                            <div class="row">
                                                <form action="/penduduk-store" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text"
                                                                    class="form-control @error('nama') is-invalid @enderror"
                                                                    id="nama" name="nama"
                                                                    value="{{ old('nama') }}"
                                                                    aria-describedby="emailHelp">
                                                                @error('nama')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="nik" class="form-label">NIK</label>
                                                                <input type="text"
                                                                    class="form-control @error('nik') is-invalid @enderror"
                                                                    id="nik" name="nik"
                                                                    value="{{ old('nik') }}"
                                                                    aria-describedby="emailHelp">
                                                                @error('nik')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="jk" class="form-label">Jenis
                                                                    kelamin</label>
                                                                <select
                                                                    class="form-select @error('jk') is-invalid @enderror"
                                                                    aria-label="Default select example" name="jk"
                                                                    id="jk">
                                                                    <option selected disabled>Pilih Jenis kelamin ...
                                                                    </option>
                                                                    <option value="Laki - laki">
                                                                        Laki - laki
                                                                    </option>
                                                                    <option value="Perempuan">
                                                                        Perempuan
                                                                    </option>
                                                                </select>
                                                                @error('jk')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="datepicker" class="form-label">Tanggal lahir</label>
                                                            {{-- <div class="col-sm-4"> --}}
                                                            <div class="input-group date" id="datepicker">
                                                                <input type="text"
                                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                                    name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                                                    autocomplete="off">
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text bg-white">
                                                                        <i class="fa fa-calendar" style="height: 20px"></i>
                                                                    </span>
                                                                </span>
                                                                @error('tgl_lahir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <input type="text"
                                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                                    id="alamat" name="alamat"
                                                                    value="{{ old('alamat') }}"
                                                                    aria-describedby="emailHelp">
                                                                @error('alamat')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                                    <a href="/penduduk_sub_kriteria"
                                                        class="btn btn-outline-danger">Batal</a>
                                                </form>

                                            </div>
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <!-- [ sample-page ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection
