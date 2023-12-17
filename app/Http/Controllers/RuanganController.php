<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use GuzzleHttp\Client;

class RuanganController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'rooms';
    }

    public function index()
    {
        $ruangan = $this->database->getReference($this->tablename)->getValue();
        if ($ruangan === null) {
            // Variabel bernilai null
            return view('ruangan.static_ruangan');
        } else {
            // Variabel tidak bernilai null
            return view('ruangan.ruangan', compact('ruangan'));
        }
    }

    public function create()
    {
        return view('ruangan.create_ruangan');
    }

    public function store(Request $request)
    {
        // Upload gambar ke ImgBB menggunakan API
        $client = new Client();
        $response = $client->post('https://api.imgbb.com/1/upload', [
            'form_params' => [
                'key' => '70b14013386ca364844fecdb336a0cf1',
                'image' => base64_encode(file_get_contents($request->file('foto_ruangan')->path())),
            ],
        ]);

        $imageData = json_decode($response->getBody()->getContents(), true);
        $imageUrl = $imageData['data']['url'];

        $postData = [
            'nama_ruangan' => $request->input('nama_ruangan'),
            'lantai_ruangan' => $request->input('lantai_ruangan'),
            'fasilitas_ruangan' => $request->input('fasilitas_ruangan'),
            'deskripsi_ruangan' => $request->input('deskripsi_ruangan'),
            'foto_ruangan' => $imageUrl,
        ];

        $postRef = $this->database->getReference($this->tablename)->push($postData);

        if ($postRef) {
            return redirect('ruangan')->with('status', 'Berhasil menambahkan data');
        } else {
            return redirect('ruangan')->with('status', 'Gagal menambahkan data');
        }
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editdata) {
            return view('ruangan.edit_ruangan', compact('editdata', 'key'));
        } else {
            return redirect('ruangan')->with('status', 'Gagal');
        }
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        // Upload gambar ke ImgBB menggunakan API
        $client = new Client();
        $response = $client->post('https://api.imgbb.com/1/upload', [
            'form_params' => [
                'key' => '70b14013386ca364844fecdb336a0cf1',
                'image' => base64_encode(file_get_contents($request->file('foto_ruangan')->path())),
            ],
        ]);

        $imageData = json_decode($response->getBody()->getContents(), true);
        $imageUrl = $imageData['data']['url'];

        $updateData = [
            'nama_ruangan' => $request->input('nama_ruangan'),
            'lantai_ruangan' => $request->input('lantai_ruangan'),
            'fasilitas_ruangan' => $request->input('fasilitas_ruangan'),
            'deskripsi_ruangan' => $request->input('deskripsi_ruangan'),
            'foto_ruangan' => $imageUrl,
        ];

        $res_updated = $this->database->getReference($this->tablename . '/' . $key)->update($updateData);
        if ($res_updated) {
            return redirect('ruangan')->with('status', 'Berhasil mengedit data');
        } else {
            return redirect('ruangan')->with('status', 'Gagal mengedit data');
        }
    }

    public function destroy($id)
    {
        $key = $id;

        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();
        if ($del_data) {
            return redirect('ruangan')->with('status', 'Berhasil menghapus data');
        } else {
            return redirect('ruangan')->with('status', 'Gagal menghapus data');
        }
    }
}
