@extends('template')

@section('title')
  <title>Approve Payment</title>
@endsection

@section('extra-style')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')



 <section class="section-padding">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <a href="{{ route('approve-purchase-fb')}}" class="btn btn-primary">Setujui Pembelian dengan Share</a>
            <br><br>
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Order</th>
                        <th>Dipesan Pada</th>
                        <th>Email User</th>
                        <th>Nama User</th>
                        <th>Jumlah Tagihan</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($list_pembelian_course as $pembelian_course)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$pembelian_course->no_order}}</td>
                        <td>{{$pembelian_course->waktu_order}}</td>
                        <td>{{$pembelian_course->email}}</td>
                        <td>{{$pembelian_course->nama}}</td>
                        <td>Rp. {{$pembelian_course->total_price}}</td>
                        <td>{{$pembelian_course->status}}</td>
                                                  
                        <td> <a href ="{{route(('approve_payment_detail'), $pembelian_course -> id_pembelian)}}">Detail</a></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>



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
    $('#table_id').DataTable();
} );
</script>
@endsection