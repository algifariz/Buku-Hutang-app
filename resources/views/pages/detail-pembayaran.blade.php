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
                        <th scope="col">Status</th>
                        <th scope="col">action</th>

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

                          <td>
                            @if ($hutang->status == 'Lunas')
                              <div class="badge badge-success">{{ $hutang->status }}</div>
                            @else
                              <div class="badge badge-danger">{{ $hutang->status }}</div>
                            @endif
                          </td>
                          </td>

                          <td>
                            <form action="{{ route('bayar-hutang', $hutang->id) }}" method="post">
                              @csrf
                              @method('patch')
                              <input type="hidden" name="id" value="{{ $hutang->id }}">
                              <input type="hidden" name="kode_pelanggan" value="{{ $hutang->kode_pelanggan }}">
                              <input type="hidden" name="nama_pelanggan" value="{{ $hutang->nama_pelanggan }}">
                              <input type="hidden" name="tanggal" value="{{ $hutang->tanggal }}">
                              <input type="hidden" name="jumlah_hutang" value="{{ $hutang->jumlah_hutang }}">
                              <a href="/edit-data-pembayaran/{{ $hutang->id }}" class="btn btn-warning">Bayar</a>
                              <button type="submit" class="btn btn-primary">Bayar Lunas</button>
                            </form>

                          </td>
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
                            {{ number_format($data_hutang->where('nama_pelanggan', $hutang->nama_pelanggan)->where('status', 'Belum Lunas')->sum('jumlah_hutang'),0,',','.') }}
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
