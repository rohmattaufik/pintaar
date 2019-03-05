@extends('template')

@section('title')
  <title>Pintaar</title>
@endsection

@section('extra-style')

@endsection


@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
            	<h3>Total Penjualan Hari Ini : {{ $salesToday[0]->total_sales }}</h3>
              <h3>Total Penjualan Minggu Ini : {{ $salesThisWeek[0]->total_sales }}</h3>
              <h3>Total Penjualan Bulan Ini : {{ $salesThisMonth[0]->total_sales }}</h3>
            	<h3>Total Penjualan : {{ $sales[0]->total_sales }}</h3>
           	</div>
        </div>
    </div>
</section>
	
@endsection
  
@section('extra-script')
  
@endsection
