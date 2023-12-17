<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Contract\Database;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatDataExport;


class RiwayatController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'riwayat-peminjaman';
    }

    public function index(Request $request)
    {
        $selectedRadio = $request->input('radio');
        $riwayat = [];
        if ($selectedRadio === 'radio1') {
            $riwayatData = $this->database->getReference($this->tablename)->getValue();
            // Ubah data menjadi array tunggal
            $riwayat = [];
            foreach ($riwayatData as $item) {
                if (isset($item['nim'])) {
                    $riwayat[] = [
                        'nama' => $item['nama'],
                        'nim' => $item['nim'],
                        'prodi' => $item['prodi'],
                        'ruangan' => $item['ruangan'],
                        'tanggal' => $item['tanggal'],
                        'jmulai' => $item['jmulai'],
                        'jselesai' => $item['jselesai'],
                        'unit' => $item['unit'],
                        'penanggungJawab' => $item['penanggungJawab'],
                        'keperluan' => $item['keperluan'],
                        'statusAkhir' => $item['statusAkhir'],
                        'catatan' => $item['catatan'],
                    ];
                } elseif (isset($item['nip_dosen'])) {
                    $riwayat[] = [
                        'nama_dosen' => $item['nama_dosen'],
                        'nip_dosen' => $item['nip_dosen'],
                        'email_dosen' => $item['email_dosen'],
                        'ruangan' => $item['ruangan'],
                        'tanggal' => $item['tanggal'],
                        'jmulai' => $item['jmulai'],
                        'jselesai' => $item['jselesai'],
                        'keperluan' => $item['keperluan'],
                        'statusAkhir' => $item['statusAkhir'],
                        'catatan' => $item['catatan'],
                    ];
                }
            }
        } elseif ($selectedRadio === 'radio2') {
            $dataSnapshot = $this->database->getReference($this->tablename)->orderByChild('nim')->getSnapshot();
            $riwayat = $this->filterByNim($dataSnapshot->getValue());
        } elseif ($selectedRadio === 'radio3') {
            $dataSnapshot = $this->database->getReference($this->tablename)->orderByChild('nip_dosen')->getSnapshot();
            $riwayat = $this->filterByNip($dataSnapshot->getValue());
        }
        if ($riwayat === null) {
            // Variabel bernilai null
            return view('riwayat.static_riwayat');
        } else {
            // Variabel tidak bernilai null
            return view('riwayat.riwayat', ['riwayat' => $riwayat, 'selectedRadio' => $selectedRadio]);
        }
    }

    protected function filterByNim($data)
    {
        if ($data === null) {
            return []; // Atau tindakan yang sesuai jika $data adalah null
        }
        return array_filter($data, function ($item) {
            return isset($item['nim']);
        });
    }

    protected function filterByNip($data)
    {
        if ($data === null) {
            return []; // Atau tindakan yang sesuai jika $data adalah null
        }
        return array_filter($data, function ($item) {
            return isset($item['nip_dosen']);
        });
    }

    public function exportexcel2()
    {
        // Ambil data dari Firebase Realtime Database
        $dataSnapshot = $this->database->getReference($this->tablename)->orderByChild('nim')->getSnapshot();
        $riwayat = $this->filterByNim($dataSnapshot->getValue()); // Here, make sure data is in array format

        // Proses data (sesuaikan dengan struktur tabel Anda)
        $riwayatArray = [];
        foreach ($riwayat as $key => $data) {
            $riwayatArray[] = [
                'nama' => $data['nama'],
                'nim' => $data['nim'] . " ",
                'prodi' => $data['prodi'],
                'ruangan' => $data['ruangan'],
                'tanggal' => $data['tanggal'],
                'jmulai' => $data['jmulai'],
                'jselesai' => $data['jselesai'],
                'unit' => $data['unit'],
                'penanggungJawab' => $data['penanggungJawab'],
                'keperluan' => $data['keperluan'],
                'statusAkhir' => $data['statusAkhir'],
                'catatan' => $data['catatan'],
            ];
        }

        // Tentukan heading yang diinginkan
        $headings = ['Nama', 'NIM', 'Prodi', 'Ruangan', 'Tanggal', 'Jam Mulai', 'Jam Selesai', 'Unit', 'Penanggung Jawab', 'Keperluan', 'Status Akhir', 'Catatan'];

        // Export riwayat ke Excel
        return Excel::download(new RiwayatDataExport($riwayatArray, $headings), 'Riwayat Peminjaman Ruangan PCR oleh Mhs.xlsx');
    }

    public function exportexcel3()
    {
        // Ambil data dari Firebase Realtime Database
        $dataSnapshot = $this->database->getReference($this->tablename)->orderByChild('nip_dosen')->getSnapshot();
        $riwayat = $this->filterByNip($dataSnapshot->getValue()); // Make sure data is an array

        // Proses data (sesuaikan dengan struktur tabel Anda)
        $riwayatArray = [];
        foreach ($riwayat as $key => $data) {
            $riwayatArray[] = [
                'nama_dosen' => $data['nama_dosen'],
                'nip_dosen' => $data['nip_dosen'] . " ",
                'email_dosen' => $data['email_dosen'],
                'ruangan' => $data['ruangan'],
                'tanggal' => $data['tanggal'],
                'jmulai' => $data['jmulai'],
                'jselesai' => $data['jselesai'],
                'keperluan' => $data['keperluan'],
                'statusAkhir' => $data['statusAkhir'],
                'catatan' => $data['catatan'],
            ];
        }

        // Tentukan heading yang diinginkan
        $headings = ['Nama', 'NIP', 'Email', 'Ruangan', 'Tanggal', 'Jam Mulai', 'Jam Selesai', 'Keperluan', 'Status Akhir', 'Catatan'];

        // Export riwayat ke Excel
        return Excel::download(new RiwayatDataExport($riwayatArray, $headings), 'Riwayat Peminjaman Ruangan PCR oleh Dosen.xlsx');
    }
}
