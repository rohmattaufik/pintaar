@extends('template')

@section('title')
<title>Transaksi Penarikkan Saldo - Pintaar</title>
@endsection

@section('extra-style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="section-padding">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h3>Total Saldo: Rp {{  number_format($tutor->getTutorSaldo(), 0, ',', '.')   }}</h3>
				
				
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<p>Masukkan jumlah saldo yang ingin ditarik (Maks. 10 juta)</p>
						<form role="form" method="POST" action="{{ route('create-transaction') }}">
							{{ csrf_field() }}

							<input type="number" class="form-control" name="withdaw_amount" id="withdaw_amount" value="">
							<button type="submit" class="btn btn-primary">Tarik Saldo</button>
						</form>
					</div>
				</div>



				<br>
				<br>
				<h3>Riwayat Penarikan Saldo</h3>
				<table id="table_id_list_penarikkan_saldo" class="display">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jumlah Penarikan Saldo</th>
							<th>Status</th>
							<th>Dibuat Pada</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_tutor_saldo_transaction as $tutor_saldo_transaction)
						<tr>
							<td>{{$tutor_saldo_transaction ->id}}</td>
							<td>Rp {{$tutor_saldo_transaction ->withdraw_amount}}</td>
							<td>{{$tutor_saldo_transaction ->get_withdraw_status -> withdraw_status}}</td>
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
