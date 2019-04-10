@extends('template')

@section('title')
<title>Transaksi Tutor Penarikkan Saldo - Pintaar</title>
@endsection

@section('extra-style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="section-padding">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-md-12">
        <br>
        <div class="col-xs-3 col-md-3">
          <br>
          <br>
          <br>
        </div>

        <br>
        <br>
        <br>
				<table id="table_id_list_penarikkan_saldo" class="display">
					<thead>
						<tr>
              <th>Email Tutor</th>
							<th>No Penarikkan Saldo</th>
							<th>Jumlah Penarikkan Saldo</th>
							<th>Status Penarikkan Saldo</th>
              <th>Ubah Status</th>
							<th>Dibuat Pada</th>
						</tr>
					</thead>
					<tbody>
						@foreach($all_tutor_saldo_transaction as $tutor_saldo_transaction)
						<tr>
              <td>{{$tutor_saldo_transaction ->tutor -> user ->email}}</td>
              <td>{{$tutor_saldo_transaction ->id}}</td>
							<td>{{$tutor_saldo_transaction ->withdraw_amount}}</td>
				      <td>{{$tutor_saldo_transaction ->get_withdraw_status -> withdraw_status}}</td>
              <td>
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
            </td>
							<td>{{$tutor_saldo_transaction ->created_at}}</td>
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
		$('#table_id_list_penarikkan_saldo').DataTable();
	} );
</script>
@endsection
