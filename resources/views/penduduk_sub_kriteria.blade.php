@extends('layouts.master')
@section('title', 'ELECTRE | Penduduk & Sub Kriteria')
@section('content')

    <div class="container-fluid py-5">
        <div class="row">

            <div class="p-4">

                <div class="tables-wrapper">
                    <div class="card-style mb-30">
                        <h3 class="mb-10">Penduduk</h3>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/penduduk-add" class="btn btn-sm btn-primary mb-3">Tambah Penduduk
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <div class="table-wrapper table-responsive">
                                        <table class="table table-hover" id="myTable">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>Alamat</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th style="width: 50px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($penduduk as $item_penduduk)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_penduduk->nama }}</td>
                                                        <td>{{ $item_penduduk->nik }}</td>
                                                        <td>{{ $item_penduduk->alamat }}</td>
                                                        <td>{{ $item_penduduk->jk }}</td>
                                                        <td>{{ $item_penduduk->tgl_lahir }}</td>
                                                        <td>
                                                            <a href="penduduk-edit/{{ $item_penduduk->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_penduduk->id }}','penduduk')">
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
                        <h3 class="mb-10">Relasi Penduduk & Sub Kriteria</h6>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        {{-- <p class="text-sm mb-20">
                                For basic styling—light padding and only horizontal
                                dividers—use the class table.
                            </p> --}}
                                        {{-- <a href="/penduduk_sub_kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah
                                    Relasi
                                    <i class="fa-solid fa-plus"></i>
                                </a> --}}
                                        <table class="table table-hover" id="myTable3">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Penduduk</th>
                                                    <th>Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Atur</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($penduduk as $item)
                                                    <tr>
                                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>
                                                            @if (isset($item->penduduk_sub_kriteria) && count($item->penduduk_sub_kriteria) > 0)
                                                                @foreach ($item->penduduk_sub_kriteria as $item2)
                                                                    @if (isset($item2->kriteria->nama) && $item2->kriteria->nama !== null)
                                                                        <li>
                                                                            {{ $item2->kriteria->nama }}
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">
                                                                        Kriteria
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (isset($item->penduduk_sub_kriteria) && count($item->penduduk_sub_kriteria) > 0)
                                                                @foreach ($item->penduduk_sub_kriteria as $item2)
                                                                    <li>
                                                                        {{ $item2->sub_kriteria->nama }}

                                                                        {{-- <span class="text-danger">
                                                                        <span
                                                                            class="badge bg-danger-faded text-danger">Bobot
                                                                            belum diisi!
                                                                        </span>
                                                                    </span> --}}

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
                                                            @if (isset($item->penduduk_sub_kriteria) && count($item->penduduk_sub_kriteria) > 0)
                                                                @foreach ($item->penduduk_sub_kriteria as $item2)
                                                                    <li>
                                                                        @foreach ($kriteria_sub_kriteria as $item3)
                                                                            @if ($item2->sub_kriteria_id == $item3->sub_kriteria_id)
                                                                                @if ($item2->kriteria_id == $item3->kriteria_id)
                                                                                    {{ $item3->bobot }}
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </li>
                                                                @endforeach
                                                                {{-- @else
                                                        <span class="text-danger">
                                                            <span class="badge bg-danger-faded text-danger">Sub Kriteria
                                                                belum diisi!
                                                            </span>
                                                        </span> --}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{-- @foreach ($item->penduduk_sub_kriteria as $item4)
                                                        <a href="penduduk_sub_kriteria-edit/{{ $item4->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1 fw-bold">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item4->id }}','penduduk_sub_kriteria')">
                                                            <i class="fa-regular fa-trash-can text-danger"></i>
                                                        </a>
                                                        <br>
                                                    @endforeach --}}

                                                            <a class="btn btn-outline-primary"
                                                                href="/penduduk_sub_kriteria-set/{{ $item->id }}"><i
                                                                    class="fa-solid fa-user-gear fa-2x"></i></a>
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

@endsection
