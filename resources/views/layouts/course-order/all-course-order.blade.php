@extends('template')

@section('title')
  <title>Transaksi</title>
@endsection

@section('extra-style')

@endsection

@section('content')
  <section class="section-padding">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
              @if (count($order) == 0)
                <div><i class="fas fa-shopping-cart fa-5x"></i></div>
                <p>Belum ada kelas yang kamu beli!</p>
                <a href="{{ route('courses-category', 1) }}" class="btn btn-lg btn-primary">Beli Kelas Disini</a>
              
              @else 
                <h2>Daftar Transaksi</h2>
                <div class="table-responsive no-padding text-left">
                    <table id="table_pembayaran" class="table display responsive no-wrap" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Transaksi</th>
                                <!-- <th scope="col">Tanggal Pemesanan</th> -->
                                <th scope="col">Status</th>
                                <!-- <th scope="col">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key => $transaksi)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                  <a href="{{ route('review-order', $transaksi -> no_order) }}"><h4>{{ $transaksi -> no_order }}</h4></a>
                                  <p>{{ $transaksi->created_at }}</p>
                                  
                                  @if ($transaksi->status_pembayaran == 1)   
                                    <a href="{{ route('payment-proof', $transaksi -> no_order) }}" class="btn btn-sm btn-primary">Upload Bukti Bayar</a>
                                  @endif
                                  
                                  <a href="{{ route('review-order', $transaksi -> no_order) }}" class="btn btn-sm btn-primary">Lihat</a>

                                </td>
                                <!-- <td>{{ $transaksi -> created_at }}</td> -->
                          
                                <td>{{ $transaksi -> status_pembayaran_info }}</td>
                                
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
