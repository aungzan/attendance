<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/events.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Attendnance System</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">

    <!-- Vendors: select2 -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/select2/dist/css/select2.min.css') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">

    <!-- Javascript -->
    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Vendors -->
    <script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>

    <!-- Vendors: select2 -->
    <script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Vendors: Data tables -->
    <script src="{{ asset('vendors/bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/dropzone/dist/dropzone.js') }}"></script>

    <!-- App functions and actions -->
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</head>

<body data-sa-theme="3">
    <main class="main">

        <header class="header">
            <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
                <i class="zmdi zmdi-menu"></i>
            </div>

            <div class="logo hidden-sm-down">
                <h1><a href="{{ route('masters.index') }}">Attendance System</a></h1>
            </div>

            <form class="search col-md-3">
                <div class="search__inner">
                    <input type="text" class="search__text" placeholder="Search">
                    <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i>
                </div>
            </form>

            <ul class="top-nav">

                <li class="dropdown hidden-xs-down">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">View Profile</a>
                        <a class="dropdown-item" href="">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" id="logout">Logout</a>

                        <form method="POST" action="{{ route('logout') }}" id='admin'>
                            @csrf
                        </form>
                    </div>
                </li>

                <li class="hidden-xs-down">
                    <a href="" class="top-nav__themes" data-sa-action="aside-open" data-sa-target=".themes"><i class="zmdi zmdi-palette"></i></a>
                </li>
            </ul>

            <div class="clock hidden-md-down">
                <div class="time">
                    <span class="time__hours"></span>
                    <span class="time__min"></span>
                    <span class="time__sec"></span>
                </div>
            </div>
        </header>

        <aside class="sidebar">
            <div class="scrollbar-inner">

                <div class="user">
                    <div class="user__info" data-toggle="dropdown">
                        <img class="user__img" src=" " alt="">
                        <div>
                            <div class="user__name">Malinda Hollaway</div>
                            <div class="user__email">malinda-h@gmail.com</div>
                        </div>
                    </div>
                </div>

                <ul class="navigation">
                    <li class="navigation__active"><a href="{{ route('masters.index') }}"><i class="zmdi zmdi-account"></i>Masters</a></li>
                </ul>
                <ul class="navigation">
                    <li class="navigation__active"><a href="{{ route('companies.index') }}"><i class="zmdi zmdi-globe"></i>Companies</a></li>
                </ul>
            </div>
        </aside>

        <div class="themes">
            <div class="scrollbar-inner">
                <a href="" class="themes__item active" data-sa-value="1"><img src="{{ asset('img/bg/1.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="2"><img src="{{ asset('img/bg/2.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="3"><img src="{{ asset('img/bg/3.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="4"><img src="{{ asset('img/bg/4.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="5"><img src="{{ asset('img/bg/5.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="6"><img src="{{ asset('img/bg/6.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="7"><img src="{{ asset('img/bg/7.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="8"><img src="{{ asset('img/bg/8.jpg') }}" alt=""></a>
                <a href="" class="themes__item" data-sa-value="9"><img src="{{ asset('img/bg/9.jpg') }}" alt=""></a>
                <!-- <a href="" class="themes__item" data-sa-value="10"><img src="{{ asset('img/bg/10.jpg') }}" alt=""></a> -->
                <a href="" class="themes__item" data-sa-value="10"><img src="{{ asset('img/bg/11.jpg') }}" alt=""></a>

                <div class="theme-save-button text-center">
                    <a href="" class="btn btn-success" id="change-theme">Change Theme</a>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="content__inner">

                @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <p>{{ \Session::get('success') }}</p>
                </div>
                @elseif (\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <p>{{ \Session::get('error') }}</p>
                </div>
                @endif

                <header class="content__title">
                    <h1>{{ $header }}</h1>
                </header>

                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>