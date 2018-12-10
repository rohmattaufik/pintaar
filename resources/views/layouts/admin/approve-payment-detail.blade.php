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
  <h3>Pembelian Detail</h3><br><br>
  <table class="table">
      <thead>
        <tr>
          <th>Field</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Nomor Order</td>
          <td>{{$pembelian_detail -> no_order}}</td>
        </tr>
        <tr>
          <td>Nama User</td>
          <td>{{$pembelian_detail -> nama}}</td>
        </tr>
        <tr>
          <td>Email User</td>
          <td>{{$pembelian_detail -> email}}</td>
        </tr>
        <tr>
          <td>Harga Total</td>
          <td>Rp. {{$pembelian_detail -> total_price}}</td>
        </tr>
        <tr>
          <td>Bukti Pembayaran</td>
          @if(empty($pembelian_detail -> bukti_pembayaran))
            <td>Belum Diupload</td>
          @else
            <td><a href={{ URL::asset($pembelian_detail->bukti_pembayaran) }}> Download</a></td>
          @endif
        </tr>
        <tr>
          <td>Waktu Order</td>
          <td>{{$pembelian_detail -> waktu_order}}</td>
        </tr>

      </tbody>
    </table>
    <div>
      <p>Status: <strong>{{$pembelian_detail -> status}} </strong></p>

      <p> Ubah Status:</p>
      <form class="form" method="post" action="" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


        <select name= "status_pembayaran">
          <option value=1>Belum Dibayar</option>
          <option value=2>Belum Disetujui</option>
          <option value=3>Disetujui</option>
          <option value=4>Jumlah Transfer Kurang</option>
          <option value=5>Pembayaran Invalid</option>
          <option value=6>Langganan Kadaluarsa</option>
        </select>
        <br><br>
        <p>
        <button type="submit" name="approve" class="btn btn-primary">Ubah Status</button>
        </p>
      </form>
    </div>
    <br><br><h3>Course yang dibeli</h3><br><br>
    <table class="table">
        <thead>
          <tr>
            <th>Nama Course</th>
            <th>Harga Course</th>
            <th>Pengajar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($courses_yang_dibeli as $course_yang_dibeli)
          <tr>
            <td>{{$course_yang_dibeli->nama_course}}</td>
            <td>Rp. {{$course_yang_dibeli->harga}}</td>
            <td> {{$course_yang_dibeli->nama}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

</div>

@endsection
