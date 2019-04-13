<style type="text/css">

    @media only screen and (min-width : 481px) {
        .row.display-flex {
            display: flex;
            flex-wrap: wrap;
        }

        .row.display-flex > [class*='col-'] > a > .thumbnail {
            height: 95%;
            display: flex;
            flex-direction: column;
        }

        .row.display-flex > [class*='col-'] > a > .thumbnail .caption {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          height: 95%;
        }

        .row.display-flex > [class*='col-'] > a > .thumbnail > img {
            width: 100%;
            height: 145px; /* force image's height */

            /* force image fit inside it's "box" */
            -webkit-object-fit: cover;
               -moz-object-fit: cover;
                -ms-object-fit: cover;
                 -o-object-fit: cover;
                    object-fit: cover;
        }
    }

    @media only screen and (max-width : 480px) {
        .row.display-flex > [class*='col-'] > a > .thumbnail > img {
            width: 100%;
            height: 200px; /* force image's height */

            /* force image fit inside it's "box" */
            -webkit-object-fit: cover;
               -moz-object-fit: cover;
                -ms-object-fit: cover;
                 -o-object-fit: cover;
                    object-fit: cover;
        }

        .dropdown-menu > li > a {
            color: white;
            text-align: center;
        }

        #submenu-separator {
            border-bottom: 2px solid white;
        }
    }


</style>

<body data-spy="scroll" data-target="#primary-menu">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kategori Kelas <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('courses-category', 1) }}">Kelas Pemrograman</a></li>
                            <li><a href="{{ route('courses-category', 2) }}">Kelas Bahasa</a></li>
							<li><a href="{{ route('courses-category', 3) }}">Kelas Bisnis</a></li>
							<li><a href="{{ route('courses-category', 4) }}">Kelas Lainnya</a></li>
                            <li id="submenu-separator"></li>
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
                        <li><a href="{{ route('tutor-dashboard')}}">Dashboard</a></li>


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
                            <li><a href="{{ route('approve_payment')}}">Verifikasi Pembelian</a></li>
                            <li><a href="{{ route('show-tutor-saldo-transaction')}}">Verifikasi Saldo Tutor</a></li>
                            <li><a href="{{ route('sales')}}">Penjualan</a></li>
                            <li><a href="{{ route('create-tutor')}}">Tambah Tutor</a></li>
                            
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
							<li><a href="{{ route('referral') }}">Dapatkan Kelas Gratis!</a></li>
                        </ul>


                        @inject('notifications', 'App\Services\NotificationService')

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                 @if (count($notifications->getAllNotifications()) > 0)
                                    <a href="{{ route('notifications') }}">Notifikasi <strong style="color:red;">({{ count($notifications->getAllNotifications()) }})</strong></a>
                                @else
                                    <a href="{{ route('notifications') }}">Notifikasi</a>
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
