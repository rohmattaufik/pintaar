@extends('template')

@section('title')
  <title>Approve Payment</title>
@endsection

@section('content')

<script src="{{ URL::asset('js/vendor/jquery-1.12.4.min.js') }}"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<script>
$(document).ready( function () {
    $('#table_id_laporan_pendapatan').DataTable();
    $('#table_id_detail_penjualan').DataTable();
} );
</script>
<br><br><br><br><br><br>
<div class="container"  style= "word-wrap: break-word;">

  <h3> Laporan Pendapatan </h3>
  <table id="table_id_laporan_pendapatan" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>Bulan</th>
              <th>Jumlah Pembelian </th>
              <th>Pendapatan Tutor</th>


          </tr>
      </thead>
      <tbody>
        @foreach($list_revenue_permonth as $revenue_permonth)
          <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$revenue_permonth->month}}</td>
              <td> {{$revenue_permonth->jumlah_pembelian}}</td>
              <td>Rp. {{$revenue_permonth->total_price}}</td>

          </tr>
        @endforeach
      </tbody>
  </table>
  <br><br>

  <h3> Detail Penjualan </h3>
  <table id="table_id_detail_penjualan" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>Email User</th>
              <th>Nama User</th>
              <th>Jumlah Tagihan</th>
              <th>Dipesan pada</th>
          </tr>
      </thead>
      <tbody>
        @foreach($list_pembelian_course as $pembelian_course)
          <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$pembelian_course->email}}</td>
              <td>{{$pembelian_course->nama}}</td>
              <td>Rp. {{$pembelian_course->total_price}}</td>
              <td>{{$pembelian_course->waktu_order}}</td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection
