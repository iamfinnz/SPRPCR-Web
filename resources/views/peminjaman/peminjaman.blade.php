<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Kelola Peminjaman | SPR Politeknik Caltex Riau
        </title>
    </head>

    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Peminjaman'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Peminjaman Ruangan</h5>
                        <a class="btn btn-primary btn-rounded mt-2" href="{{ url('create_peminjaman') }}">
                            <i class="fa fa-plus me-sm-1"></i>
                            <span class="d-sm-inline d-none">Tambah</span>
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 m-4">
                        <form action="{{ route('peminjaman') }}" method="GET">
                            <label><input type="radio" name="radio" value="radio1" @if($selectedRadio==='radio1' ) checked @endif> Mahasiswa</label>
                            <label><input type="radio" name="radio" value="radio2" @if($selectedRadio==='radio2' ) checked @endif> Dosen</label>
                            <button type="submit" class="btn btn-primary btn-rounded ml-2">Tampilkan Data</button>
                        </form>
                        <div class="table-responsive p-0 mt-4">
                            <table class="table table-responsive align-items-center mb-0" id="tb_peminjaman">
                                <thead>
                                    <tr>
                                        @if ($selectedRadio === 'radio1')
                                        <th class="text-center font-weight-bolder">ID</th>
                                        <th class="text-center font-weight-bolder">Nama</th>
                                        <th class="text-center font-weight-bolder">NIM</th>
                                        <th class="text-center font-weight-bolder">Program Studi</th>
                                        <th class="text-center font-weight-bolder">Ruangan</th>
                                        <th class="text-center font-weight-bolder">Tanggal</th>
                                        <th class="text-center font-weight-bolder">Jam Mulai</th>
                                        <th class="text-center font-weight-bolder">Jam Selesai</th>
                                        <th class="text-center font-weight-bolder">Unit</th>
                                        <th class="text-center font-weight-bolder">Penanggung Jawab</th>
                                        <th class="text-center font-weight-bolder">Keperluan</th>
                                        <th class="text-center font-weight-bolder">Status</th>
                                        @elseif ($selectedRadio === 'radio2')
                                        <th class="text-center font-weight-bolder">ID</th>
                                        <th class="text-center font-weight-bolder">Nama</th>
                                        <th class="text-center font-weight-bolder">NIP</th>
                                        <th class="text-center font-weight-bolder">Email</th>
                                        <th class="text-center font-weight-bolder">Ruangan</th>
                                        <th class="text-center font-weight-bolder">Tanggal</th>
                                        <th class="text-center font-weight-bolder">Jam Mulai</th>
                                        <th class="text-center font-weight-bolder">Jam Selesai</th>
                                        <th class="text-center font-weight-bolder">Keperluan</th>
                                        <th class="text-center font-weight-bolder">Status</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @php $i=1; @endphp
                                    @foreach ($peminjaman as $key => $item)
                                    <tr>
                                        @if ($selectedRadio === 'radio1')
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
                                        <td style="display: flex;">
                                            @if($item['pengajuanDiterima'] == "Diterima")
                                            <span class="badge bg-primary">Diterima</span>
                                            @elseif($item['pengajuanDiterima'] == "Belum")
                                            <a></a>
                                            @else
                                            <a>Data tidak valid</a>
                                            @endif

                                            @if($item['pengembalianDiterima'] == "Diterima")
                                            <span class="badge bg-success" style="margin-left: 10px;">Selesai</span>
                                            @elseif($item['pengembalianDiterima'] == "Belum Dikembalikan")
                                            <div class="dropdown" style="margin-left: 10px;">
                                                <a href="" class="btn bg-gradient-primary dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenu">Pengembalian
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                                                    <li>
                                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalPengembalianMhs">Sudah</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalPengembalianMhs" tabindex="-1" aria-labelledby="modalPengembalianMhsLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ url('terima_pengembalian/'.$key) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalPengembalianMhsLabel">Catatan Pengembalian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="catatan" class="form-label">Catatan Pengembalian Ruangan</label>
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
                                            @else
                                            <a>Data tidak valid</a>
                                            @endif
                                            @if($item['pengembalianDiterima'] == "Diterima")
                                            <a href="{{ url('delete_peminjaman/'.$key) }}" class="btn btn-sm btn-danger" style="margin-left: 10px;">
                                                <i class="fa fa-trash me-sm-1"></i>
                                                <span class="d-sm-inline d-none">Hapus</span>
                                            </a>
                                            @endif
                                        </td>
                                        @elseif ($selectedRadio === 'radio2')
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item['nama_dosen'] }}</td>
                                        <td>{{ $item['nip_dosen'] }}</td>
                                        <td>{{ $item['email_dosen'] }}</td>
                                        <td>{{ $item['ruangan'] }}</td>
                                        <td>{{ $item['tanggal'] }}</td>
                                        <td>{{ $item['jmulai'] }}</td>
                                        <td>{{ $item['jselesai'] }}</td>
                                        <td>{{ $item['keperluan'] }}</td>
                                        <td style="display: flex;">
                                            @if($item['pengajuanDiterima'] == "Diterima")
                                            <span class="badge bg-primary">Diterima</span>
                                            @elseif($item['pengajuanDiterima'] == "Belum")
                                            <a></a>
                                            @else
                                            <a>Data tidak valid</a>
                                            @endif

                                            @if($item['pengembalianDiterima'] == "Diterima")
                                            <span class="badge bg-success mb-0" style="margin-left: 10px;">Selesai</span>
                                            @elseif($item['pengembalianDiterima'] == "Belum Dikembalikan")
                                            <div class="dropdown" style="margin-left: 10px;">
                                                <a href="" class="btn bg-gradient-primary dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenu">Pengembalian
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                                                    <li>
                                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalPengembalianDosen">Sudah</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalPengembalianDosen" tabindex="-1" aria-labelledby="modalPengembalianDosenLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ url('terima_pengembalian/'.$key) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalPengembalianDosenLabel">Catatan Pengembalian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="catatan" class="form-label">Catatan Pengembalian Ruangan</label>
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
                                            @else
                                            <a>Data tidak valid</a>
                                            @endif
                                            @if($item['pengembalianDiterima'] == "Diterima")
                                            <a href="{{ url('delete_peminjaman/'.$key) }}" class="btn btn-sm btn-danger" style="margin-left: 10px;">
                                                <i class="fa fa-trash me-sm-1"></i>
                                                <span class="d-sm-inline d-none">Hapus</span>
                                            </a>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
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