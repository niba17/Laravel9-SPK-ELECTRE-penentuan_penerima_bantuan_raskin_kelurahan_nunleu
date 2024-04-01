@extends('layouts.master')
@section('title', 'SAW | Tingkat & Kelas')
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
                    <h6 class="mb-10">Tingkat & Kelas</h6>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="/tingkat-add" class="btn btn-sm btn-primary mb-3">Tambah Tingkat
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="table-wrapper table-responsive">
                                    <table class="table table-hover" id="myTable">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Tingkat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tingkat as $item_tingkat)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_tingkat->nama }}</td>
                                                    <td>
                                                        <a href="tingkat-edit/{{ $item_tingkat->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item_tingkat->id }}','tingkat')">
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
                                <a href="/kelas-add" class="btn btn-sm btn-primary mb-3">Tambah Kelas
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="table-wrapper table-responsive">
                                    <table class="table table-hover" id="myTable2">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelas as $item_kelas)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_kelas->nama }}</td>
                                                    <td>
                                                        <a href="kelas-edit/{{ $item_kelas->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#" onclick="hapus('{{ $item_kelas->id }}','kelas')">
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
                        <h6 class="mb-10">Relasi Tingkat & Kelas</h6>
                        <hr>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/tingkat_kelas-add" class="btn btn-sm btn-primary mb-3">Tambah
                                        Relasi
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable3">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Tingkat</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tingkat as $item)
                                                <tr>
                                                    <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if (isset($item->tingkat_kelas) && count($item->tingkat_kelas) > 0)
                                                            @foreach ($item->tingkat_kelas as $item2)
                                                                <li>
                                                                    {{ $item2->kelas->nama }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger">Kelas
                                                                    belum dipilih!
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($item->tingkat_kelas as $item4)
                                                            <a href="tingkat_kelas-edit/{{ $item4->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1 fw-bold">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item4->id }}','tingkat_kelas')">
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
