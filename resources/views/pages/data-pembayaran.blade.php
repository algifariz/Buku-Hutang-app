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
                      <th>Status</th>
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
                            @php
                              $jumlah_hutang = $value->sum('jumlah_hutang');
                              $jumlah_bayar = $item->bayarHutang->sum('jumlah_bayar');
                            @endphp
                            <td>IDR
                              {{ number_format($jumlah_hutang - $jumlah_bayar, 0, ',', '.') }}
                            </td>
                            <td>
                              @if ($jumlah_hutang - $jumlah_bayar == 0)
                                <div class="badge badge-success">Lunas</div>
                              @else
                                <div class="badge badge-danger">Belum Lunas</div>
                              @endif
                            </td>
                            <td class="d-flex ">
                              <a href="/detail-pembayaran/{{ $item->nama_pelanggan }}"
                                class="btn btn-icon icon-left btn-primary mr-2"><i class="fa fa-eye"
                                  aria-hidden="true"></i></i>
                                detail
                              </a>
                              <a href="/bayar-hutang/{{ $item->nama_pelanggan }}" class="btn btn-warning mr-2">Bayar</a>
                              {{-- <button type="submit" class="btn btn-success">Bayar Lunas</button> --}}
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
