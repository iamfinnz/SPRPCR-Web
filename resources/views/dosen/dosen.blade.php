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
                                        <th class="text-center font-weight-bolder">ID</th>
                                        <th class="text-center font-weight-bolder">Inisial Dosen</th>
                                        <th class="text-center font-weight-bolder">Nama Dosen</th>
                                        <th class="text-center font-weight-bolder">NIP Dosen</th>
                                        <th class="text-center font-weight-bolder">Email Dosen</th>
                                        <th class="text-center font-weight-bolder">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @php $i=1; @endphp
                                    @forelse ($dosen as $key => $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item['inisial_dosen'] }}</td>
                                        <td>{{ $item['nama_dosen'] }}</td>
                                        <td>{{ $item['nip_dosen'] }}</td>
                                        <td>{{ $item['email_dosen'] }}</td>
                                        <td><a href="{{ url('edit_dosen/'.$key) }}" class="btn btn-sm btn-secondary btn-rounded">
                                                <i class="fa fa-edit"></i>
                                                <span class="d-sm-inline d-none">Edit</span>
                                            </a>
                                            <a href="{{ url('delete_dosen/'.$key) }}" class="btn btn-sm btn-danger btn-rounded">
                                                <i class="fa fa-trash me-sm-1"></i>
                                                <span class="d-sm-inline d-none">Hapus</span>
                                            </a>
                                        </td>
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