@extends('layouts.master')
@section('title', 'SAW | Tambah Relasi Penduduk & Sub Kriteria')
@section('content')

    <!-- partial -->
    <!-- ========== section start ========== -->
    <section class="section">
        {{-- <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="h4">eCommerce Dashboard</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper mb-30">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    eCommerce
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> --}}
        <!-- ========== title-wrapper end ========== -->

        <div class="row p-4">

            <div class="col-sm-12">
                <div class="card-style">
                    <div class="card-header">
                        <h6>Tambah Relasi Penduduk & Sub Kriteria</h6>
                    </div>
                    <hr>
                    <div class="card-body">
                        {{-- <div class="bd-example"> --}}
                        <div class="row">
                            <form action="/penduduk_sub_kriteria-store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="penduduk_id" class="form-label">Penduduk</label>
                                            <select class="form-select @error('penduduk_id') is-invalid @enderror"
                                                aria-label="Default select example" name="penduduk_id"
                                                id="penduduk_id_penduduk">
                                                <option selected disabled>Pilih Penduduk ...</option>
                                                @foreach ($penduduk as $item_penduduk)
                                                    <option value="{{ $item_penduduk->id }}">
                                                        {{ $item_penduduk->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('penduduk_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="kriteria_id" class="form-label">Kriteria</label>
                                            <select class="form-select @error('kriteria_id') is-invalid @enderror"
                                                aria-label="Default select example" name="kriteria_id"
                                                id="kriteria_id_penduduk">
                                                <option selected disabled>Pilih Penduduk terlebih dahulu ...</option>
                                            </select>
                                            @error('kriteria_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="sub_kriteria_id" class="form-label">Sub Kriteria</label>
                                            <select class="form-select @error('sub_kriteria_id') is-invalid @enderror"
                                                aria-label="Default select example" name="sub_kriteria_id"
                                                id="sub_kriteria_id">
                                                <option selected disabled>Pilih Kriteria terlebih dahulu ...</option>
                                            </select>
                                            @error('sub_kriteria_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/penduduk_sub_kriteria" class="btn btn-outline-danger">Batal</a>
                            </form>

                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </section>
    <!-- [ Main Content ] end -->
@endsection
