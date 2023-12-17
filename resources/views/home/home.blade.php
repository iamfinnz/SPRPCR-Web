<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--   CSS Toastr   -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                        <th class="text-center font-weight-bolder">
                                            ID</th>
                                        <th class="text-center font-weight-bolder ps-2">
                                            Nama</th>
                                        <th class="text-center font-weight-bolder">
                                            NIM</th>
                                        <th class="text-center font-weight-bolder">
                                            Program Studi</th>
                                        <th class="text-center font-weight-bolder">
                                            Ruangan</th>
                                        <th class="text-center font-weight-bolder">
                                            Tanggal</th>
                                        <th class="text-center font-weight-bolder">
                                            Jam Mulai</th>
                                        <th class="text-center font-weight-bolder">
                                            Jam Selesai</th>
                                        <th class="text-center font-weight-bolder">
                                            Unit</th>
                                        <th class="text-center font-weight-bolder">
                                            Penanggung Jawab</th>
                                        <th class="text-center font-weight-bolder">
                                            Keperluan</th>
                                        <th class="text-center font-weight-bolder">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @php $i=1; @endphp
                                    @forelse ($pengajuan as $key => $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['nim'] }}</td>
                                        <td>{{ $item['prodi'] }}</td>
                                        <td>{{ $item['ruangan'] }}</td>
                                        <td>{{ $item['tanggal'] }}</td>
                                        <td>{{ $item['jmulai'] }}</td>
                                        <td>{{ $item['jselesai'] }}</td>
                                        <td>{{ $item['unit'] }}</td>
                                        <td>{{ $item['penanggungJawab'] }}</td>
                                        <td>{{ $item['keperluan'] }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#modalTerima">
                                                <i class="fa fa-check me-sm-1"></i>
                                                <span class="d-sm-inline d-none">Terima</span>
                                            </a>
                                            <!-- Modal Terima -->
                                            <div class="modal fade" id="modalTerima" tabindex="-1" aria-labelledby="modalTerimaLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ url('peminjaman/'.$key) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTerimaLabel">Catatan Penerimaan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="catatan" class="form-label">Catatan Penerimaan Pengajuan</label>
                                                                    <textarea type="text" class="form-control" id="catatan" name="catatan" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-sm btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#modalTolak">
                                                <i class="fa fa-close me-sm-1"></i>
                                                <span class="d-sm-inline d-none">Tolak</span>
                                            </a>
                                            <!-- Modal Tolak -->
                                            <div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="modalTolakLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ url('home/'.$key) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTolakLabel">Catatan Penolakan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="catatan" class="form-label">Catatan Penolakan Pengajuan</label>
                                                                    <textarea type="text" class="form-control" id="catatan" name="catatan" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Toastr -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                            <script>
                                @if(Session::has('status'))
                                toastr.success("{{ Session::get('status') }}")
                                @endif
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    </html>