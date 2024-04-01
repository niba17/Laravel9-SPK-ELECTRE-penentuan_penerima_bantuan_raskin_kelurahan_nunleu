@extends('layouts.cetak_master')
@section('title', 'ELECTRE | Cetak Hasil')
@section('content')



    <div class="row p-4">

        <div class="tables-wrapper">
            <div class=" mb-30">
                <h3 class="mb-10">Hasil Perhitungan ELECTRE</h3>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-auto ms-auto d-print-none">
                                {{-- <a href="/cetak-hasil" class="btn btn-primary mb-3">
                                    Import PDF / Cetak
                                </a> --}}
                            </div>
                            <div class="table-wrapper table-responsive">
                                <table class="table table-hover" id="">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($electre as $itemelectre)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $itemelectre['penduduk']['penduduk_nama'] }}</td>
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
    <!-- [ Main Content ] end -->
    </div>
    <script>
        window.print();
    </script>
    </section>

@endsection
