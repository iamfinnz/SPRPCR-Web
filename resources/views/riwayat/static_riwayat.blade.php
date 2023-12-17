<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Riwayat Peminjaman | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Riwayat Peminjaman'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Riwayat Peminjaman Ruangan</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 m-4">
                        <form action="{{ route('riwayat') }}" method="GET">
                            <label><input type="radio" name="radio" value="radio1" @if($selectedRadio==='radio1' ) checked @endif> Mahasiswa</label>
                            <label><input type="radio" name="radio" value="radio2" @if($selectedRadio==='radio2' ) checked @endif> Dosen</label>
                            <button type="submit" class="btn btn-primary btn-rounded ml-2">Tampilkan Data</button>
                            @if ($selectedRadio === 'radio1')
                            <a class="btn btn-success btn-rounded float-end" href="{{ url('export-excel') }}">
                                <i class="fa fa-file-export me-sm-1"></i>
                                <span class="d-sm-inline d-none">Export All</span>
                            </a>
                            @elseif ($selectedRadio === 'radio2')
                            <a class="btn btn-success btn-rounded float-end" href="{{ url('export_excel2') }}">
                                <i class="fa fa-file-export me-sm-1"></i>
                                <span class="d-sm-inline d-none">Export Mhs</span>
                            </a>
                            @elseif ($selectedRadio === 'radio3')
                            <a class="btn btn-success btn-rounded float-end" href="{{ url('export_excel3') }}">
                                <i class="fa fa-file-export me-sm-1"></i>
                                <span class="d-sm-inline d-none">Export Dosen</span>
                            </a>
                            @endif
                        </form>
                        <div class="table-responsive p-0 mt-4">
                            <table class="table table-responsive table-bordered table-striped align-items-center mb-0" id="tb_riwayat">
                                <thead>
                                    <tr>
                                        @if ($selectedRadio === 'radio1')
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">NIM</th>
                                        <th style="text-align: center;">Program Studi</th>
                                        <th style="text-align: center;">Ruangan</th>
                                        <th style="text-align: center;">Tanggal</th>
                                        <th style="text-align: center;">Jam Mulai</th>
                                        <th style="text-align: center;">Jam Selesai</th>
                                        <th style="text-align: center;">Unit</th>
                                        <th style="text-align: center;">Penanggung Jawab</th>
                                        <th style="text-align: center;">Keperluan</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Catatan</th>
                                        @elseif ($selectedRadio === 'radio2')
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">NIP</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Ruangan</th>
                                        <th style="text-align: center;">Tanggal</th>
                                        <th style="text-align: center;">Jam Mulai</th>
                                        <th style="text-align: center;">Jam Selesai</th>
                                        <th style="text-align: center;">Keperluan</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Catatan</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">

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