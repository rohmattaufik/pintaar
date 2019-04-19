@extends('template')

@section('title')
  <title>Approve Payment</title>
@endsection

@section('extra-style')

@endsection

@section('content')

 <section class="section-padding">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <h3>Detail Pembelian</h3>
            <table class="table">
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
                    <td>Channel Acquisition</td>
                    <td>{{$pembelian_detail -> channel_acquisition}}</td>
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

              <p>Status: <strong>{{$pembelian_detail -> status}} </strong></p>

              <p> Ubah Status:</p>
              <form class="form" method="post" action="" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <select name= "status_pembayaran">
                  <option value=3>Disetujui</option>
                  <option value=4>Jumlah Transfer Kurang</option>
                  <option value=5>Pembayaran Invalid</option>
                </select>
                <br>
                <button type="submit" name="approve" class="btn btn-primary">Ubah Status</button>

              </form>

            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col-xs-12 col-md-12">

              <h3>Kelas Yang Dibeli</h3>
              <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Kelas</th>
                      <th>Harga</th>
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
        </div>
    </div>
  </section>
@endsection
