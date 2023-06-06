<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Kreait\Firebase\Factory;
use Barryvdh\DomPDF\PDF;


class PeminjamanController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'peminjaman';
    }

    public function index()
    {
        $peminjaman = $this->database->getReference($this->tablename)->getValue();
        return view('peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $postData = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'ruangan' => $request->ruangan,
            'tanggal' => $request->tanggal,
            'jmulai' => $request->jam_mulai,
            'jselesai' => $request->jam_selesai,
            'fasilitas' => $request->fasilitas,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if ($postRef) {
            return redirect('peminjaman')->with('status', 'Berhasil menambahkan data');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal menambahkan data');
        }
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editdata) {
            return view('edit', compact('editdata', 'key'));
        } else {
            return redirect('peminjaman')->with('status', 'Gagal');
        }
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'ruangan' => $request->ruangan,
            'tanggal' => $request->tanggal,
            'jmulai' => $request->jam_mulai,
            'jselesai' => $request->jam_selesai,
            'fasilitas' => $request->fasilitas,
        ];
        $res_updated = $this->database->getReference($this->tablename . '/' . $key)->update($updateData);
        if ($res_updated) {
            return redirect('peminjaman')->with('status', 'Berhasil mengubah data');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal mengubah data');
        }
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();
        if ($del_data) {
            return redirect('peminjaman')->with('status', 'Berhasil menghapus data');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal menghapus data');
        }
    }

    public function exportpdf()
    {
        // Mengambil data dari Firebase Realtime Database
        $data = $this->database->getReference($this->tablename)->getValue();

        // Membuat file PDF menggunakan DOMPDF
        $pdf = \PDF::loadView('pdf_view', ['data' => $data]);
        return $pdf->download('data_peminjaman.pdf');
    }

    //public function exportexcel()
    //{
    //    // Inisialisasi Firebase Realtime Database
    //    $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase_credentials.json');
    //    $database = $factory->createDatabase();
    //
    //    // Mendapatkan data dari Firebase Realtime Database
    //    $data = $database->getReference('/path/to/data')->getValue();
    //
    //    // Memformat data ke dalam format Excel
    //    $spreadsheet = new Spreadsheet();
    //    $sheet = $spreadsheet->getActiveSheet();
    //    $sheet->fromArray($data);
    //
    //    // Menyimpan file Excel ke dalam storage
    //    $writer = new Xlsx($spreadsheet);
    //    $filename = 'data.xlsx';
    //    $path = 'exports/' . $filename;
    //    Storage::disk('local')->put($path, $writer->save('php://output'));

    //    // Mengembalikan file Excel untuk di-download
    //    return Storage::download($path, $filename);
    //}
}
