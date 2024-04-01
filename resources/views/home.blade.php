@extends('layouts.master')
@section('title', 'ELECTRE | Home')
@section('content')



    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Monthly Earnings -->
                <a href="/akun" class="card" id="card-home">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-8 fw-semibold"> Akun </h5>
                                <h4 style="color:#49BEFF;" class="fw-semibold mb-3">{{ count($akun) }}</h4>
                                <div class="d-flex align-items-center">
                                    {{-- <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span> --}}
                                    {{-- <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                            <p class="fs-3 mb-0">last year</p> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div id="earning"></div> --}}
                </a>
            </div>
            <div class="col-lg-6">
                <a href="/kriteria_sub_kriteria" class="card" id="card-home2">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-8 fw-semibold"> Kriteria & Sub Kriteria </h5>
                                <h4 style="color:#49BEFF;" class="fw-semibold mb-3">{{ count($kriteria) }} <span
                                        style="color: #4F73D9;" class="px-2">|</span>
                                    {{ count($sub_kriteria) }}</h4>
                                <div class="d-flex align-items-center">
                                    {{-- <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span> --}}
                                    {{-- <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                            <p class="fs-3 mb-0">last year</p> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-gear"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div id="earning"></div> --}}
                </a>
            </div>
            <div class="col-lg-6">
                <a href="/penduduk_sub_kriteria" class="card" id="card-home3">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-8 fw-semibold"> Penduduk & Sub Kriteria </h5>
                                <h4 style="color:#49BEFF;" class="fw-semibold mb-3">{{ count($penduduk) }} <span
                                        style="color: #4F73D9;" class="px-2">|</span>
                                    {{ count($sub_kriteria) }}</h4>
                                <div class="d-flex align-items-center">
                                    {{-- <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span> --}}
                                    {{-- <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                            <p class="fs-3 mb-0">last year</p> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-user-gear"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div id="earning"></div> --}}
                </a>
            </div>
            {{-- <div class="col-lg-6">
                <a href="/kecamatan_kelurahan" class="card"  id="card-home2">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-8 fw-semibold"> Kecamatan & Kelurahan </h5>
                                <h4 style="color:#49BEFF;" class="fw-semibold mb-3">{{ count($kecamatan) }} <span
                                        style="color: #4F73D9;" class="px-2">|</span>
                                    {{ count($kelurahan) }}</h4>
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}
            <div class="col-lg-6">
                <a href="#" onclick="perhitungan()" class="card" id="card-home4">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-8 fw-semibold"> Perhitungan </h5>
                                <h4 style="color:#49BEFF;" class="fw-semibold mb-3">ELECTRE</h4>
                                <div class="d-flex align-items-center">
                                    {{-- <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span> --}}
                                    {{-- <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                            <p class="fs-3 mb-0">last year</p> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-user-gear"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div id="earning"></div> --}}
                </a>
            </div>
        </div>

        {{-- <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
                    href="https://themewagon.com">ThemeWagon</a></p>
        </div> --}}
    </div>
    </div>
    </div>

@endsection
