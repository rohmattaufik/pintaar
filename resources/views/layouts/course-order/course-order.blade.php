@extends('template')

@section('title')
  <title>Pembelian</title>
@endsection

@section('extra-style')

@endsection

@section('content')
  <section class="section-padding">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
              @if (count($order) == 0) {
                <div><i class="fas fa-shopping-cart fa-5x"></i></div>
                <p>Belum ada kelas yang kamu beli!</p>
                <a href="{{ route('courses') }}" class="btn btn-lg btn-primary">Beli Kelas Disini</a>
              
              } 
              @else 
                <div class="table-responsive no-padding text-left">
                    <table id="table_employee" class="table display responsive no-wrap" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">No. Order</th>
                                
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Bukti Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key => $transaksi)
                            <tr>
                                <td>{{ $transaksi ->  no_order}}</td>
                                <td>Rp {{ number_format($transaksi -> total_price, 0, ',', '.') }}</td>
                                <td>{{ $transaksi -> status_pembayaran}}</td>
                                @if($transaksi->bukti_pembayaran != null)
                                    <td><a href="{{ URL::asset($transaksi->bukti_pembayaran) }}">Lihat</a></td>
                                @else
                                    <td>Kosong</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              @endif

          </div>
        </div>      
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
