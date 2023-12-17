<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Exception\DatabaseException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Database $database)
    {
        $this->middleware('auth');
        $this->database = $database;
        $this->tablename = 'pengajuan';
        $this->tablename2 = 'peminjaman';
        $this->tablename3 = 'riwayat-peminjaman';
        $this->tablename4 = 'matakuliah';
        $this->tablename5 = 'dosen';
        $this->tablename6 = 'rooms';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            // Untuk data di header
            $total_pengajuan = $reference = $this->database->getReference($this->tablename)->orderByChild('pengajuanDiterima')->equalTo("Belum Diterima")->getSnapshot()->numChildren();
            $total_peminjaman = $reference = $this->database->getReference($this->tablename2)->getSnapshot()->numChildren();
            $total_riwayatpeminjaman = $reference = $this->database->getReference($this->tablename3)->getSnapshot()->numChildren();
            $total_matakuliah = $reference = $this->database->getReference($this->tablename4)->getSnapshot()->numChildren();
            $total_dosen = $reference = $this->database->getReference($this->tablename5)->getSnapshot()->numChildren();
            $total_ruangan = $reference = $this->database->getReference($this->tablename6)->getSnapshot()->numChildren();

            // Data tabel pengajuan
            $ref = $this->database->getReference($this->tablename)->orderByChild('pengajuanDiterima')->equalTo("Belum Diterima");
            $pengajuan = $ref->getValue();

            if ($pengajuan === null) {
                // Variabel bernilai null
                return view('home.static_home', compact('total_pengajuan', 'total_peminjaman', 'total_riwayatpeminjaman', 'total_matakuliah', 'total_dosen', 'total_ruangan'));
            } else {
                // Variabel tidak bernilai null
                return view('home.home', compact('pengajuan', 'total_pengajuan', 'total_peminjaman', 'total_riwayatpeminjaman', 'total_matakuliah', 'total_dosen', 'total_ruangan'));
            }
        } catch (DatabaseException $e) {
            // Tangani kesalahan jika ada
            dd($e->getMessage());
        }
    }

    public function terima(Request $request, $id)
    {
        $key = $id;
        $formData = [
            'catatan' => $request->input('catatan'),
        ];

        // Mendapatkan data pengajuan
        $pengajuanRef = $this->database->getReference('pengajuan/' . $key);

        // Update pengajuan jadi Diterima
        $pengajuanRef->getChild('pengajuanDiterima')->set("Diterima");

        // Tambahkan catatan ke data pengajuan
        $catatan = $this->database->getReference($this->tablename . '/' . $key)->update($formData);

        // Buat data peminjaman
        $data = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        $peminjaman = $this->database->getReference($this->tablename2)->getChild($key)->set($data);

        if ($pengajuanRef) {
            return redirect('peminjaman')->with('status', 'Pengajuan diterima');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal menerima pengajuan');
        }
    }

    public function tolak(Request $request, $id)
    {
        $key = $id;
        $formData = [
            'catatan' => $request->input('catatan'),
        ];

        // Mendapatkan data pengajuan
        $pengajuanRef = $this->database->getReference('pengajuan/' . $key);

        // Update pengajuanDiterima jadi Ditolak
        $pengajuanRef->getChild('pengajuanDiterima')->set('Ditolak');

        // Buat statusAkhir dengan value Ditolak
        $pengajuanRef->getChild('statusAkhir')->set('Ditolak');

        // Tambahkan catatan ke data pengajuan
        $catatan = $this->database->getReference($this->tablename . '/' . $key)->update($formData);

        // Tambahkan data ke tabel riwayat peminjaman
        $data = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        $riwayat_peminjaman = $this->database->getReference($this->tablename3)->getChild($key)->set($data);

        if ($catatan) {
            return redirect('home')->with('status', 'Berhasil tolak pengajuan');
        } else {
            return redirect('home')->with('status', 'Tidak dapat menolak pengajuan');
        }
    }
}
