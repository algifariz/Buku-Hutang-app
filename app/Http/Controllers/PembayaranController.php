<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $title = 'Data Pembayaran';
        // $data_hutang = Hutang::get()->groupBy('nama_pelanggan');
        $data_hutang = Hutang::where('status', 'Belum Lunas')->get()->groupBy('nama_pelanggan');
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
    public function edit($id)
    {
        $title = 'Edit Data Pembayaran';
        $data_hutang = Hutang::find($id);
        $data = [
            'data_hutang' => $data_hutang,
            'type_menu' => 'data-pembayaran',
            'title' => $title,
        ];

        return view('pages/edit-data-pembayaran', compact(['data_hutang']), $data);
    }

    //update data hutang
    public function update($id, Request $request)
    {
        $data_hutang = Hutang::find($id);
        $data_hutang->update($request->all());

        return redirect()->route('data-pembayaran')->with('success', 'Data hutang berhasil diupdate');
    }
}
