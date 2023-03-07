@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Bayar Hutang</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">

              <form class="d-flex justify-content-center flex-column" action="/simpan-pembayaran" method="POST">
                @csrf
                @method('POST')
                <div class="col-12">
                  <div class="card-header">
                    <h4>Bayar Hutang</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Kode Pelanggan</label>
                      <input type="text" name="kode_pelanggan" class="form-control" required=""
                        value="{{ $data_hutang[0]->kode_pelanggan }}" readonly>

                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama_pelanggan" class="form-control" required=""
                        value="{{ $data_hutang[0]->nama_pelanggan }}" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Hutang</label>
                      @php
                        $jumlah_hutang = $data_hutang->sum('jumlah_hutang');
                        $jumlah_bayar = $data_hutang[0]->bayarHutang->sum('jumlah_bayar');
                      @endphp
                      <input type="text" class="form-control" required=""
                        value="Rp {{ number_format($jumlah_hutang - $jumlah_bayar, 0, ',', '.') }}" readonly disabled>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Bayar</label>
                      <input type="number" name="jumlah_bayar" class="form-control" required="">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit" value="update">Submit</button>
                  </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
@endpush
