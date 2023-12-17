<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TemplateController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'template';
    }

    public function template()
    {
        // Mendapatkan data dari Firebase Realtime Database
        $data = $this->database->getReference($this->tablename)->getValue();

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Jadwal Mata Kuliah');

        // Mengisi data ke dalam file Excel
        $dataArray = $data;
        $row = 1;
        foreach ($dataArray as $rowData) {
            $col = 1;
            foreach ($rowData as $value) {
                $sheet->setCellValueByColumnAndRow($col, $row, $value);
                $col++;
            }
            $row++;
        }

        // Menyimpan file Excel
        $filename = 'Template Jadwal Mata Kuliah.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        // Mengirim file ke pengguna
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
