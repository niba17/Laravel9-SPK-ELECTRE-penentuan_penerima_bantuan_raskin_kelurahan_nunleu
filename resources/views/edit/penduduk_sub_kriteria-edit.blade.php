@extends('layouts.master')
@section('title', 'SAW | Edit Relasi Penduduk & Sub Kriteria')
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
                        <h6>Edit Relasi Penduduk & Sub Kriteria</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        {{-- <div class="bd-example"> --}}
                        <div class="row">
                            <form action="/penduduk_sub_kriteria-update/{{ $penduduk_sub_kriteria->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="penduduk_id" class="form-label">Penduduk</label>
                                            <input type="text"
                                                class="form-control @error('penduduk_id') is-invalid @enderror"
                                                id="penduduk_id" value="{{ $penduduk_sub_kriteria->penduduk->nama }}"
                                                disabled aria-describedby="emailHelp">
                                            @error('penduduk_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" class="form-control" id="penduduk_id" name="penduduk_id"
                                            value="{{ $penduduk_sub_kriteria->penduduk->id }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="kriteria_id" class="form-label">Kriteria</label>
                                            <select class="form-select @error('kriteria_id') is-invalid @enderror"
                                                aria-label="Default select example" name="kriteria_id"
                                                id="kriteria_id_penduduk">
                                                {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                                @foreach ($kriteria as $item)
                                                    @php
                                                        $temp = false;
                                                    @endphp
                                                    <option value="{{ $item->id }}"
                                                        @foreach ($item->penduduk_sub_kriteria as $item2) 
                                            @if (
                                                $item2->penduduk_id == $penduduk_sub_kriteria->penduduk_id &&
                                                    $item2->kriteria_id == $penduduk_sub_kriteria->kriteria_id)
                                            selected
                                            @endif 
                                            @if (
                                                $item2->penduduk_id == $penduduk_sub_kriteria->penduduk_id &&
                                                    $item2->kriteria_id != $penduduk_sub_kriteria->kriteria_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                        {{ $item->nama }} @if ($temp == true)
                                                            (kriteria sudah ada!)
                                                        @endif
                                                    </option>
                                                @endforeach
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
                                                {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                                @foreach ($kriteria as $item_kriteria)
                                                    @if ($item_kriteria->id == $penduduk_sub_kriteria->kriteria_id)
                                                        @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                                            <option
                                                                value="{{ $item_kriteria_sub_kriteria->sub_kriteria_id }}"
                                                                @foreach ($penduduk_sub_kriteria_get as $item_penduduk_sub_kriteria_get)
                                                                    @if (
                                                                        $item_penduduk_sub_kriteria_get->penduduk_id == $item_penduduk_sub_kriteria_get->penduduk_id &&
                                                                            $item_kriteria_sub_kriteria->kriteria_id == $item_penduduk_sub_kriteria_get->kriteria_id &&
                                                                            $item_kriteria_sub_kriteria->sub_kriteria_id == $item_penduduk_sub_kriteria_get->sub_kriteria_id)
                                                                       selected
                                                                    @endif @endforeach>
                                                                {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}

                                                            </option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
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

    </section>
    <!-- [ Main Content ] end -->
@endsection
