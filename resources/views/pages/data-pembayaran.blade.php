@extends('layouts.app')

@section('title', $title)

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

                <table class="table-sm table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode Pelanggan</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($data_hutang as $key => $value)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        @foreach ($value as $item)
                          @if ($loop->first)
                            <td>{{ $item->kode_pelanggan }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>IDR {{ number_format($value->sum('jumlah_hutang'), 0, ',', '.') }}</td>
                            <td>
                              <a href="/detail-pembayaran/{{ $item->nama_pelanggan }}"
                                class="btn btn-icon icon-left btn-primary"><i class="fa fa-eye"
                                  aria-hidden="true"></i></i>
                                detail
                              </a>
                            </td>
                          @endif
                        @endforeach
                      </tr>
                    @endforeach


                  </tbody>
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
