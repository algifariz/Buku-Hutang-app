<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    public function index()
    {
        $title = 'Data Hutang';
        $data_hutang = Hutang::all();
        $data = [
            'type_menu' => 'data-hutang',
            'title' => $title,
            'data_hutang' => $data_hutang,
        ];
        return view('pages.data-hutang', $data);
    }

    public function tambah()
    {
        $title = 'Tambah Data Hutang';
        $data = [
            'type_menu' => 'data-hutang',
            'title' => $title,
        ];
        return view('pages.tambah-data-hutang', $data);
    }

    //simpan data hutang
    public function simpan(Request $request)
    {
        $request->validate([
            'kode_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah_hutang' => 'required'
        ]);

        $data = [
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'tanggal' => $request->tanggal,
            'jumlah_hutang' => $request->jumlah_hutang,
            'status' => 'Belum Lunas'
        ];

        Hutang::create($data);
        return redirect()->route('data-hutang')->with('success', 'Data hutang berhasil ditambahkan');
    }
    //destroy data hutang
    public function destroy($id)
    {
        Hutang::destroy($id);
        return redirect()->route('data-hutang')->with('success', 'Data hutang berhasil dihapus');
    }

    public function index1()
    {
        $title = 'Data Hutang';
        $data_hutang = Hutang::all();
        $data = [
            'type_menu' => 'data-hutang',
            'title' => $title,
            'data_hutang' => $data_hutang,
        ];
        return view('pages.data-hutang', $data);
    }
}
