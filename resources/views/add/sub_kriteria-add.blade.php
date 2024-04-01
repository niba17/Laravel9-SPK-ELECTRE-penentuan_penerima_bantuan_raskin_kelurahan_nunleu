@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Sub Kriteria')
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
                                            <h4 class="card-title">Tambah Sub Kriteria</h5>
                                                <hr>
                                                {{-- <div class="bd-example"> --}}
                                                <form action="/sub_kriteria-store" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6">
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
                                                            <button type="submit"
                                                                class="btn btn-primary me-2">Simpan</button>
                                                            <a href="/kriteria_sub_kriteria"
                                                                class="btn btn-outline-danger">Batal</a>
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
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    @endsection
