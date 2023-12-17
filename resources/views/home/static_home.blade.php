<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Dashboard | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengajuan</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $total_pengajuan }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('home')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow-primary text-center rounded-circle">
                                    <i class="fa fa-dashboard text-lg opacity-10 mb-2" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Peminjaman</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $total_peminjaman }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('peminjaman')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-secondary shadow-danger text-center rounded-circle">
                                    <i class="fa fa-university text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Riwayat</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $total_riwayatpeminjaman }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('riwayat-peminjaman')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-success shadow-success text-center rounded-circle">
                                    <i class="fa fa-history text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Mata Kuliah</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $total_matakuliah }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('matakuliah')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-dark shadow-warning text-center rounded-circle">
                                    <i class="fa fa-ticket text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Dosen</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $total_dosen }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('dosen')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-info shadow-warning text-center rounded-circle">
                                    <i class="fa fa-chalkboard-teacher text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Ruangan</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $total_ruangan }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('ruangan')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-danger shadow-warning text-center rounded-circle">
                                    <i class="fa fa-door-open text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Pengajuan Peminjaman</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 m-4">
                            <table class="table align-items-center mb-0" id="tb_pengajuan">
                                <thead>
                                    <tr>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-center font-weight-bolder opacity-7 ps-2">
                                            Nama</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            NIM</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Program Studi</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Ruangan</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Tanggal</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Jam Mulai</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Jam Selesai</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Unit</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Penanggung Jawab</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Keperluan</th>
                                        <th class="text-center font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @php $i=1; @endphp
                                    @forelse ($pengajuan as $key => $item)
                                    <tr>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    </html>