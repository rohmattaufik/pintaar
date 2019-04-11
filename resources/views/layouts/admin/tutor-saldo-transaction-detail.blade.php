@extends('template')

@section('title')
  <title>Approve Saldo Transaction</title>
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
                    <td>Nomor Penarikkan Saldo</td>
                    <td>{{$tutor_saldo_transaction -> id}}</td>
                  </tr>
                  <tr>
                    <td>Nama Tutor</td>
                    <td>{{$tutor_saldo_transaction -> tutor -> user ->nama}}</td>
                  </tr>
                  <tr>
                    <td>Email Tutor</td>
                    <td>{{$tutor_saldo_transaction -> tutor -> user ->email}}</td>
                  </tr>
                  <tr>
                  <td>Nama Bank Tutor</td>
                    <td>BCA</td>
                  </tr>
                  <tr>
                  <td>No Rekening Tutor</td>
                    <td>123123123</td>
                  </tr>
                  <tr>
                  <td>Nama Rekening Tutor</td>
                    <td>Toni Juga</td>
                  </tr>
                  <tr>
                    <td>Jumlah Penarikkan Saldo</td>
                    <td>Rp. {{$tutor_saldo_transaction -> withdraw_amount}}</td>
                  </tr>
                  <tr>
                    <td>Waktu Penarikkan Saldo</td>
                    <td>{{$tutor_saldo_transaction -> created_at}}</td>
                  </tr>

                </tbody>
              </table>

              <p>Status: <strong>{{$tutor_saldo_transaction->get_withdraw_status -> withdraw_status}} </strong></p>

              <p> Ubah Status:</p>
              <form class="form" method="post" action="" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <select name= "withdraw_status">
                  <option value=1>Sedang Direview</option>
                  <option value=2>Disetujui</option>
                  <option value=3>Telah Ditransfer</option>
                  <option value=4>Transaksi Invalid</option>
                </select>
                <br>
                <button type="submit" name="approve" class="btn btn-primary">Ubah Status</button>

              </form>

            </div>
          </div>
          <br><br>

    </div>
  </section>
@endsection
