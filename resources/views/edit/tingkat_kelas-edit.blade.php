@extends('layouts.master')
@section('title', 'KMEANS | Edit Relasi Tingkat & Kelas')
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
                        <h6>Edit Relasi Tingkat & Kelas</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        {{-- <div class="bd-example"> --}}
                        <div class="row">
                            <form action="/tingkat_kelas-update/{{ $tingkat_kelas->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tingkat_id" class="form-label">Tingkat</label>
                                            <input type="text"
                                                class="form-control @error('tingkat_id') is-invalid @enderror"
                                                id="tingkat_id" value="{{ $tingkat_kelas->tingkat->nama }}" disabled
                                                aria-describedby="emailHelp">
                                            @error('tingkat_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" class="form-control" id="tingkat_id" name="tingkat_id"
                                            value="{{ $tingkat_kelas->tingkat->id }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="kelas_id" class="form-label">Tingkat</label>
                                            <select class="form-select @error('kelas_id') is-invalid @enderror"
                                                aria-label="Default select example" name="kelas_id" id="kelas_id">
                                                {{-- <option selected disabled>Pilih Tingkat terlebih dahulu ...</option> --}}
                                                @foreach ($kelas as $item_kelas)
                                                    @php
                                                        $temp = false;
                                                    @endphp
                                                    <option value="{{ $item_kelas->id }}"
                                                        @foreach ($item_kelas->tingkat_kelas as $item_tingkat_kelas) 
                                            @if (
                                                $item_tingkat_kelas->tingkat_id == $tingkat_kelas->tingkat_id &&
                                                    $item_tingkat_kelas->kelas_id == $tingkat_kelas->kelas_id)
                                            selected
                                            @endif 
                                            @if (
                                                $item_tingkat_kelas->tingkat_id == $tingkat_kelas->tingkat_id &&
                                                    $item_tingkat_kelas->kelas_id != $tingkat_kelas->kelas_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                        {{ $item_kelas->nama }} @if ($temp == true)
                                                            (sudah dipilih!)
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelas_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/tingkat_kelas" class="btn btn-outline-danger">Batal</a>
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
