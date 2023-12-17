<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Riwayat Peminjaman | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Riwayat Peminjaman'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Riwayat Peminjaman Ruangan</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 m-4">
                        <form action="{{ route('riwayat') }}" method="GET">
                            <label><input type="radio" name="radio" value="radio1" @if($selectedRadio==='radio1' ) checked @endif> All</label>
                            <label><input type="radio" name="radio" value="radio2" @if($selectedRadio==='radio2' ) checked @endif> Mahasiswa</label>
                            <label><input type="radio" name="radio" value="radio3" @if($selectedRadio==='radio3' ) checked @endif> Dosen</label>
                            <button type="submit" class="btn btn-primary btn-rounded ml-2">Tampilkan Data</button>
                            @if ($selectedRadio === 'radio1')
                            <a class="btn btn-success btn-rounded float-end" href="{{ url('export-excel') }}">
                                <i class="fa fa-file-export me-sm-1"></i>
                                <span class="d-sm-inline d-none">Export All</span>
                            </a>
                            @elseif ($selectedRadio === 'radio2')
                            <a class="btn btn-success btn-rounded float-end" href="{{ url('export_excel2') }}">
                                <i class="fa fa-file-export me-sm-1"></i>
                                <span class="d-sm-inline d-none">Export Mhs</span>
                            </a>
                            @elseif ($selectedRadio === 'radio3')
                            <a class="btn btn-success btn-rounded float-end" href="{{ url('export_excel3') }}">
                                <i class="fa fa-file-export me-sm-1"></i>
                                <span class="d-sm-inline d-none">Export Dosen</span>
                            </a>
                            @endif
                        </form>
                        <div class="table-responsive p-0 mt-4">
                            <table class="table table-responsive table-bordered table-striped align-items-center mb-0" id="tb_riwayat">
                                <thead>
                                    <tr>
                                        @if ($selectedRadio === 'radio1')
                                        <th class="text-center font-weight-bolder">ID</th>
                                        <th class="text-center font-weight-bolder">Nama</th>
                                        <th class="text-center font-weight-bolder">NIM/NIP</th>
                                        <th class="text-center font-weight-bolder">Prodi/Email</th>
                                        <th class="text-center font-weight-bolder">Ruangan</th>
                                        <th class="text-center font-weight-bolder">Tanggal</th>
                                        <th class="text-center font-weight-bolder">Jam Mulai</th>
                                        <th class="text-center font-weight-bolder">Jam Selesai</th>
                                        <th class="text-center font-weight-bolder">Unit</th>
                                        <th class="text-center font-weight-bolder">Penanggung Jawab</th>
                                        <th class="text-center font-weight-bolder">Keperluan</th>
                                        <th class="text-center font-weight-bolder">Status</th>
                                        <th class="text-center font-weight-bolder">Catatan</th>
                                        @elseif ($selectedRadio === 'radio2')
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
                                        <th class="text-center font-weight-bolder">Catatan</th>
                                        @elseif ($selectedRadio === 'radio3')
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
                                        <th class="text-center font-weight-bolder">Catatan</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @php $i=1; @endphp
                                    @foreach ($riwayat as $key => $item)
                                    <tr>
                                        @if ($selectedRadio === 'radio1')
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item['nama'] ?? $item['nama_dosen'] }}</td>
                                        <td>{{ $item['nim'] ?? $item['nip_dosen'] }}</td>
                                        <td>{{ $item['prodi'] ?? $item['email_dosen'] }}</td>
                                        <td>{{ $item['ruangan'] }}</td>
                                        <td>{{ $item['tanggal'] }}</td>
                                        <td>{{ $item['jmulai'] }}</td>
                                        <td>{{ $item['jselesai'] }}</td>
                                        <td>{{ $item['unit'] ?? 'N/A' }}</td>
                                        <td>{{ $item['penanggungJawab'] ?? 'N/A' }}</td>
                                        <td>{{ $item['keperluan'] }}</td>
                                        <td>@if($item['statusAkhir'] == "Selesai")
                                            <span class="badge bg-success">{{$item['statusAkhir'] }}</span>
                                            @elseif($item['statusAkhir'] == "Ditolak")
                                            <span class="badge bg-danger">{{ $item['statusAkhir'] }}</span>
                                            @else
                                            <a>Data tidak valid</a>
                                            @endif
                                        </td>
                                        <td>{{ $item['catatan'] }}</td>
                                        @elseif ($selectedRadio === 'radio2')
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
                                        <td>@if($item['statusAkhir'] == "Selesai")
                                            <span class="badge bg-success">{{$item['statusAkhir'] }}</span>
                                            @elseif($item['statusAkhir'] == "Ditolak")
                                            <span class="badge bg-danger">{{ $item['statusAkhir'] }}</span>
                                            @else
                                            <a>Data tidak valid</a>
                                            @endif
                                        </td>
                                        <td>{{ $item['catatan'] }}</td>
                                        @elseif ($selectedRadio === 'radio3')
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item['nama_dosen'] }}</td>
                                        <td>{{ $item['nip_dosen'] }}</td>
                                        <td>{{ $item['email_dosen'] }}</td>
                                        <td>{{ $item['ruangan'] }}</td>
                                        <td>{{ $item['tanggal'] }}</td>
                                        <td>{{ $item['jmulai'] }}</td>
                                        <td>{{ $item['jselesai'] }}</td>
                                        <td>{{ $item['keperluan'] }}</td>
                                        <td>@if($item['statusAkhir'] == "Selesai")
                                            <span class="badge bg-success">{{$item['statusAkhir'] }}</span>
                                            @elseif($item['statusAkhir'] == "Ditolak")
                                            <span class="badge bg-danger">{{ $item['statusAkhir'] }}</span>
                                            @else
                                            <a>Data tidak valid</a>
                                            @endif
                                        </td>
                                        <td>{{ $item['catatan'] }}</td>
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