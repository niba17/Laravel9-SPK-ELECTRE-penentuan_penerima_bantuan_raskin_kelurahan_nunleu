@extends('layouts.master')
@section('title', 'SAW | Atur Relasi Penduduk & Sub Kriteria')
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
                                            <h4 class="card-title">Atur Relasi Penduduk & Sub Kriteria</h4>
                                            <hr>
                                            {{-- <div class="bd-example"> --}}
                                            <div class="row">
                                                <form action="/penduduk_sub_kriteria-apply/{{ $penduduk->id }}"
                                                    method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="penduduk_id" class="form-label">Penduduk</label>
                                                                <input type="text"
                                                                    class="form-control @error('penduduk_id') is-invalid @enderror"
                                                                    id="penduduk_id" value="{{ $penduduk->nama }}" disabled
                                                                    aria-describedby="emailHelp">
                                                                @error('penduduk_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <input type="hidden" class="form-control" id="penduduk_id"
                                                                name="penduduk_id" value="{{ $penduduk->id }}">
                                                        </div>

                                                        @foreach ($kriteria as $key_kriteria => $item_kriteria)
                                                            @if (isset($item_kriteria->kriteria_sub_kriteria) && count($item_kriteria->kriteria_sub_kriteria) > 0)
                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="{{ $item_kriteria->id }}"
                                                                            class="form-label">{{ $item_kriteria->nama }}
                                                                        </label>
                                                                        <select
                                                                            class="form-select @error('K_' . $item_kriteria->id) is-invalid @enderror"
                                                                            name="{{ 'K_' . $item_kriteria->id }}"
                                                                            id="{{ $item_kriteria->id }}">

                                                                            <option selected disabled>Pilih
                                                                                {{ $item_kriteria->nama }}

                                                                                @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                                                            <option
                                                                                value="{{ $item_kriteria_sub_kriteria->sub_kriteria->id }}"
                                                                                @foreach ($penduduk->penduduk_sub_kriteria as $item_penduduk_sub_kriteria)
    @if (
        $penduduk->id == $item_penduduk_sub_kriteria->penduduk_id &&
            $item_kriteria->id == $item_penduduk_sub_kriteria->kriteria_id &&
            $item_kriteria_sub_kriteria->sub_kriteria_id == $item_penduduk_sub_kriteria->sub_kriteria_id)
        selected
    @endif @endforeach>
                                                                                {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}
                                                                            </option>
                                                            @endforeach

                                                            </select>
                                                            @error('K_' . $item_kriteria->id)
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                            </div>
                                        @else
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="{{ $item_kriteria->id }}"
                                                        class="form-label text-danger">{{ $item_kriteria->nama }}
                                                    </label>
                                                    <select
                                                        class="form-select @error('K_' . $item_kriteria->id) is-invalid @enderror"
                                                        name="" id="{{ $item_kriteria->id }}" disabled>

                                                        <option selected disabled>Belum ada Sub Kriteria!</option>


                                                    </select>
                                                    @error('K_' . $item_kriteria->id)
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>


                                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                        <a href="/penduduk_sub_kriteria" class="btn btn-outline-danger">Batal</a>
                                        </form>
                                    </div>

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


    <!-- [ Main Content ] end -->
@endsection
