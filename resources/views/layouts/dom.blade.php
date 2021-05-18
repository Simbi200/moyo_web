<html lang="en" style="font-size: 0.8rem !important">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageName')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/sweetalert.js"></script>


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- line-awesome -->
    <link rel="stylesheet" href="/css/lineawesome/css/line-awesome.min.css">
    @yield('css')
    {{-- @yield('react') --}}

    <style>
        .flink-unstyled:link,
        .flink-unstyled:visited,
        .flink-unstyled:hover,
        .flink-unstyled:active {
            color: white;
        }

    </style>


</head>

<body>
    <div>
        <!-- Navbar -->

        <nav class="navbar navbar-light bg-light navbar-expand-sm sticky-top">
            <a class="navbar-brand" href="/">
                <img src="/images/moyoLogo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Moyo Academy
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/staff"><i class="las la-user-tie la-lg pr-2"></i>Staff</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="about"><i class="las la-info pr-2 la-lg"></i>About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><i class="las la-envelope pr-2 la-lg"></i>Contact Us</a>
                    </li>
                    <li class="nav-item">
                        @guest
                        @else
                            <a class="nav-link" href="/parent_results"><i
                                    class="las la-door-open pr-2 la-lg"></i>Portal</a>
                        @endguest
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Login
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/admin_content">
                                        Admin
                                    </a>
                                    <a class="dropdown-item" href="/teacher_results">
                                        Teacher
                                    </a>
                                    <a class="dropdown-item" href="/parent_results">
                                        Parent
                                    </a>
                                </div>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="las la-user-shield pr-2"></i>{{ Auth::user()->f_name }}
                                {{ Auth::user()->l_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- end of navbar-->



        <!-- content-->

        @yield('jumb')
        <div id="app" class="container mb-4">
            @yield('content')





        </div>
        <!--end of content-->

        <!--Footer-->
        <footer class="page-footer bg-dark pt-2">
            <div class="container text-center text-white text-md-left mt-3">
                <div class="row">
                    <div class="col-6 col-md-3 mx-auto mb-2">
                        <h6 class="text-uppercase font-weight-bold">Moyo Academy</h6>
                        <hr class="bg-success mb-2 mt-0 d-inline-block mx-auto" style="width: 105px; height: 2px">
                        <p class="mt-2">Education is Power</p>

                    </div>

                    <div class="col-6 col-md-2 mx-auto mb-2">
                        <h6 class="text-uppercase font-weight-bold">quick links</h6>
                        <hr class="bg-success mb-2 mt-0 d-inline-block mx-auto" style="width: 100px; height: 2px">
                        <ul class="list-unstyled">
                            <li class="my-1"><a class="flink-unstyled" href="#">About Us</a> </li>
                            <li class="my-1">Parents</li>
                            <li class="my-1">Contact Us</li>
                        </ul>
                    </div>


                    <div class="col-6 col-md-3 mx-auto mb-2">
                        <h6 class="text-uppercase font-weight-bold">Contacts</h6>
                        <hr class="bg-success mb-2 mt-0 d-inline-block mx-auto" style="width: 90px; height: 2px">
                        <ul class="list-unstyled">
                            <li class="my-1"><a class="flink-unstyled" href="/contact#map"><i
                                        class="las la-map-marker-alt pr-2"></i>Sani, Nkhotakota</a></li>
                            <li class="my-1"><i class="las la-envelope pr-2"></i>moyoacademy@gmail.com</li>
                            <li class="my-1"><i class="las la-phone pr-2"></i>+265 (0) 997 18 18 66</li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="footer-copyright text-center py-1 text-white border-top border-success">
                <p>&copy; Copyright <a href="#">moyoacademy.org</a> <span class="px-5">
                        {{-- <i class="las la-code pr-2"></i>Designed by <span class="text-success">Lewis Simbi</span></span> --}}
                </p>

            </div>


        </footer>

        <!--end of footer-->


    </div>

</body>
<script src="{{ mix('js/app.js') }}"></script>


</html>
