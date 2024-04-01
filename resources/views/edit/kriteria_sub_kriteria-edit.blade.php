@extends('layouts.master')
@section('title', 'ELECTRE | Edit Relasi Kriteria & Sub Kriteria')
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
                                            <h4 class="card-title">Edit Relasi Kriteria & Sub Kriteria</h5>
                                                <hr>
                                                {{-- <div class="bd-example"> --}}
                                                <div class="row">
                                                    <form
                                                        action="/kriteria_sub_kriteria-update/{{ $kriteria_sub_kriteria->id }}"
                                                        method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="kriteria_id"
                                                                        class="form-label">Kriteria</label>
                                                                    <input type="text"
                                                                        class="form-control @error('kriteria_id') is-invalid @enderror"
                                                                        id="kriteria_id"
                                                                        value="{{ $kriteria_sub_kriteria->kriteria->nama }}"
                                                                        disabled aria-describedby="emailHelp">
                                                                    @error('kriteria_id')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <input type="hidden" class="form-control" id="kriteria_id"
                                                                    name="kriteria_id"
                                                                    value="{{ $kriteria_sub_kriteria->kriteria->id }}">
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="sub_kriteria_id" class="form-label">Sub
                                                                        Kriteria</label>
                                                                    <select
                                                                        class="form-select @error('sub_kriteria_id') is-invalid @enderror"
                                                                        aria-label="Default select example"
                                                                        name="sub_kriteria_id" id="sub_kriteria_id">
                                                                        {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                                                        @foreach ($sub_kriteria as $item_sub_kriteria)
                                                                            @php
                                                                                $temp = false;
                                                                            @endphp
                                                                            <option value="{{ $item_sub_kriteria->id }}"
                                                                                @foreach ($item_sub_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria) 
                                            @if (
                                                $item_kriteria_sub_kriteria->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                                    $item_kriteria_sub_kriteria->sub_kriteria_id == $kriteria_sub_kriteria->sub_kriteria_id)
                                            selected
                                            @endif 
                                            @if (
                                                $item_kriteria_sub_kriteria->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                                    $item_kriteria_sub_kriteria->sub_kriteria_id != $kriteria_sub_kriteria->sub_kriteria_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                                                {{ $item_sub_kriteria->nama }} @if ($temp == true)
                                                                                    (sudah dipilih!)
                                                                                @endif
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('sub_kriteria_id')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="bobot" class="form-label">Bobot</label>
                                                                    <input type="number"
                                                                        class="form-control @error('bobot') is-invalid @enderror"
                                                                        id="bobot" name="bobot"
                                                                        value="{{ $kriteria_sub_kriteria->bobot }}"
                                                                        step="any" aria-describedby="emailHelp">
                                                                    @error('bobot')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                                        <a href="/kriteria_sub_kriteria"
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
