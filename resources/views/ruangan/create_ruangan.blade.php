<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Tambah Ruangan | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Ruangan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Tambah Ruangan</h5>
                            <a href="{{  url('ruangan') }}" class="btn btn-sm btn-outline-danger btn-rounded ms-auto">
                                <i class="fa fa-arrow-left me-sm-1"></i>
                                <span class="d-sm-inline d-none">Kembali</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('create_ruangan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input type="text" name="nama_ruangan" class="form-control" placeholder="Masukkan nama ruangan">
                                </div>
                                <div class="form-group">
                                    <label>Lantai Ruangan</label>
                                    <select name="lantai_ruangan" class="form-control">
                                        <option value="" selected disabled hidden>Pilih Lantai Ruangan</option>
                                        <option value="Lantai 1">Lantai 1</option>
                                        <option value="Lantai 2">Lantai 2</option>
                                        <option value="Lantai 3">Lantai 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fasilitas Ruangan</label>
                                    <input type="text" name="fasilitas_ruangan" class="form-control" placeholder="Masukkan fasilitas ruangan">
                                </div>
                                <div class="form-group">
                                    <label for="foto_ruangan">Foto Ruangan</label>
                                    <input type="file" name="foto_ruangan" class="form-control" placeholder="Masukkan gambar ruangan">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Ruangan</label>
                                    <input type="text" name="deskripsi_ruangan" class="form-control" placeholder="Masukkan deskripsi ruangan">
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