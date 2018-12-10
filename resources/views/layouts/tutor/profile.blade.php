@extends('template')

@section('title')
    <title>Tutor</title>
@endsection

@section('extra-style')
    <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
    <link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section-padding">
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ $user->foto ? URL::asset($user->foto) : URL::asset('images/user4-128x128.jpg')}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $user->nama }}</h3>
                        <p>Tutor {{ $tutor->mata_pelajaran }}</p>
                        <p>{{ $tutor->story }}</p>
                        <hr>
                        <strong><i class="fa fa-graduation-cap margin-r-5"></i>Pendidikan</strong>
                        <p>{{ $tutor->pendidikan }}</p>
                        <hr>
                        <strong><i class="fa fa-chalkboard-teacher margin-r-5"></i>Lama Mengajar</strong>
                        <p>{{ $tutor->lama_mengajar }}</p>
                        <hr>
                        <strong><i class="fa fa-video margin-r-5"></i>Video Profil</strong>
                        <br>
                        <br>
                        <div class="embed-responsive embed-responsive-16by9">
                          <video class="embed-responsive-item" src="{{URL::asset($tutor->video_profil)}}" controls allowfullscreen></video>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
@endsection

@section('extra-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        }
    }

    $("#exampleFormControlFile1").change(function() {
        readURL(this);
    });
</script>
@endsection