@extends('template')

@section('title')
  <title>Daftar Pembelian - Pintaar</title>
@endsection

@section('extra-style')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h3> Laporan Pendapatan </h3>
                <table id="table_id_laporan_pendapatan" class="display">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bulan/Tahun</th>
                            <th>Jumlah Penjualan</th>
                            <th>Pendapatan Tutor</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($list_revenue_permonth as $revenue_permonth)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $revenue_permonth->month }}/{{ $revenue_permonth->year }}</td>
                            <td> {{ $revenue_permonth->jumlah_pembelian }}</td>
                            <td>Rp {{ number_format($revenue_permonth->total_price, 0, ',', '.') }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
          </div>
            <br><br>
            
            <div class="row">
              <div class="col-xs-12 col-md-12">
                  <h3>Daftar Penjualan</h3>
                  <table id="table_id_detail_penjualan" class="display">
                      <thead>
                          <tr>
                              <th>No.</th>
                              <th>No. Pesanan</th>
                              <th>Email User</th>
                              <th>Jumlah Tagihan</th>
                              <th>Dipesan pada</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($list_pembelian_course as $pembelian_course)
                          <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $pembelian_course->no_order }}</td>
                              <td>{{ $pembelian_course->email }}</td>
                              <td>Rp {{ number_format($pembelian_course->total_price, 0, ',', '.') }}</td>
                              <td>{{ $pembelian_course->waktu_order }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
            </div>
    </div>
  </div>
</section>

@endsection

@section('extra-script')
  <script src="{{ URL::asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


  <script>
  $(document).ready( function () {
      $('#table_id_laporan_pendapatan').DataTable();
      $('#table_id_detail_penjualan').DataTable();
  } );
</script>
@endsection