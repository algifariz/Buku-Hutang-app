<?php

namespace App\Http\Controllers;

use App\Models\BayarHutang;
use App\Models\Hutang;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $title = 'Data Pembayaran';
        $data_hutang = Hutang::with('bayarHutang')->get()->groupBy('nama_pelanggan');
        $data = [
            'data_hutang' => $data_hutang,
            'type_menu' => 'data-pembayaran',
            'title' => $title,
        ];
        return view('pages.data-pembayaran', $data);
    }

    public function detail($nama)
    {
        $title = 'Detail Pembayaran';
        $data_hutang = Hutang::where('nama_pelanggan', $nama)->get();
        $data = [
            'data_hutang' => $data_hutang,
            'type_menu' => 'data-pembayaran',
            'title' => $title,
        ];
        return view('pages.detail-pembayaran', $data);
    }

    public function bayarHutang($nama)
    {
        $title = 'Bayar Hutang';
        $data_hutang = Hutang::with('bayarHutang')->where('nama_pelanggan', $nama)->get();

        $data = [
            'data_hutang' => $data_hutang,
            'type_menu' => 'data-pembayaran',
            'title' => $title,
        ];
        return view('pages.bayar-hutang', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = [
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'jumlah_bayar' => $request->jumlah_bayar,
        ];

        BayarHutang::create($data);
        return redirect()->route('data-pembayaran')->with('success', 'Data hutang berhasil ditambahkan');
    }
}
