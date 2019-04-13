@extends('template')

@section('title')
    <title>Pengajar</title>
@endsection

@section('extra-style')

@endsection

@section('content')
<section class="section-padding">
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <h3>Pengajar</h3>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <p>Foto Profil</p>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <img class="profile-user-img img-responsive img-circle" src="{{ $user->foto ? URL::asset($user->foto) : URL::asset('images/user-default.png')}}" alt="User profile picture">
                
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <p>Nama</p>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <p>{{ $user->nama }}</p>
                    </div>
                </div>
                <h4>Informasi Rekening Bank</h4>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <p>Nama Bank</p>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <p>{{ $tutor->nama_bank }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <p>Nomor Rekening</p>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <p>{{ $tutor->no_rekening }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <p>Nama Pemegang Rekening</p>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <p>{{ $tutor->nama_rekening }}</p>
                    </div>
                </div>
                
                <a href="{{ route('edit-tutor')}}" class="btn btn-primary">Ubah Informasi Pengajar</a>  
                <a href="{{ route('tutor-dashboard')}}" class="btn btn-danger">Kembali</a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
@endsection

@section('extra-script')

@endsection