<body data-spy="scroll" data-target="#primary-menu">
    <!--Mainmenu-area-->

    <style type="text/css">
        .thumbnail img {
          max-width: 100%;
          height: auto;
        }

        .row.display-flex {
          display: flex;
          flex-wrap: wrap;
        }
        .thumbnail {
          height: 95%;
        }
        .thumbnail {
          display: flex;
          flex-direction: column;
        }

        .thumbnail .caption {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          height: 95%;
        }
        /*
        .thumbnail p, .thumbnail h4 {
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis;
        }*/
      </style>


    <div class="mainmenu-area" data-offset-top="100">
        <div class="container">
            <!--Logo-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('home') }}" class="navbar-brand logo">
                    <h2>Pintaar</h2>
                </a>
            </div>
            <!--Logo/-->
            <nav class="collapse navbar-collapse" id="primary-menu">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
					
					  <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Kategori Kelas <span class="caret"></span>
                                </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('courses-category', 1) }}">Kelas Pemrograman</a></li>
                                <li><a href="{{ route('courses-category', 2) }}">Kelas Bahasa</a></li>
								<li><a href="{{ route('courses-category', 3) }}">Kelas Bisnis</a></li>
								<li><a href="{{ route('courses-category', 4) }}">Kelas Lainnya</a></li>
							</ul>
                       </li>
					
					
					@if (Auth::guest())
                            
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('register') }}">Daftar</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>
                    @elseif (Auth::user()->id_role == 2)
                            <li><a href="{{ route('course-index')}}">Kelola Kelas</a></li>
                            <li><a href="{{ route('history_pembelian_course') }}">Laporan Pembelian</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                @inject('notifications', 'App\Services\NotificationService')
                                @if (count($notifications->getAllNotifications()) > 0)
                                    <a href="{{ route('notifications') }}">Notifikasi <strong style="color:red;">({{ count($notifications->getAllNotifications()) }})</strong></a>
                                @else
                                    <a href="{{ route('notifications') }}">Notifikasi</a>
                                @endif
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Pengajar <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <!-- <li><a href="{{ route('tutor-edit-profile') }}">Lihat Profil</a></li> -->
                                    <li><a href="{{ route('change-password') }}">Ubah Password</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                     @elseif (Auth::user()->id_role == 3)
                            <li><a href="{{ route('approve_payment')}}">Verifikasi</a></li>
                            <li><a href="{{ route('create-tutor')}}">Tambah Tutor</a></li>
                            <li><a href="{{ route('approve-purchase-fb')}}">Setujui Pembelian dengan Share</a></li>
                            <li><a href="{{ route('sales')}}">Penjualan</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('change-password') }}">Ubah Password</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    @else
                           
                            <li><a href="{{ route('kelas_saya') }}">Kelas Saya</a></li>
                            <li><a href="{{ route('cart') }}">Keranjang</a></li>
                            <li><a href="{{ route('course-order') }}">Transaksi</a></li>
                        </ul>


                        @inject('notifications', 'App\Services\NotificationService')

                        <ul class="nav navbar-nav navbar-right">
                            <li id="notification-dropdown" class="dropdown">
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
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Profil <span class="caret"></span>
                                </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('user-profil') }}">Lihat Profil</a></li>
                                <li><a href="{{ route('change-password') }}">Ubah Password</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <!--Mainmenu-area/-->
