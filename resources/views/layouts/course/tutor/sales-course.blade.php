@extends('template')

@section('title')
  <title>Penjualan Kelas - Pintaar</title>
@endsection

@section('extra-style')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="section-padding">
    <div class="container">
            
            <div class="row">
              <div class="col-xs-12 col-md-12">
                  <h3>Penjualan Kelas {{ $course->nama_course }}</h3>
                  <h4>Total Pendapatan di Kelas Ini : Rp {{ number_format($totalRevenue[0]->course_price, 0, ',', '.') }}</h4>
                  <table id="table_id_detail_penjualan" class="display">
                      <thead>
                          <tr>
                              <th>No.</th>
                              <th>Email Pembeli</th>
                              <th>Harga Kelas</th>
                              <th>Dibeli Pada</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                          <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $order->email_buyer }}</td>
                              <td>Rp {{ number_format($order->course_price, 0, ',', '.') }}</td>
                              <td>{{ $order->order_time }}</td>
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
      $('#table_id_detail_penjualan').DataTable();
  } );
</script>
@endsection