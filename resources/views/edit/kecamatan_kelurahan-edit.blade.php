@extends('layouts.master')
@section('title', 'KMEANS | Edit Kecamatan & Kelurahan')
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
                        <h6>Edit Kecamatan & Kelurahan</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        {{-- <div class="bd-example"> --}}
                        <div class="row">
                            <form action="/kecamatan_kelurahan-update/{{ $kecamatan_kelurahan->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                            <input type="text"
                                                class="form-control @error('kecamatan_id') is-invalid @enderror"
                                                id="kecamatan_id" value="{{ $kecamatan_kelurahan->kecamatan->nama }}"
                                                disabled aria-describedby="emailHelp">
                                            @error('kecamatan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" class="form-control" id="kecamatan_id" name="kecamatan_id"
                                            value="{{ $kecamatan_kelurahan->kecamatan->id }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="kelurahan_id" class="form-label">Kecamatan</label>
                                            <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                                aria-label="Default select example" name="kelurahan_id" id="kelurahan_id">
                                                {{-- <option selected disabled>Pilih Kecamatan terlebih dahulu ...</option> --}}
                                                @foreach ($kelurahan as $item_kelurahan)
                                                    @php
                                                        $temp = false;
                                                    @endphp
                                                    <option value="{{ $item_kelurahan->id }}"
                                                        @foreach ($item_kelurahan->kecamatan_kelurahan as $item_tingkat_kelas) 
                                            @if (
                                                $item_tingkat_kelas->kecamatan_id == $kecamatan_kelurahan->kecamatan_id &&
                                                    $item_tingkat_kelas->kelurahan_id == $kecamatan_kelurahan->kelurahan_id)
                                            selected
                                            @endif 
                                            @if (
                                                $item_tingkat_kelas->kecamatan_id == $kecamatan_kelurahan->kecamatan_id &&
                                                    $item_tingkat_kelas->kelurahan_id != $kecamatan_kelurahan->kelurahan_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                        {{ $item_kelurahan->nama }} @if ($temp == true)
                                                            (sudah dipilih!)
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelurahan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/kecamatan_kelurahan" class="btn btn-outline-danger">Batal</a>
                            </form>

                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            <!-- [ sample-page ] end -->
        </div>

    </section>
    <!-- [ Main Content ] end -->
@endsection
