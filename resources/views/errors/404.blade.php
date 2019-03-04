@extends('template')

@section('title')
    <title>Error</title>
@endsection

@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>ERROR 404</h2>
                        <p>Halaman yang kamu cari tidak ditemukan!</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Kembali Ke Halaman Utama</a>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


@endsection
