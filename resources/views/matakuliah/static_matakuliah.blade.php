<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Kelola Mata Kuliah | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Mata Kuliah'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Mata Kuliah</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 m-4">
                        <form id="excelForm" method="POST" action="{{ route('process_excel') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="excel_file" accept=".xlsx, .xls">
                            <button id="submitExcelButton" class="btn btn-primary btn-rounded" type="submit">Submit</button>
                        </form>
                        <div class="table-responsive p-0 mt-4">
                            <table class="table table-responsive table-bordered table-striped align-items-center mb-0" id="tb_riwayat">
                                <thead>
                                    <tr>
                                        <th class="text-center font-weight-bolder">
                                            ID</th>
                                        <th class="text-center font-weight-bolder ps-2">
                                            Mata Kuliah</th>
                                        <th class="text-center font-weight-bolder">
                                            Dosen</th>
                                        <th class="text-center font-weight-bolder">
                                            Ruangan</th>
                                        <th class="text-center font-weight-bolder">
                                            Hari</th>
                                        <th class="text-center font-weight-bolder">
                                            Jam Mulai</th>
                                        <th class="text-center font-weight-bolder">
                                            Jam Selesai</th>
                                        <th class="text-center font-weight-bolder">
                                            Aksi</th>
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