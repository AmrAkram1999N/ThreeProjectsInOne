<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>{{ $lang['Titles']['cardView'] }}</title>
    <script src="https://kit.fontawesome.com/2c685a62ec.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Table Style-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


</head>

<body style="background: rgb(26, 25, 25);">

    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="{{ route('home') }}">BT<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a target="_blank" class="nav-link scrollto active" href="{{ route('home') }}">Home</a></li>
                    @if (Auth::check())
                        <li><a target="_blank" class="nav-link scrollto" href="#about">Dashboard</a></li>
                    @endif
                    <li><a target="_blank" class="nav-link scrollto" href="{{ route('home') }}#services">Services</a></li>
                    <li><a target="_blank" class="nav-link scrollto " href="{{ $linepage }}">Portfolio</a></li>
                    <li><a target="_blank" class="nav-link scrollto" href="#team">Team</a></li>
                    <li class="dropdown"><a href="#"><span>Contact Me</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>My Phone Number</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li>
                                        <a target="_blank"
                                            href="https://api.whatsapp.com/send/?phone=972599916672&text&app_absent=0"
                                            style=" color: green;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                            </svg>+97059916672
                                        </a>
                                    </li>

                                    <li>
                                        <a target="_blank" href="https://t.me/AmrAkram1999">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                style=" color: cornflowerblue;" fill="currentColor"
                                                class="bi bi-telegram " viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                            </svg> @AmrAkram1999
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"><span>My Social Media Accounts</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li>
                                        <a target="_blank"
                                            href="https://twitter.com/AmrAkram1999?t=nxuqTcCToBdGt5KX4LKwzg&s=09">
                                            <svg xmlns="http://www.w3.org/2000/svg" style=" color: cornflowerblue;"
                                                width="16" height="16" fill="currentColor" class="bi bi-twitter"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                            </svg>
                                            @AmrAkram1999
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://www.facebook.com/amro.akram.7">

                                            <svg xmlns="http://www.w3.org/2000/svg" style=" color: cornflowerblue;"
                                                width="16" height="16" fill="currentColor" class="bi bi-facebook"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                            </svg>
                                            Facebook
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>En</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('langChoice', 'ar') }}">Arabic</a></li>
                            <li><a href="{{ route('langChoice','en') }}">English</a></li>
                        </ul>
                    </li>

                    {{-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
                    @if (Auth::check())
                    <li><li>
                        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                          <button type="submit" class="get-started-btn scrollto bg-danger ms-3">Sing Out</button>
                      </form></li> @else
                        <li class="dropdown"><a href="#"><span>Register or Login</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a target="_blank" href="{{ route('register') }}">Register</a></li>
                                <li class="dropdown"><a href="#"><span>Login</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a target="_blank" href="{{ url('Chain/User/login') }}">Login as a
                                                user</a></li>
                                        <li><a target="_blank" href="{{ url('Chain/Account/login') }}">Login as an
                                                account</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a target="_blank" href="https://t.me/WebsiteServicesBot" class="get-started-btn scrollto">Join with
                Telegram Service</a>

        </div>
    </header><!-- End Header -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
        <div class="container">
            <a class="navbar-brand" href="#">{{ $lang['Navbar']['title']  }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07"
                aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <x-Idea
                            lang="{{ $lang['Navbar']['Idea'] }}"
                            headerThree="{{ $lang['Components']['idea']['h3'] }}"
                            headerFive="{{ $lang['Components']['idea']['h5'] }}"
                            paragraph="{{ $lang['Components']['idea']['p'] }}"></x-Idea>
                    </li>
                    <li class="nav-item">
                        <x-NoteOne
                                lang="{{ $lang['Navbar']['N2'] }}"
                                headerThree="{{ $lang['Components']['N1']['h3'] }}"
                                headerFive="{{ $lang['Components']['N1']['h5'] }}"
                                paragraphOne="{{ $lang['Components']['N1']['p1'] }}"
                                paragraphTwo="{{ $lang['Components']['N1']['p2'] }}"
                                link="{{ $lang['Components']['N1']['a'] }}"
                                liOne="{{ $lang['Components']['N1']['ol']['1'] }}"
                                liTwo="{{ $lang['Components']['N1']['ol']['2'] }}"
                                liThree="{{ $lang['Components']['N1']['ol']['3'] }}"
                                liFour="{{ $lang['Components']['N1']['ol']['4'] }}"
                                ></x-NoteOne>
                    </li>

                    <li class="nav-item">
                        <x-NoteTwo
                            lang="{{ $lang['Navbar']['N3'] }}"
                            headerThree="{{ $lang['Components']['N2']['h3'] }}"
                            headerFive="{{ $lang['Components']['N2']['h5'] }}"
                            paragraphOne="{{ $lang['Components']['N2']['p1'] }}"
                            paragraphTwo="{{ $lang['Components']['N2']['p2'] }}"
                            link="{{ $lang['Components']['N2']['a'] }}"
                            ></x-NoteTwo>
                    </li>
                    <li class="nav-item">
                        <x-NoteThree
                            lang="{{ $lang['Navbar']['N4'] }}"
                            headerThree="{{ $lang['Components']['N3']['h']['h3']['1'] }}"
                            headerFiveOne="{{ $lang['Components']['N3']['h']['h5']['1'] }}"
                            headerFiveTwo="{{ $lang['Components']['N3']['h']['h5']['2'] }}"
                            headerFiveThree="{{ $lang['Components']['N3']['h']['h5']['3'] }}"
                            paragraphOne="{{ $lang['Components']['N3']['p']['1'] }}"
                            paragraphTwo="{{ $lang['Components']['N3']['p']['2'] }}"
                            link="{{ $lang['Components']['N3']['a'] }}"
                            olOnefOne="{{ $lang['Components']['N3']['ol1']['f']['1'] }}"
                            olOnefTwo="{{ $lang['Components']['N3']['ol1']['f']['2'] }}"

                            olOnepOne="{{ $lang['Components']['N3']['ol1']['p']['1'] }}"
                            olOnepTwo="{{ $lang['Components']['N3']['ol1']['p']['2'] }}"

                            olTwofOne="{{ $lang['Components']['N3']['ol2']['f']['1'] }}"
                            olTwofTwo="{{ $lang['Components']['N3']['ol2']['f']['2'] }}"

                            olTwopOne="{{ $lang['Components']['N3']['ol2']['p']['1'] }}"
                            olTwopTwo="{{ $lang['Components']['N3']['ol2']['p']['2'] }}"
                            ></x-NoteThree>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownXxl" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ $lang['Navbar']['lang']['title'] }}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownXxl">
                            <li><a class="dropdown-item" href="{{ route('langChoice', 'ar') }}">{{ $lang['Navbar']['lang']['one'] }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('langChoice', 'en') }}">{{ $lang['Navbar']['lang']['two'] }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}









    {{-- <div class="card" style="width: 22rem; margin:0 auto; margin-top: 150px;">

        <div class="card-header text-success text-center">
            <h3>{{ $lang['Titles']['h3'] }}</h3>
        </div>
    </div> --}}

            <section id="hero" class="d-flex align-items-center justify-content-center">
                <div class="container" data-aos="fade-up">
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                        @if (Session::has('number'))
                        <div class="alert alert-warning text-black">
                            {{ Session::get('number') }}
                        </div>
                    @endif

                    @if (Session::has('time'))
                        <div class="alert alert-warning text-black">
                            {{ $lang['p']['prefix'] . ' ' }} {{ session()->pull('time', 0) }} {{ ' ' . $lang['p']['suffix'] }}
                        </div>
                    @endif
                        <div class="col-xl-6 col-lg-8">
                            <h1>Powerful Digital Solutions With BT<span>.</span></h1>
                            <h2>Bank Card Service</h2>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch"
                            style=" margin:0 auto; margin-top: 150px;" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box w-100" style="padding-top: 20px;  padding-bottom: 20px; ">
                                <div class="icon"><i class="bx bx-arch"></i></div>
                                <h4><a
                                        href="#">{{ $lang['Titles']['h4'] }}</a>
                                </h4>
                                <form action="{{ route('getNumber') }}" method="POST">
                                    @csrf
                                    <p class="card-text fs-4 mb-3 font-weight-bold text-white">
                                        {{ $number }}
                                    </p>
                                    <button class="get-started-btn scrollto bg-dark mb-3"
                                        type="submit">{{ $lang['Titles']['button'] }}</button>
                                    <br>
                                    <button class="btn btn-theme float-left bg-dark text-white" type="submit"
                                        formaction="{{ route('previousNumber', $number) }}">
                                        < </button>
                                            <button class="btn btn-theme bg-dark text-white " type="button">+ </button>
                                            <button class="btn btn-theme float-right bg-dark text-white" type="submit"
                                                formaction="{{ route('nextNumber', $number) }}"> >
                                            </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
