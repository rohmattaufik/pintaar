@extends('index')

@section('title')

@endsection

@section('extra-css')

@endsection

@section('content')
	<script>
			function check_jawaban() {

				jawaban_user = document.querySelector('input[name="opsi"]:checked').value;
				var jawaban_benar = {!!  $topiks_and_question-> jawaban !!};

				if(jawaban_benar == jawaban_user ) {
					document.getElementById("salah").style.display = "none";
					document.getElementById("benar").style.display = "inline";
					document.getElementById("jawaban_salah").style.display = "none";
					document.getElementById("jawaban_benar").style.display = "inline";
				}
				else{
					document.getElementById("benar").style.display = "none";
					document.getElementById("salah").style.display = "inline";
					document.getElementById("jawaban_benar").style.display = "none";
					document.getElementById("jawaban_salah").style.display = "inline";
				}
			}
		</script>

	<div class="container-fluid">
            <div class="block-header">
                <h2>{{ $topiks_and_question->judul_topik }} </h2>
            </div>

            <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $topiks_and_question-> judul_pertanyaan }}
                            </h2>
                        </div>
                        <div class="body">
                            <p>
								{{ $topiks_and_question->pertanyaan }}

                            </p>
							<div class="demo-radio-button">
								<div>
									<input name="opsi" type="radio" id="radio_1" value=1 />
									<label for="radio_1">{{ $topiks_and_question->opsi_1 }}</label>
								</div>
								<div>
									<input name="opsi" type="radio" id="radio_2" value=2 />
									<label for="radio_2">{{ $topiks_and_question->opsi_2 }}</label>
								</div>
								<div>
									<input name="opsi" type="radio" id="radio_3" value=3 />
									<label for="radio_3">{{ $topiks_and_question->opsi_3 }}</label>
								</div>
								<div>
									<input name="opsi" type="radio" id="radio_4" value=4 />
									<label for="radio_4">{{ $topiks_and_question->opsi_4 }}</label>
								</div>
                            </div>
                        </div>
						<br>
					<div class="row">
						<div  class="col-md-6 col-md-offset-5	" >

									<i    id="salah" class="far fa-times-circle" style=" display:none; font-size:60px;color:red;" ></i>


							</div>
					</div>
					<div class="row">
						<div  class="col-md-6 col-md-offset-3" >
									<br>

									<p  id="jawaban_salah" style=" display:none;">Jawaban anda salah, silahkan cek pembahasan di bawah! </p>

							</div>
					</div>
					<div class="row">
						<div  class="col-md-6 col-md-offset-5" >

								<i   id="benar" class="far fa-check-circle" style="  display:none; font-size:60px;color:green;" ></i>

						</div>
					</div>

					<div class="row">
						<div  class="col-md-6 col-md-offset-5" >

								<br>
								<p  id="jawaban_benar" style=" display:none;" >Jawaban anda benar! </p>

						</div>
					</div>
						<div >

							<br>
							<br>
							<button onclick="check_jawaban()" type="button"  class="btn btn-primary btn-lg" style="display: block; margin-right: auto; margin-left: auto;">Submit</button>
						</div>
						<br><br>
                    </div>

                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Pembahasan
                            </h2>

                        </div>
                        <div class="body">

							<div class="embed-responsive embed-responsive-16by9">
							  <iframe class="embed-responsive-item" src= <?php echo asset('storage/media/'.$topiks_and_question->video.".mp4"); ?> allowfullscreen></iframe>
							</div>
							<br><br><br>
							<h2>{{ $topiks_and_question->judul_topik }}</h2>
                            <p class="m-t-10 m-b-30">{{ $topiks_and_question->penjelasan }}</p>

                        </div>
                    </div>
                </div>
            </div>
			<meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Komentar
                            </h2>
						  <br><br>


						  <form class="form" method="post" action="" role="form">
						  <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
							  <textarea required name="body_comment" class="form-control" rows="5" id="comment" style="background-color:#e8e8e8;" ></textarea>
							</div>

						  <br>
							<div>
								<button  value="comment" type="submit" name="comment" class="btn btn-primary btn-lg " style="display: block; margin-right: auto; margin-left: auto;">Beri Komentar</button>
							</div>
						  </form>
                       </div>



                        <div class="body">
                             @foreach($comments_and_user as $comment_and_user)
                                	<p>	{{$comment_and_user -> komentar }}
																	<p><strong>- Oleh {{ $comment_and_user -> nama }} Pada tanggal {{ $comment_and_user -> created_at }}</strong></p></p>
																	<hr>
							 								@endforeach




                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Blockquotes -->

        </div>


@endsection

@section('extra-script')

@endsection
