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
            	<h1>Total Penjualan Hari Ini : {{ $salesToday[0]->total_sales }}</h1>
            	<h1>Total Penjualan : {{ $sales[0]->total_sales }}</h1>
           	</div>
        </div>
    </div>
</section>
	
@endsection
  
@section('extra-script')
  
@endsection
