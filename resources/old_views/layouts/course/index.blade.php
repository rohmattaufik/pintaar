@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection

@section('content')
	<div class="container-fluid">
            <div class="block-header">
                <h1>List Video Pembelajaran</h1>
								<br>
            </div>
            <!-- Basic Card -->
            <div class="row clearfix">

							@foreach($list_courses_with_users as $list_course_with_user)

							                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style=" word-wrap: break-word;">
							                    <div class="card">
							                        <div class="header">
							                            <h2><a href="{{route(('course'), $list_course_with_user -> id)}}" >
							                                {{$list_course_with_user-> nama_course}}
							                            </a></h2>

							                        </div>
																			<div  class="body">
																					 <img src=<?php echo asset('storage/photos_course/afiq.jpeg'); ?> style="margin-left:30px; width:150px;height:150px;" class="img-fluid" alt="Responsive image">
																			</div>

							                        <div class="body">
																				<p>
							                            {{substr($list_course_with_user-> deskripsi,0, 100)."..."}}
																				</p>
																				<p> Oleh: <strong>  {{$list_course_with_user-> nama}} </strong><p>
																				<hr>
																				<p>Harga: {{$list_course_with_user-> harga}} <p>
																			</div>
																			<div>
																				<a a href="{{route(('course'), $list_course_with_user -> id)}}" >
																				<button class="btn btn-primary btn-lg " style="display: block; margin-right: auto; margin-left: auto;">Detail</button>
																				</a>
																						<br>
																			</div>

							                    </div>
							                </div>


							 @endforeach


            </div>
            <!-- #END# Basic Card -->

            <!-- #END# No Header Card -->
        </div>
@endsection

@section('extra-script')
	{{Html::script('bsbmd/js/pages/cards/basic.js')}}
    {{Html::script('bsbmd/js/pages/cards/colored.js')}}
@endsection
