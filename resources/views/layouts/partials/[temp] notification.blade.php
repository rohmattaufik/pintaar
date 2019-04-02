@if (count($notifications->getAllNotifications()) == 0)
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifikasi</a>
<ul class="dropdown-menu notify-drop">
    <div class="drop-content">
        <li>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <div><i class="fas fa-bell fa-2x"></i></div>
                <p>Belum ada notifikasi!</p>
            </div>
        </li>
    </div>
</ul>
@else
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifikasi <strong style='color: red;'> ({{ count($notifications->getAllNotifications()) }})</strong></a>
<ul class="dropdown-menu notify-drop">
    <div class="drop-content">
            @foreach($notifications->getAllNotifications() as $notification)
            <li>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <small style="color:#138fc2">{{ $notification->created_at->format('d-m-Y') }}</small>
                    <p>{{ $notification->description }}</p>
                    
                    <form role="form" action="{{ route('visit-and-delete-notification') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                        <button type="submit" style="border: none; background: none; padding: 0; color:#138fc2;"><strong>Lihat</strong></button>
                    </form>
                </div>
            </li>
            @endforeach
        
    </div>
    <div class="notify-drop-footer text-center">
        <a href="{{ route('notifications') }}" style="color:#138fc2"><i class="fa fa-eye"></i> <strong>Lihat semua notifikasi</strong></a>
    </div>
</ul>
@endif