<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo_psti.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo_psti.png') }}">
    <title>
        SPR PCR by PSTI
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
    <!--   CSS Datatables   -->
    <!-- Tambahkan CSS tambahan untuk DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Tambahkan CSS tema tambahan jika diperlukan -->
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.11.5/integration/bootstrap/3/dataTables.bootstrap.css">
    <!--   CSS Toastr   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="{{ $class ?? '' }}">
    @guest
    @yield('content')
    @endguest

    @auth
    @if (in_array(request()->route()->getName(), ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
    @yield('content')
    @else
    @if (!in_array(request()->route()->getName(), ['profile', 'profile-static']))
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile']))
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    @endif
    @include('layouts.navbars.auth.sidenav')
    <main class="main-content border-radius-lg">
        @yield('content')
    </main>
    @endif
    @endauth
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#tb_pengajuan').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "pagingType": "full_numbers"
            });
            $('#tb_peminjaman').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "pagingType": "full_numbers"
            });
            $('#tb_riwayat').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "pagingType": "full_numbers"
            });
            $('#tb_matakuliah').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "pagingType": "full_numbers"
            });
            $('#tb_dosen').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "pagingType": "full_numbers"
            });
            $('#tb_ruangan').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "pagingType": "full_numbers"
            });
        });
    </script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('status'))
        toastr.success("{{ Session::get('status') }}")
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('excelForm').addEventListener('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Tambah Data',
                text: 'Apakah Anda yakin ingin menambahkan data? Seluruh data pada tabel akan terhapus',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, tambah data',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Setelah konfirmasi, kirim formulir Excel
                    this.submit();
                }
            });
        });
    </script>
    @stack('js');
</body>

</html>