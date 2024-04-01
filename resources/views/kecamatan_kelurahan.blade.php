@extends('layouts.master')
@section('title', 'SAW | Kecamatan & Kelurahan')
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

            <div class="tables-wrapper">
                <div class="card-style mb-30">
                    <h6 class="mb-10">Kecamatan & Kelurahan</h6>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="/kecamatan-add" class="btn btn-sm btn-primary mb-3">Tambah Kecamatan
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="table-wrapper table-responsive">
                                    <table class="table table-hover" id="myTable">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kecamatan as $item_kecamatan)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_kecamatan->nama }}</td>
                                                    <td>
                                                        <a href="kecamatan-edit/{{ $item_kecamatan->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item_kecamatan->id }}','kecamatan')">
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
                                <a href="/kelurahan-add" class="btn btn-sm btn-primary mb-3">Tambah Kelurahan
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="table-wrapper table-responsive">
                                    <table class="table table-hover" id="myTable2">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Kelurahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelurahan as $item_kelurahan)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_kelurahan->nama }}</td>
                                                    <td>
                                                        <a href="kelurahan-edit/{{ $item_kelurahan->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item_kelurahan->id }}','kelurahan')">
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
                <div class="col-sm-12">
                    <div class="card-style mb-30">
                        <h6 class="mb-10">Relasi Kecamatan & Kelurahan</h6>
                        <hr>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/kecamatan_kelurahan-add" class="btn btn-sm btn-primary mb-3">Tambah
                                        Relasi
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable3">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kecamatan as $item)
                                                <tr>
                                                    <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if (isset($item->kecamatan_kelurahan) && count($item->kecamatan_kelurahan) > 0)
                                                            @foreach ($item->kecamatan_kelurahan as $item2)
                                                                <li>
                                                                    {{ $item2->kelurahan->nama }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger">Kelurahan
                                                                    belum dipilih!
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($item->kecamatan_kelurahan as $item4)
                                                            <a href="kecamatan_kelurahan-edit/{{ $item4->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1 fw-bold">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item4->id }}','kecamatan_kelurahan')">
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
                </div>

                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
    </section>
    <!-- [ Main Content ] end -->

@endsection
