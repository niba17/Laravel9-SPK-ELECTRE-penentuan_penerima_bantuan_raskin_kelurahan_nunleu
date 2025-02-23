@extends('layouts.master')
@section('title', 'SAW | Tambah Kelurahan')
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
                        <h6>Tambah Kelurahan</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        {{-- <div class="bd-example"> --}}
                        <form action="/kelurahan-store" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}"
                                            aria-describedby="emailHelp">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/kecamatan_kelurahan" class="btn btn-outline-danger">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

        <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
        </div>
    </section>
    <!-- [ Main Content ] end -->
@endsection
