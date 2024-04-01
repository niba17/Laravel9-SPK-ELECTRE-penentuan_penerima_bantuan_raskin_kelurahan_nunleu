@extends('layouts.master')
@section('title', 'ELECTRE | Kriteria & Sub Kriteria')
@section('content')

    <div class="container-fluid py-5">
        <div class="row">

            <div class="p-4">

                <div class="tables-wrapper">
                    <div class="card-style mb-30">
                        <h3 class="mb-10">Kriteria & Sub Kriteria</h3>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="/kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah Kriteria
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <div class="table-wrapper table-responsive">
                                        <table class="table" id="myTable">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>
                                                        <h6 class="fw-bold">No</h6>
                                                    </th>
                                                    <th>
                                                        <h6 class="fw-bold">Kriteria</h6>
                                                    </th>
                                                    <th>
                                                        <h6 class="fw-bold">Cost / Benefit</h6>
                                                    </th>
                                                    <th>
                                                        <h6 class="fw-bold">Nilai Preferensi</h6>
                                                    </th>
                                                    <th>
                                                        <h6 class="fw-bold" style="width:50px;">Aksi</h6>
                                                    </th>
                                                </tr>
                                                <!-- end table row-->
                                            </thead>
                                            <tbody>
                                                @foreach ($kriteria as $item_kriteria)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_kriteria->nama }}</td>
                                                        <td>{{ $item_kriteria->cost_benefit }}</td>
                                                        <td>{{ $item_kriteria->bobot }}</td>
                                                        <td>
                                                            <a href="kriteria-edit/{{ $item_kriteria->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_kriteria->id }}','kriteria')">
                                                                <i class="fa-regular fa-trash-can text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <a href="/sub_kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah Sub Kriteria
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <div class="table-wrapper table-responsive">
                                        <table class="table" id="myTable2">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>
                                                        <h6 class="fw-bold">No</h6>
                                                    </th>
                                                    <th>
                                                        <h6 class="fw-bold">Sub Kriteria</h6>
                                                    </th>
                                                    <th>
                                                        <h6 class="fw-bold">Aksi</h6>
                                                    </th>
                                                </tr>
                                                <!-- end table row-->
                                            </thead>
                                            <tbody>
                                                @foreach ($sub_kriteria as $item_sub_kriteria)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_sub_kriteria->nama }}</td>
                                                        <td>
                                                            <a href="sub_kriteria-edit/{{ $item_sub_kriteria->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_sub_kriteria->id }}','sub_kriteria')">
                                                                <i class="fa-regular fa-trash-can text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <hr>
                    <div class="card-style mb-30">
                        <h3 class="mb-10">Relasi Kriteria & Sub Kriteria</h3>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- <p class="text-sm mb-20">
                                For basic styling—light padding and only horizontal
                                dividers—use the class table.
                            </p> --}}
                                    <a href="/kriteria_sub_kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah
                                        Relasi
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable3">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Sub Kriteria</th>
                                                <th>Bobot</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kriteria as $item)
                                                <tr>
                                                    <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                            @foreach ($item->kriteria_sub_kriteria as $item2)
                                                                <li>
                                                                    {{ $item2->sub_kriteria->nama }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger">Sub
                                                                    Kriteria
                                                                    belum dipilih!
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                            @foreach ($item->kriteria_sub_kriteria as $item2)
                                                                <li>
                                                                    {{ $item2->bobot }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger">Bobot
                                                                    belum diisi!
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($item->kriteria_sub_kriteria as $item4)
                                                            <a href="kriteria_sub_kriteria-edit/{{ $item4->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1 fw-bold">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item4->id }}','kriteria_sub_kriteria')">
                                                                <i class="fa-regular fa-trash-can text-danger"></i>
                                                            </a>
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>

                    <!-- [ sample-page ] end -->
                </div>
                <!-- [ Main Content ] end -->

            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    </section>

@endsection
