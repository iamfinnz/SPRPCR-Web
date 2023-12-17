<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class DosenController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'dosen';
    }

    public function index()
    {
        $dosen = $this->database->getReference($this->tablename)->getValue();
        if ($dosen === null) {
            // Variabel bernilai null
            return view('dosen.static_dosen');
        } else {
            // Variabel tidak bernilai null
            return view('dosen.dosen', compact('dosen'));
        }
    }

    public function create()
    {
        return view('dosen.create_dosen');
    }

    public function store(Request $request)
    {
        $postData = [
            'inisial_dosen' => $request->inisial_dosen,
            'nama_dosen' => $request->nama_dosen,
            'nip_dosen' => $request->nip_dosen,
            'email_dosen' => $request->email_dosen,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if ($postRef) {
            return redirect('dosen')->with('status', 'Berhasil menambahkan data');
        } else {
            return redirect('dosen')->with('status', 'Gagal menambahkan data');
        }
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editdata) {
            return view('dosen.edit_dosen', compact('editdata', 'key'));
        } else {
            return redirect('dosen')->with('status', 'Gagal');
        }
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'inisial_dosen' => $request->inisial_dosen,
            'nama_dosen' => $request->nama_dosen,
            'nip_dosen' => $request->nip_dosen,
            'email_dosen' => $request->email_dosen,
        ];
        $res_updated = $this->database->getReference($this->tablename . '/' . $key)->update($updateData);
        if ($res_updated) {
            return redirect('dosen')->with('status', 'Berhasil mengedit data');
        } else {
            return redirect('dosen')->with('status', 'Gagal mengedit data');
        }
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();
        if ($del_data) {
            return redirect('dosen')->with('status', 'Berhasil menghapus data');
        } else {
            return redirect('dosen')->with('status', 'Gagal menghapus data');
        }
    }
}
