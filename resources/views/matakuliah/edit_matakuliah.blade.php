<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Edit Mata Kuliah | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Mata Kuliah'])

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Edit Mata Kuliah</h5>
                            <a href="{{  url('matakuliah') }}" class="btn btn-sm btn-outline-danger btn-rounded ms-auto">
                                <i class="fa fa-arrow-left me-sm-1"></i>
                                <span class="d-sm-inline d-none">Kembali</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_matakuliah/'.$key) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Mata Kuliah</label>
                                        <input type="text" name="nama_matkul" value="{{$editdata['1']}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Dosen Pengampu</label>
                                        <input type="text" name="nama_dosen" value="{{$editdata['2']}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ruangan</label>
                                        <input type="number" name="ruangan" value="{{$editdata['3']}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <input type="text" name="hari" value="{{$editdata['4']}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Mulai</label>
                                        <select name="jam_mulai" class="form-control">
                                            <option value="{{$editdata['5']}}">{{$editdata['5']}}</option>
                                            <option value="07.00">07.00 WIB</option>
                                            <option value="08.00">08.00 WIB</option>
                                            <option value="09.00">09.00 WIB</option>
                                            <option value="10.00">10.00 WIB</option>
                                            <option value="11.00">11.00 WIB</option>
                                            <option value="12.00">12.00 WIB</option>
                                            <option value="13.00">13.00 WIB</option>
                                            <option value="13.30">13.30 WIB</option>
                                            <option value="14.00">14.00 WIB</option>
                                            <option value="14.30">14.30 WIB</option>
                                            <option value="15.00">15.00 WIB</option>
                                            <option value="15.30">15.30 WIB</option>
                                            <option value="16.00">16.00 WIB</option>
                                            <option value="16.30">16.30 WIB</option>
                                            <option value="17.00">17.00 WIB</option>
                                            <option value="17.30">17.30 WIB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Selesai</label>
                                        <select name="jam_selesai" class="form-control">
                                            <option value="{{$editdata['6']}}">{{$editdata['6']}}</option>
                                            <option value="08.00">08.00 WIB</option>
                                            <option value="09.00">09.00 WIB</option>
                                            <option value="10.00">10.00 WIB</option>
                                            <option value="11.00">11.00 WIB</option>
                                            <option value="12.00">12.00 WIB</option>
                                            <option value="12.30">12.30 WIB</option>
                                            <option value="13.00">13.00 WIB</option>
                                            <option value="14.00">14.00 WIB</option>
                                            <option value="14.30">14.30 WIB</option>
                                            <option value="15.00">15.00 WIB</option>
                                            <option value="15.30">15.30 WIB</option>
                                            <option value="16.00">16.00 WIB</option>
                                            <option value="16.30">16.30 WIB</option>
                                            <option value="17.00">17.00 WIB</option>
                                            <option value="17.30">17.30 WIB</option>
                                            <option value="18.00">18.00 WIB</option>
                                            <option value="18.30">18.30 WIB</option>
                                        </select>
                                    </div>
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