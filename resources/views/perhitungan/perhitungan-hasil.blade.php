@extends('layouts.master')
@section('title', 'ELECTRE | Hasil')
@section('content')

    <!-- ========== section start ========== -->

    <div class="container-fluid py-5">
        <div class="row">
            <div class="row p-4">

                <div class="tables-wrapper">
                    <div class="card-style mb-30">
                        <h3 class="mb-10">Hasil Perhitungan ELECTRE</h3>
                        <hr>
                        <p class="h5">
                            Hasil perhitungan menggunakan metode <span class="text-primary fw-bolder">ELECTRE</span> telah
                            disajikan
                            dengan jelas dan terperinci pada
                            website kami. Dalam analisis ini, kami menggunakan <span
                                class="text-primary fw-bolder">{{ count($kriteria) }}</span> kriteria dan <span
                                class="text-primary fw-bolder">{{ count($sub_kriteria) }}</span> sub kriteria yang relevan
                            dan data yang valid
                            untuk memperoleh hasil yang akurat. Melalui proses perbandingan dan evaluasi yang cermat, metode
                            <span class="text-primary fw-bolder">ELECTRE</span> menghasilkan rangking yang mempertimbangkan
                            bobot preferensi dan bobot kriteria yang telah
                            ditentukan. Anda dapat menemukan hasil lengkapnya di halaman web kami, yang mencakup peringkat
                            relatif dari <span class="text-primary fw-bolder">{{ count($penduduk) }}</span> alternatif
                            penduduk yang dievaluasi.<br>
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-sm">
                                    <tbody>
                                        @foreach ($kriteria as $item_kriteria)
                                            <tr>
                                                <td>{{ $item_kriteria->nama }}</td>
                                                <td class="text-primary fw-bolder">{{ $item_kriteria->bobot }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-6">
                                <p class="h5">Berdasarkan bobot preferensi kriteria yang telah ditentukan maka
                                    dapat
                                    disimpulkan
                                    bahwa
                                    penduduk yang diprioritaskan adalah penduduk yang memiliki bobot kriteria terdekat
                                    dengan
                                    bobot preferensi kriteria diurutkan dari yang tertinggi yaitu :
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($kriteria_rsort as $item_kriteria_rsort)
                                        @if ($i !== 0 && $i !== count($kriteria_rsort) - 1 && count($kriteria_rsort) > 1)
                                            ,
                                        @elseif ($i == count($kriteria_rsort) - 1 && count($kriteria_rsort) > 1)
                                            dan
                                        @endif
                                        <span class="text-primary fw-bolder"> {{ $item_kriteria_rsort->nama }}</span>
                                        @if ($i == count($kriteria_rsort) - 1 && count($kriteria_rsort) > 1)
                                            .
                                        @endif
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                    <br> Dengan demikian, kami berharap
                                    Anda
                                    dapat
                                    menggunakan
                                    informasi ini sebagai panduan dalam pengambilan keputusan yang lebih baik dan efektif.
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-auto ms-auto d-print-none">
                                        <a href="/cetak-hasil" target="_blank" class="btn btn-primary mb-3">
                                            Import PDF / Cetak
                                        </a>
                                    </div>
                                    <div class="table-wrapper table-responsive">
                                        <table class="table table-hover table-striped" id="myTable">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Ranking</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($electre as $item_electre)
                                                    <tr>
                                                        <td class="text-primary fw-bolder">{{ $loop->iteration }}</td>
                                                        <td>{{ $item_electre['penduduk']['penduduk_nama'] }}</td>
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

                    <!-- [ sample-page ] end -->
                </div>
                <!-- [ Main Content ] end -->

            </div>
        </div>
    </div>

@endsection
