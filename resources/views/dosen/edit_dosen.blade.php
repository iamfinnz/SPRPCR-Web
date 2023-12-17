<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Edit Dosen | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Dosen'])

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Edit Dosen</h5>
                            <a href="{{  url('dosen') }}" class="btn btn-sm btn-outline-danger btn-rounded ms-auto">
                                <i class="fa fa-arrow-left me-sm-1"></i>
                                <span class="d-sm-inline d-none">Kembali</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_dosen/'.$key) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group">
                                    <label>Inisial Dosen</label>
                                    <input type="text" name="inisial_dosen" value="{{$editdata['inisial_dosen']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Dosen</label>
                                    <input type="text" name="nama_dosen" value="{{$editdata['nama_dosen']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>NIP Dosen</label>
                                    <input type="number" name="nip_dosen" value="{{$editdata['nip_dosen']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email Dosen</label>
                                    <input type="email" name="email_dosen" value="{{$editdata['email_dosen']}}" class="form-control">
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