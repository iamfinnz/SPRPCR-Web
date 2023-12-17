<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;


class PeminjamanController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'peminjaman';
        $this->tablename2 = 'pengajuan';
        $this->tablename3 = 'riwayat-peminjaman';
        $this->tablename4 = 'dosen';
        $this->tablename5 = 'rooms';
    }

    public function index(Request $request)
    {
        $selectedRadio = $request->input('radio');
        $peminjaman = [];
        if ($selectedRadio === 'radio1') {
            $dataSnapshot = $this->database->getReference('peminjaman')->orderByChild('nim')->getSnapshot();
            $peminjaman = $this->filterByNim($dataSnapshot->getValue()); // Here, make sure data is in array format
        } elseif ($selectedRadio === 'radio2') {
            $dataSnapshot = $this->database->getReference('peminjaman')->orderByChild('nip_dosen')->getSnapshot();
            $peminjaman = $this->filterByNip($dataSnapshot->getValue()); // Make sure data is an array
        }
        if ($peminjaman === null) {
            // Variabel bernilai null
            return view('peminjaman.static_peminjaman');
        } else {
            // Variabel tidak bernilai null
            return view('peminjaman.peminjaman', ['peminjaman' => $peminjaman, 'selectedRadio' => $selectedRadio]);
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

    public function create()
    {
        $penanggungJawab = $this->database->getReference($this->tablename4)->getValue();
        $ruangan = $this->database->getReference($this->tablename5)->getValue();
        $dosenReference = $this->database->getReference($this->tablename4);
        $dosenSnapshot = $dosenReference->getSnapshot();

        $data['dosen'] = [];

        foreach ($dosenSnapshot->getValue() as $inisial => $dosenData) {
            $data['dosen'][$inisial] = $dosenData['inisial_dosen'];
        }
        return view('peminjaman.create_peminjaman', $data, compact('penanggungJawab', 'ruangan'));
    }

    public function getNamaDosen(Request $request)
    {
        $selectedInisial = $request->input('selectedInisial');
        $nama_dosen = $this->database->getReference('dosen')->getChild($selectedInisial)->getChild('nama_dosen')->getValue();
        $nip_dosen = $this->database->getReference('dosen')->getChild($selectedInisial)->getChild('nip_dosen')->getValue();
        $email_dosen = $this->database->getReference('dosen')->getChild($selectedInisial)->getChild('email_dosen')->getValue();
        return response()->json([
            'nama_dosen' => $nama_dosen,
            'nip_dosen' => $nip_dosen,
            'email_dosen' => $email_dosen
        ]);
    }

    public function store(Request $request)
    {
        if ($request->input('radio_option') == 1) {
            $postData = [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'prodi' => $request->prodi,
                'ruangan' => $request->ruangan,
                'tanggal' => $request->m_tanggal,
                'jmulai' => $request->jam_mulai,
                'jselesai' => $request->jam_selesai,
                'unit' => $request->unit,
                'penanggungJawab' => $request->penanggungJawab,
                'keperluan' => $request->m_keperluan,
                'pengajuanDiterima' => "Diterima",
                'pengembalianDiterima' => "Belum Dikembalikan",
            ];
        } elseif ($request->input('radio_option') == 2) {
            $postData = [
                'inisial_dosen' => $request->inisial_dosen,
                'nama_dosen' => $request->nama_dosen,
                'nip_dosen' => $request->nip_dosen,
                'email_dosen' => $request->email_dosen,
                'ruangan' => $request->ruangan,
                'tanggal' => $request->d_tanggal,
                'jmulai' => $request->jam_mulai,
                'jselesai' => $request->jam_selesai,
                'unit' => $request->unit,
                'penanggungJawab' => $request->penanggungJawab,
                'keperluan' => $request->d_keperluan,
                'pengajuanDiterima' => "Diterima",
                'pengembalianDiterima' => "Belum Dikembalikan",
            ];
        }
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if ($postRef) {
            return redirect('peminjaman')->with('status', 'Berhasil menambahkan data');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal menambahkan data');
        }
    }

    public function destroy($id)
    {
        $key = $id;

        // Buat data riwayat peminjaman
        $data = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        $riwayat = $this->database->getReference($this->tablename3)->getChild($key)->set($data);
        // Hapus pengajuanDiterima, pengembalianDiterima dan fotoRuangan
        $riwayatRef = $this->database->getReference('riwayat-peminjaman/' . $key);
        $riwayatRef->getChild('pengajuanDiterima')->remove();
        $riwayatRef->getChild('fotoRuangan')->remove();
        $riwayatRef->getChild('pengembalianDiterima')->set("Selesai");
        $riwayatRef->getChild('statusAkhir')->set("Selesai");

        // Hapus data di pengajuan
        $del_data = $this->database->getReference($this->tablename2 . '/' . $key)->remove();

        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();

        if ($del_data) {
            return redirect('peminjaman')->with('status', 'Berhasil menghapus data');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal menghapus data');
        }
    }

    public function terimaPengembalian(Request $request, $id)
    {
        $key = $id;
        $formData = [
            'catatan' => $request->input('catatan'),
        ];

        // Mendapatkan data peminjaman
        $peminjamanRef = $this->database->getReference('peminjaman/' . $key);

        // Update peminjaman jadi true
        $peminjamanRef->getChild('pengembalianDiterima')->set("Diterima");

        // Mendapatkan data pengajuan dan mengupdate pengembalian
        $pengajuanRef = $this->database->getReference('pengajuan/' . $key);
        $pengajuanRef->getChild('pengembalianDiterima')->set("Diterima");

        // Hapus pengajuanDiterima di tabel pengajuan
        $hapus = $this->database->getReference('pengajuan/' . $key);
        $hapus->getChild('pengajuanDiterima')->remove();

        // Tambahkan catatan ke data pengajuan
        $catatan = $this->database->getReference($this->tablename . '/' . $key)->update($formData);

        if ($peminjamanRef) {
            return redirect('peminjaman')->with('status', 'Berhasil terima pengembalian');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal menerima pengembalian');
        }
    }
}
