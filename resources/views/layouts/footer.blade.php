<script src="{{ asset('template') }}/src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('template') }}/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template') }}/src/assets/js/sidebarmenu.js"></script>
<script src="{{ asset('template') }}/src/assets/js/app.min.js"></script>
<script src="{{ asset('template') }}/src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{ asset('template') }}/src/assets/libs/simplebar/dist/simplebar.js"></script>
<script src="{{ asset('template') }}/src/assets/js/dashboard.js"></script>

<!-- Jquery JS -->
<script type="text/javascript" src="{{ asset('/library') }}/jquery361.js"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('/plugin') }}/sweetAlert2/sweetalert2.all.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" src="{{ asset('/plugin') }}/DataTables/datatables.min.js"></script>


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $('#card-home').on('mouseenter', function() {
        $(this).css('background-color', '#5D87FF')

    })

    $('#card-home').on('mouseleave', function() {
        $(this).css('background-color', '')
    })
    $('#card-home2').on('mouseenter', function() {
        $(this).css('background-color', '#5D87FF')

    })

    $('#card-home2').on('mouseleave', function() {
        $(this).css('background-color', '')
    })
    $('#card-home3').on('mouseenter', function() {
        $(this).css('background-color', '#5D87FF')

    })

    $('#card-home3').on('mouseleave', function() {
        $(this).css('background-color', '')
    })
    $('#card-home4').on('mouseenter', function() {
        $(this).css('background-color', '#5D87FF')

    })

    $('#card-home4').on('mouseleave', function() {
        $(this).css('background-color', '')
    })

    $('#myTable').DataTable();
    $('#myTable2').DataTable();
    $('#myTable3').DataTable();
    $('#myTable4').DataTable();
    $('#myTable5').DataTable();
    $('#myTable6').DataTable();

    $("#penduduk_id_penduduk").change(function() {
        var idPenduduk = $(this).val();
        $.ajax({
            url: "{{ route('penduduk-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                var html = "";
                data[0].forEach(elementPen => {
                    if (elementPen.id == idPenduduk) {
                        if (elementPen.penduduk_sub_kriteria !== null) {
                            data[1].forEach(elementKrit => {
                                var valid = true
                                elementPen.penduduk_sub_kriteria.forEach(
                                    elementPenSubKrit => {

                                        if (elementKrit.id ==
                                            elementPenSubKrit.kriteria_id) {
                                            valid = false
                                        }
                                    })
                                if (valid == false) {
                                    html += '<option class="text-danger" value="' +
                                        elementKrit
                                        .id + '"disabled>' + elementKrit.nama +
                                        ' (kriteria sudah ada!)</option>'
                                } else {
                                    html += '<option value="' + elementKrit
                                        .id + '">' + elementKrit.nama +
                                        '</option>'
                                }

                            })
                        }
                    }
                })
                $("#kriteria_id_penduduk").html(
                    '<option value="" selected disabled>Pilih Kriteria ...</option>' + html);
            }
        })
    })

    $("#kriteria_id_penduduk").change(function() {
        var idKriteria = $(this).val();
        $.ajax({
            url: "{{ route('kriteria_penduduk-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var html = "";
                data[0].forEach(elementKrit => {
                    if (elementKrit.id == idKriteria) {
                        if (elementKrit.kriteria_sub_kriteria !== null) {
                            var valid = true
                            data[1].forEach(elementSubKrit => {
                                elementSubKrit.kriteria_sub_kriteria.forEach(
                                    elementKritSubKrit => {
                                        if (elementKrit.id == elementKritSubKrit
                                            .kriteria_id) {

                                            html += '<option value="' +
                                                elementSubKrit
                                                .id + '">' + elementSubKrit
                                                .nama +
                                                '</option>'
                                        }

                                    });
                            })
                        }
                    }
                })
                $("#sub_kriteria_id").html(
                    '<option value="" selected disabled>Pilih Sub Kriteria ...</option>' + html);
            }
        })
    })

    $("#kriteria_id").change(function() {
        var idKriteria = $(this).val();
        $.ajax({
            url: "{{ route('kriteria-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var html = "";
                data[0].forEach(element => {
                    if (element.id == idKriteria) {
                        if (element.kriteria_sub_kriteria !== null) {
                            data[1].forEach(elementSubKrit => {
                                var valid = true
                                element.kriteria_sub_kriteria.forEach(
                                    elementKritSubKrit => {
                                        if (elementSubKrit.id ==
                                            elementKritSubKrit
                                            .sub_kriteria_id) {
                                            valid = false
                                        }
                                    })
                                if (valid == false) {
                                    html += '<option class="text-danger" value="' +
                                        elementSubKrit
                                        .id + '"disabled>' + elementSubKrit.nama +
                                        ' (sub kriteria sudah ada!)</option>'
                                } else {
                                    html += '<option value="' + elementSubKrit
                                        .id + '">' + elementSubKrit.nama +
                                        '</option>'
                                }

                            })
                        }
                    }
                })
                $("#sub_kriteria_id").html(
                    '<option value="" selected disabled>Pilih Kriteria ...</option>' + html);
            }
        })
    })

    $("#penduduk_kriteria_id").change(function() {
        var idKriteria = $(this).val();
        $.ajax({
            url: "{{ route('penduduk_kriteria-request') }}",
            method: 'GET',
            cache: false,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var html = "";
                data[0].forEach(element => {
                    if (element.id == idKriteria) {
                        if (element.penduduk_kriteria !== null) {
                            data[1].forEach(elementPen => {
                                var valid = true
                                element.penduduk_kriteria.forEach(
                                    elementKrit => {
                                        if (elementPen.id == elementKrit
                                            .penduduk_id) {
                                            valid = false
                                        }
                                    })
                                if (valid == false) {
                                    html += '<option class="text-danger" value="' +
                                        elementPen
                                        .id + '"disabled>' + elementPen.nama +
                                        ' (kriteria sudah ada!)</option>'
                                } else {
                                    html += '<option value="' + elementPen
                                        .id + '">' + elementPen.nama +
                                        '</option>'
                                }

                            })
                        }
                    }
                })
                $("#penduduk_id").html(
                    '<option value="" selected disabled>Pilih Penduduk ...</option>' + html);
            }
        })
    })

    $(function() {
        $('#datepicker').datepicker();
    });

    $('#login').hover(() => {
        $('#login').toggleClass('text-primary')
    })

    @if (Session::has('succMessage'))
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('succMessage') }}',
            timer: 3000
        })
    @elseif (Session::has('errSAWMessage'))
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get('errSAWMessage') }}'
            // timer: 3000
        })
    @elseif (Session::has('succSAWMessage'))
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('succSAWMessage') }}'
            // timer: 3000
        })
    @elseif (Session::has('warnMessage'))
        Swal.fire({
            icon: 'warning',
            title: '{{ Session::get('warnMessage') }}'
            // timer: 3000
        })
    @elseif (Session::has('logMessage'))
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('logMessage') }}',
            timer: 3000
        })
    @elseif (Session::has('errMessage'))
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get('errMessage') }}'
            // timer: 3000
        })
    @endif



    function hapus(id, controller) {
        Swal.fire({
            title: 'Yakin ingin Menghapus?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/' + controller + '-destroy/' + id);
            }
        })
    }

    function perhitungan() {
        Swal.fire({
            title: 'Mulai perhitungan ELECTRE?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/perhitungan-hasil');
            }
        })
    }

    function logout() {
        Swal.fire({
            title: 'Yakin ingin Logout?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/logout');
            }
        })
    }
</script>
</body>

</html>
