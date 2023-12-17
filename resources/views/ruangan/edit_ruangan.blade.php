<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Edit Ruangan | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Ruangan'])

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Edit Ruangan</h5>
                            <a href="{{  url('ruangan') }}" class="btn btn-sm btn-outline-danger btn-rounded ms-auto">
                                <i class="fa fa-arrow-left me-sm-1"></i>
                                <span class="d-sm-inline d-none">Kembali</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_ruangan/'.$key) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input type="text" name="nama_ruangan" value="{{$editdata['nama_ruangan']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Lantai Ruangan</label>
                                    <select name="lantai_ruangan" class="form-control">
                                        <option value="{{$editdata['lantai_ruangan']}}">{{$editdata['lantai_ruangan']}}</option>
                                        <option value="Lantai 1">Lantai 1</option>
                                        <option value="Lantai 2">Lantai 2</option>
                                        <option value="Lantai 3">Lantai 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fasilitas Ruangan</label>
                                    <input type="text" name="fasilitas_ruangan" value="{{$editdata['fasilitas_ruangan']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Foto Ruangan</label>
                                    <input type="file" name="foto_ruangan" value="{{$editdata['foto_ruangan']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Ruangan</label>
                                    <input type="text" name="deskripsi_ruangan" value="{{$editdata['deskripsi_ruangan']}}" class="form-control">
                                </div>
                                <div class="form-group mt-5 text-center">
                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
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