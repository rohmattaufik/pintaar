@extends('template')

@section('title')
    <title>Tutor | Edit</title>
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
                <form action="{{ route('tutor-update', $tutor->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img id="preview" class="profile-user-img img-responsive img-circle " src="{{ $user->foto ? URL::asset($user->foto) : URL::asset('images/user4-128x128.jpg')}}" alt="User profile picture"><br>
                            <div class="form-group">
                                <label for="foto" class="col-sm-2 control-label">Foto Profile</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="file" id="exampleFormControlFile1" name="foto" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mapel" class="col-sm-2 control-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" name="mata_pelajaran" class="form-control" value="{{ $tutor->mata_pelajaran }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="story" class="col-sm-2 control-label">Story</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" name="story" class="form-control" value="{{ $tutor->story }}" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="story" class="col-sm-2 control-label">Pendidikan</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" name="pendidikan" class="form-control" value="{{ $tutor->pendidikan }}" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="story" class="col-sm-2 control-label">Lama Mengajar</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" name="lama_mengajar" class="form-control" value="{{ $tutor->lama_mengajar }}" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="story" class="col-sm-2 control-label">Video Profile</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="file" name="video_profil" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="submit" class="btn btn-success" value="SUBMIT">
                                    </div>
                                </div>
                            </div>
                            
                        
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </form>
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