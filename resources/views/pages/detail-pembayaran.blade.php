@extends('layouts.app')

@section('title', 'Status Guru')

@push('style')
  <!-- CSS Libraries -->
  {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

  <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')

  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $title }}</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('data-pembayaran') }}" class="btn btn-primary">Kembali</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table-striped table" id="table-1">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Pelangan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">jumlah Hutang</th>


                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data_hutang as $hutang)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $hutang->kode_pelanggan }}</td>
                          <td>{{ $hutang->nama_pelanggan }}</td>
                          <td>{{ $hutang->tanggal }}</td>
                          <td>Rp {{ number_format($hutang->jumlah_hutang, 0, ',', '.') }}</td>


                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table-striped table" id="table-1">
                    <thead>
                      <tr>
                        <th scope="col">
                          <h4>Sisa Hutang</h4>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                          <h3>Rp
                            {{ number_format($data_hutang->where('nama_pelanggan', $hutang->nama_pelanggan)->sum('jumlah_hutang'), 0, ',', '.') }}
                          </h3>
                        </th>

                      </tr>
                    </thead>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
  <!-- JS Libraies -->
  {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
  <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  {{-- <script src="{{ asset() }}"></script> --}}
  {{-- <script src="{{ asset() }}"></script> --}}
  <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
