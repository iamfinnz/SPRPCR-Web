<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Buat Peminjaman Ruangan | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buat Peminjaman Ruangan'])

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Buat Peminjaman Ruangan</h5>
                            <a href="{{  url('peminjaman') }}" class="btn btn-sm btn-outline-danger btn-rounded ms-auto">
                                <i class="fa fa-arrow-left me-sm-1"></i>
                                Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('create_peminjaman') }}" method="POST">
                            @csrf
                            <div>
                                <label>
                                    <input type="radio" name="radio_option" value="1"> Mahasiswa
                                </label>
                                <label>
                                    <input type="radio" name="radio_option" value="2"> Dosen
                                </label>
                            </div>
                            <br />

                            <div id="form-container-1" style="display:none;">
                                <h5>Form Tambah Peminjaman Mahasiswa</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama mahasiswa">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">NIM</label>
                                            <input type="number" name="nim" class="form-control" placeholder="Masukkan NIM mahasiswa">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <select name="prodi" class="form-control">
                                                <option value="" selected disabled hidden>Pilih program studi</option>
                                                <option value="Akuntansi Perpajakan">Akuntansi Perpajakan</option>
                                                <option value="Sistem Informasi">Sistem Informasi</option>
                                                <option value="Teknik Elektronika Telekomunikasi">Teknik Elektronika Telekomunikasi</option>
                                                <option value="Teknik Informatika">Teknik Informatika</option>
                                                <option value="Teknik Listrik">Teknik Listrik</option>
                                                <option value="Teknik Mesin">Teknik Mesin</option>
                                                <option value="Teknologi Rekayasa Jaringan Telekomunikasi">Teknologi Rekayasa Jaringan Telekomunikasi</option>
                                                <option value="Teknologi Rekayasa Komputer">Teknologi Rekayasa Komputer</option>
                                                <option value="Teknologi Rekayasa Mekatronika">Teknologi Rekayasa Mekatronika</option>
                                                <option value="Teknologi Rekayasa Sistem Elektronika">Teknologi Rekayasa Sistem Elektronika</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select name="ruangan" class="form-control">
                                                @foreach($ruangan as $item)
                                                <option value="" selected disabled hidden>Pilih ruangan</option>
                                                <option value="{{ $item['nama_ruangan'] }}">{{ $item['nama_ruangan'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="m_tanggal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jam Mulai</label>
                                            <select name="jam_mulai" class="form-control">
                                                <option value="" selected disabled hidden>Pilih jam mulai peminjaman</option>
                                                <option value="07.00">07.00 WIB</option>
                                                <option value="08.00">08.00 WIB</option>
                                                <option value="09.00">09.00 WIB</option>
                                                <option value="10.00">10.00 WIB</option>
                                                <option value="11.00">11.00 WIB</option>
                                                <option value="12.00">12.00 WIB</option>
                                                <option value="13.00">13.00 WIB</option>
                                                <option value="14.00">14.00 WIB</option>
                                                <option value="15.00">15.00 WIB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jam Selesai</label>
                                            <select name="jam_selesai" class="form-control">
                                                <option value="" selected disabled hidden>Pilih jam selesai peminjaman</option>
                                                <option value="08.00">08.00 WIB</option>
                                                <option value="09.00">09.00 WIB</option>
                                                <option value="10.00">10.00 WIB</option>
                                                <option value="11.00">11.00 WIB</option>
                                                <option value="12.00">12.00 WIB</option>
                                                <option value="13.00">13.00 WIB</option>
                                                <option value="14.00">14.00 WIB</option>
                                                <option value="15.00">15.00 WIB</option>
                                                <option value="16.00">16.00 WIB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <select name="unit" class="form-control">
                                                <option value="" selected disabled hidden>Pilih unit</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                                <option value="Bagian">Bagian</option>
                                                <option value="Prodi">Prodi</option>
                                                <option value="BEM">BEM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Penanggung Jawab</label>
                                            <select name="penanggungJawab" class="form-control">
                                                @foreach($penanggungJawab as $item)
                                                <option value="" selected disabled hidden>Pilih penanggung jawab</option>
                                                <option value="{{ $item['nama_dosen'] }}">{{ $item['nama_dosen'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Keperluan</label>
                                            <input type="text" name="m_keperluan" class="form-control" placeholder="Masukkan keperluan peminjaman">
                                        </div>
                                    </div>
                                    <div class="form-group mt-5 text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-rounded">Simpan</button>
                                    </div>
                                </div>
                            </div>

                            <div id="form-container-2" style="display:none;">
                                <h5>Form Tambah Peminjaman Dosen</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Inisial Dosen</label>
                                            <select id="inisial_dosen" name="inisial_dosen" class="form-control">
                                                @foreach ($dosen as $inisial => $inisial_dosen)
                                                <option value="" selected disabled hidden>Pilih inisial dosen</option>
                                                <option value="{{ $inisial }}">{{ $inisial_dosen }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Dosen</label>
                                            <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIP Dosen</label>
                                            <input type="number" id="nip_dosen" name="nip_dosen" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email_dosen" name="email_dosen" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select name="ruangan" class="form-control">
                                                @foreach($ruangan as $item)
                                                <option value="" selected disabled hidden>Pilih ruangan</option>
                                                <option value="{{ $item['nama_ruangan'] }}">{{ $item['nama_ruangan'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="d_tanggal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jam Mulai</label>
                                            <select name="jam_mulai" class="form-control">
                                                <option value="" selected disabled hidden>Pilih jam mulai peminjaman</option>
                                                <option value="07.00">07.00 WIB</option>
                                                <option value="08.00">08.00 WIB</option>
                                                <option value="09.00">09.00 WIB</option>
                                                <option value="10.00">10.00 WIB</option>
                                                <option value="11.00">11.00 WIB</option>
                                                <option value="12.00">12.00 WIB</option>
                                                <option value="13.00">13.00 WIB</option>
                                                <option value="14.00">14.00 WIB</option>
                                                <option value="15.00">15.00 WIB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jam Selesai</label>
                                            <select name="jam_selesai" class="form-control">
                                                <option value="" selected disabled hidden>Pilih jam selesai peminjaman</option>
                                                <option value="08.00">08.00 WIB</option>
                                                <option value="09.00">09.00 WIB</option>
                                                <option value="10.00">10.00 WIB</option>
                                                <option value="11.00">11.00 WIB</option>
                                                <option value="12.00">12.00 WIB</option>
                                                <option value="13.00">13.00 WIB</option>
                                                <option value="14.00">14.00 WIB</option>
                                                <option value="15.00">15.00 WIB</option>
                                                <option value="16.00">16.00 WIB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Keperluan</label>
                                            <input type="text" name="d_keperluan" class="form-control" placeholder="Masukkan keperluan peminjaman">
                                        </div>
                                    </div>
                                    <div class="form-group mt-5 text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-rounded">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const radioOptions = document.querySelectorAll('input[name="radio_option"]');
                                const formContainer1 = document.getElementById('form-container-1');
                                const formContainer2 = document.getElementById('form-container-2');

                                radioOptions.forEach(option => {
                                    option.addEventListener('change', function() {
                                        formContainer1.style.display = option.value === '1' ? 'block' : 'none';
                                        formContainer2.style.display = option.value === '2' ? 'block' : 'none';
                                    });
                                });
                            });
                        </script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#inisial_dosen').change(function() {
                                    var selectedInisial = $(this).val();
                                    $.ajax({
                                        url: '/get_namadosen',
                                        type: 'GET',
                                        data: {
                                            selectedInisial: selectedInisial
                                        },
                                        success: function(data) {
                                            $('#nama_dosen').val(data.nama_dosen);
                                            $('#nip_dosen').val(data.nip_dosen);
                                            $('#email_dosen').val(data.email_dosen);
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    </html>