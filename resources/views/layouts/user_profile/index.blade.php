@extends('template')

@section('title')
  <title>Profile</title>
  <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
  <link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="gray-bg section-padding content" style="background-color: light-blue; word-wrap: break-word;"  >
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ $user->foto ? URL::asset($user->foto) : URL::asset('images/user4-128x128.jpg')}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                        <p class="text-muted text-center">Siswa {{ $user['murid']->asal_sekolah }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Jumlah Transaksi</b> <a class="pull-right">{{ count($user['transaksi'])}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tentang Saya</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

                        <p class="text-muted">
                            {{ $user['murid']->asal_sekolah !="" ? $user['murid']->asal_sekolah : "belum diatur" }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                        <p class="text-muted">
                            {{ $user->alamat !="" ? $user->alamat : "belum diatur" }}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Transaksi</a></li>
                        <!-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
                        <li><a href="#settings" data-toggle="tab">Ubah Informasi Diri</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h1 class="box-title">Daftar Transaksi</h1>
                                </div>

                                <div class="box-body table-responsive no-padding">

                                    <table id="table_employee" class="table display responsive no-wrap" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Course</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Status Pembayaran</th>
                                                <th scope="col">Bukti Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $user['transaksi'] as $key => $transaksi)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $transaksi ->  nama_course}}</td>
                                                <td>Rp. {{ $transaksi -> harga }}</td>
                                                <td>{{ $transaksi -> status_pembayaran}}</td>
                                                @if($transaksi->bukti_pembayaran != null)
                                                    <td><a href="{{ URL::asset($transaksi->bukti_pembayaran) }}">Lihat</a></td>
                                                @else
                                                    <td>Kosong</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <!-- UPDATE INFORMATION TAB -->
                        <div class="tab-pane" id="settings">
                            <div class="col-sm-10 col-sm-offset-2" style="margin-bottom:10px;">
                                <img id="preview" style="width:128px;height:128px;" src="{{ $user->foto ? URL::asset($user->foto) : URL::asset('images/user4-128x128.jpg')}}" alt="your image" />
                            </div>

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
                            <div class="form-group">
                                <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputAlamat" name="alamat" >{{ $user->alamat}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSekolah" class="col-sm-2 control-label">Asal Sekolah</label>

                                <div class="col-sm-10">
                                    <input type="text" name="asal_sekolah" class="form-control" id="inputSekolah" value="{{ $user['murid']->asal_sekolah}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="exampleFormControlFile1">Ubah Foto Profil</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                            </div>


                            <input type="hidden" name="id_user" value="{{ $user->id }}">
                            <input type="hidden" name="id_murid" value="{{ $user['murid']->id }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
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

<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>

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
