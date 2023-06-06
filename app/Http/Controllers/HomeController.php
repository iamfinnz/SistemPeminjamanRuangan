<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Database;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengajuan = $this->database->getReference($this->tablename)->getValue();
        $total_pengajuan = $reference = $this->database->getReference($this->tablename)->getSnapshot()->numChildren();
        $total_peminjaman = $reference = $this->database->getReference($this->tablename2)->getSnapshot()->numChildren();
        return view('home', compact('pengajuan', 'total_pengajuan', 'total_peminjaman'));
    }

    public function create()
    {
        return view('buat');
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
            return redirect('home')->with('status', 'Berhasil menambahkan data');
        } else {
            return redirect('home')->with('status', 'Gagal menambahkan data');
        }
    }

    public function terima($id)
    {
        $key = $id;
        $terimadata = $this->database->getReference($this->tablename)->getChild($key)->getValue();

        $postRef = $this->database->getReference($this->tablename2)->push($terimadata);
        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();
        if ($postRef) {
            return redirect('peminjaman')->with('status', 'Pengajuan diterima');
        } else {
            return redirect('peminjaman')->with('status', 'Gagal menerima pengajuan');
        }
    }

    public function tolak($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();
        if ($del_data) {
            return redirect('home')->with('status', 'Pengajuan ditolak');
        } else {
            return redirect('home')->with('status', 'Tidak dapat menolak pengajuan');
        }
    }
}
