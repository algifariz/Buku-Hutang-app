@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Data Hutang</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <form class="d-flex justify-content-center flex-column" action="/edit-data-pembayaran/{{ $data_hutang->id }}"
                method="POST">
                @csrf
                @method('POST')
                <div class="col-12">
                  <div class="card-header">
                    <h4>Tambah Daata Hutang</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Kode Pelanggan</label>
                      <input type="text" name="kode_pelanggan" class="form-control" required=""
                        value="{{ $data_hutang->kode_pelanggan }}" readonly>

                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama_pelanggan" class="form-control" required=""
                        value="{{ $data_hutang->nama_pelanggan }}" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Hutang</label>
                      <input type="text" name="jumlah_hutang" class="form-control" required=""
                        value="{{ $data_hutang->jumlah_hutang }}">
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
