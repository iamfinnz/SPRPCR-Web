<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Alert;

class KuliahController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'matakuliah';
    }

    public function index()
    {
        $matakuliah = $this->database->getReference($this->tablename)->getValue();
        if ($matakuliah === null) {
            // Variabel bernilai null
            return view('matakuliah.static_matakuliah');
        } else {
            // Variabel tidak bernilai null
            return view('matakuliah.matakuliah', compact('matakuliah'));
        }
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editdata) {
            return view('matakuliah.edit_matakuliah', compact('editdata', 'key'));
        } else {
            return redirect('matakuliah')->with('status', 'Gagal');
        }
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            '1' => $request->nama_matkul,
            '2' => $request->nama_dosen,
            '3' => $request->ruangan,
            '4' => $request->hari,
            '5' => $request->jam_mulai,
            '6' => $request->jam_selesai,
        ];
        $res_updated = $this->database->getReference($this->tablename . '/' . $key)->update($updateData);
        if ($res_updated) {
            return redirect('matakuliah')->with('status', 'Berhasil mengedit data');
        } else {
            return redirect('matakuliah')->with('status', 'Gagal mengedit data');
        }
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();
        if ($del_data) {
            return redirect('matakuliah')->with('status', 'Berhasil menghapus data');
        } else {
            return redirect('matakuliah')->with('status', 'Gagal menghapus data');
        }
    }

    public function exportjson(Request $request)
    {
        // Membaca file Excel yang diunggah
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();

        $data = [];

        // Mengonversi data Excel menjadi array
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }

        // Menyimpan data ke Firebase Realtime Database
        $export_data = $this->database->getReference('matakuliah')->set($data);
        alert()->success('Berhasil!', 'Berhasil menambahkan data');
        if ($export_data) {
            return redirect('matakuliah')->with('status', 'Berhasil menambahkan data');
        } else {
            return redirect('matakuliah')->with('status', 'Gagal menambahkan data');
        }
    }
}
