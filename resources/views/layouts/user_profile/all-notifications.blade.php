@extends('template')

@section('title')
  <title>Pemesanan</title>
@endsection

@section('extra-style')

@endsection

@section('content')
  <section class="section-padding">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2">
            
            @if (count($notifications) == 0)
              <div class="text-center">
                <div><i class="fas fa-bell fa-5x"></i></div>
                <h4>Belum ada notifikasi terbaru!</h4>
                <br>
                <a href="{{ route('kelas_saya') }}" class="btn btn-lg btn-primary">Kembali Belajar</a>
              </div>
            @else
              <h1>Semua Notifikasi</h1>
              <div>
                <ul class="list-group">
                    @foreach($notifications as $notification)
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-md-9 col-xs-9">
                            <p>{{ $notification->description }}</p>
                            <form role="form" action="{{ route('visit-and-delete-notification') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                                <button type="submit" style="border: none; background: none; padding: 0; color:#138fc2;"><strong>Lihat</strong></button>
                            </form>
                          </div>
                          <div class="col-md-3 col-xs-3 text-right">
                            <p>{{ $notification->created_at->format('d-m-Y') }}</p>
                          </div>
                        </div>
                      </li>
                    @endforeach
                </ul>
              </div> 
            @endif


          </div>
        </div>      
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
