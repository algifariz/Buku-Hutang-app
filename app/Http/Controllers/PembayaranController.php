<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $title = 'Data Pembayaran';
        $data_hutang = Hutang::all();
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
        $data_hutang = Hutang::where('nama_pelanggan', $nama)->where('status', 'Belum Lunas')->get();
        $data = [
            'data_hutang' => $data_hutang,
            'type_menu' => 'data-pembayaran',
            'title' => $title,
        ];
        return view('pages/detail-pembayaran', $data);
    }

    public function bayar(Request $request, $id)
    {
        $data = [
            $request->all(),
            'status' => 'Lunas',
        ];

        // update by id
        Hutang::find($id)->update($data);
        return redirect()->route('data-pembayaran')->with('success', 'Data hutang berhasil diupdate');
    }

    //edit data hutang
    public function edit()
    {
        $title = 'Edit Data pembayaran';
        $data_hutang  = Hutang::all();
        $data = [
            'type_menu' => 'edit-data-pembayaran',
            'data_hutang' => $data_hutang,
            'title' => $title,
        ];
        return view('pages.edit-data-pembayaran', $data);
    }
}
