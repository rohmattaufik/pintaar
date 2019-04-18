@extends('template')

@section('title')
  <title>Profil</title>
  <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
@endsection

@section('content')
<section class="section-padding">
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ $user->foto ? URL::asset($user->foto) : URL::asset('images/user-default.png')}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $user->nama }}</h3>
                        <p>Murid</p>
                        <p class="text-muted">
                            {{ $user->email !="" ? $user->email : "alamat email" }}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
               <!--  <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tentang Saya</h3>
                    </div>
                -->     <!-- /.box-header -->
                    <!-- <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>Pendidikan</strong>

                        <p class="text-muted">
                            {{ $user['murid']->asal_sekolah !="" ? $user['murid']->asal_sekolah : "-" }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                        <p class="text-muted">
                            {{ $user->alamat !="" ? $user->alamat : "-" }}
                        </p>
                    </div> -->
                    <!-- /.box-body -->
                <!-- </div> -->
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <div class="col-xs-12 col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <!-- <li><a href="#activity" data-toggle="tab">Transaksi</a></li> -->
                        <!-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
                        <li class="active"><a href="#settings" data-toggle="tab">Ubah Profil</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- UPDATE INFORMATION TAB -->
                        <div class="active tab-pane" id="settings">
                           
                            <form class="form-horizontal" method="post" action="{{ route('user-update') }}" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nama</label>

                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="inputName" value="{{ $user->nama }}" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="inputEmail" value="{{ $user->email }}" required="true">
                                </div>
                            </div>
                           <!--  <div class="form-group">
                                <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputAlamat" name="alamat" >{{ $user->alamat}}</textarea>
                                </div>
                            </div> -->
                           <!--  <div class="form-group">
                                <label for="inputSekolah" class="col-sm-2 control-label">Pendidikan Terakhir</label>

                                <div class="col-sm-10">
                                    <input type="text" name="asal_sekolah" class="form-control" id="inputSekolah" value="{{ $user['murid']->asal_sekolah}}">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="exampleFormControlFile1">Ubah Foto Profil</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                            </div>
                          <!--   <div class="col-sm-10 col-sm-offset-2" style="margin-bottom:10px;">
                                <img id="preview" style="width:128px;height:128px;" src=""/>
                            </div> -->


                            <input type="hidden" name="id_user" value="{{ $user->id }}">
                            <input type="hidden" name="id_murid" value="{{ $user['murid']->id }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
    <!-- /.col -->
<!-- /.content-wrapper -->
</section>

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
