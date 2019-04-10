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
              <h3> Detail GMV : </h3>
            	<h3>Total GMV Hari Ini : {{ $salesToday[0]->total_sales }}</h3>
              <h3>Total GMV Minggu Ini : {{ $salesThisWeek[0]->total_sales }}</h3>
              <h3>Total GMV Bulan Ini : {{ $salesThisMonth[0]->total_sales }}</h3>
            	<h3>Total GMV : {{ $sales[0]->total_sales }}</h3>
              <br>
              <br>
              <h3> Detail Revenue:  </h3>
              <h3>Total Revenue Hari Ini : {{ $salesToday[0]->total_sales * 0.6 }}</h3>
              <h3>Total Revenue Minggu Ini : {{ $salesThisWeek[0]->total_sales * 0.6  }}</h3>
              <h3>Total Revenue Bulan Ini : {{ $salesThisMonth[0]->total_sales * 0.6  }}</h3>
              <h3>Total Revenue : {{ $sales[0]->total_sales * 0.6 }}</h3>
           	</div>
        </div>
    </div>
</section>

@endsection

@section('extra-script')

@endsection
