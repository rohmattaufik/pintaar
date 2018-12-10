@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection

@section('content')
	<div class="container-fluid" style=" word-wrap: break-word;" >
            <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              	{{$course->nama_course }}
                            </h2>

                        </div>
												<div>
													<div class="embed-responsive embed-responsive-16by9">
													  <iframe class="embed-responsive-item" src= "youtube.com" ?> allowfullscreen></iframe>
													</div>
												</div>
                        <div class="body">
														<p>	{{$course->deskripsi }}  <p>
															<br>
															<p> Oleh: <strong>  {{$course-> nama}} </strong><p>

																<br>
															<p>Harga: Rp. {{$course-> harga}} <p>
																<br>
																<a a href="google.com" >
																<button class="btn btn-primary btn-lg " style="display: block; margin-right: auto; margin-left: auto;">Beli!</button>
																</a>

																<br>
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Body Copy -->
            <!-- Headings -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Kamu akan Belajar:
                            </h2>

                        </div>
                        <div class="body">
													@foreach($list_topik as $topik)

															<h2><a href = "{{route(('topik'), $topik->id)}}">{{$topik -> judul_topik }}</a></h2>
															<p class="m-t-10 m-b-30">{{$topik -> penjelasan }}</p>

												 	@endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Headings -->

        </div>
@endsection

@section('extra-script')

@endsection
