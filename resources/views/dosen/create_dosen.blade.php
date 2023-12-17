<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Tambah Dosen | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Dosen'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Tambah Dosen</h5>
                            <a href="{{  url('dosen') }}" class="btn btn-sm btn-outline-danger btn-rounded ms-auto">
                                <i class="fa fa-arrow-left me-sm-1"></i>
                                <span class="d-sm-inline d-none">Kembali</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('create_dosen') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label>Inisial Dosen</label>
                                    <input type="text" name="inisial_dosen" class="form-control" placeholder="Masukkan inisial dosen (cont. DYH)">
                                </div>
                                <div class="form-group">
                                    <label>Nama Dosen</label>
                                    <input type="text" name="nama_dosen" class="form-control" placeholder="Masukkan nama dosen">
                                </div>
                                <div class="form-group">
                                    <label>NIP Dosen</label>
                                    <input type="number" name="nip_dosen" class="form-control" placeholder="Masukkan NIP dosen">
                                </div>
                                <div class="form-group">
                                    <label>Email Dosen</label>
                                    <input type="email" name="email_dosen" class="form-control" placeholder="Masukkan email dosen">
                                </div>
                                <div class="form-group mt-5 text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-rounded">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    </html>