<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Kelola Dosen | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Dosen'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Dosen</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 m-4">
                        <a class="btn btn-primary btn-rounded" href="{{ url('create_dosen') }}">
                            <i class="fa fa-plus me-sm-1"></i>
                            <span class="d-sm-inline d-none">Tambah</span>
                        </a>
                        <div class="table-responsive p-0 mt-4">
                            <table class="table table-responsive table-bordered table-striped align-items-center mb-0" id="tb_dosen">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Inisial Dosen</th>
                                        <th style="text-align: center;">Nama Dosen</th>
                                        <th style="text-align: center;">NIP Dosen</th>
                                        <th style="text-align: center;">Email Dosen</th>
                                        <th style="text-align: center;">Aksi</th>
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