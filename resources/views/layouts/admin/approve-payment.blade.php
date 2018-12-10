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
    $('#table_id').DataTable();
} );
</script>
<br><br><br><br><br><br>
<div class="container"  style= "word-wrap: break-word;">

  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>Nomor Order</th>
              <th>Email User</th>
              <th>Nama User</th>
              <th>Jumlah Tagihan</th>
              <th>Status Pembayaran</th>
              <th>Bukti Pembayaran</th>
              <th>Dipesan pada</th>
              <th>Detail</th>
          </tr>
      </thead>
      <tbody>
        @foreach($list_pembelian_course as $pembelian_course)
          <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$pembelian_course->no_order}}</td>
              <td>{{$pembelian_course->email}}</td>
              <td>{{$pembelian_course->nama}}</td>
              <td>Rp. {{$pembelian_course->total_price}}</td>
              <td>{{$pembelian_course->status}}</td>
              @if(empty($pembelian_course->bukti_pembayaran))
                <td>Belum Diupload</td>
              @else
                <td><a href={{ URL::asset($pembelian_course->bukti_pembayaran) }}> Download</a></td>

              @endif
              <td>{{$pembelian_course->waktu_order}}</td>
              <td> <a href ="{{route(('approve_payment_detail'), $pembelian_course -> id_pembelian)}}">Detail</a></td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection
