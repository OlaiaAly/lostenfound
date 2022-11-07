<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Title-->
    <title>@yield('title')</title>

    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="/css/pogo-slider.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    @if(!isset($search))
    <!-- <div id="preloader">
        <div class="loader">
            <img src="/img/templat/loader.gif" alt="#" />
        </div>
    </div> -->
    @endif

    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand bg-light" href="/"><img src="/img/logo.png" alt="LOSTENFOUND"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
                    aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="/">Home</a></li>

                        @auth

                        <li class="nav-item">
                            <a class="nav-link" href="/publication">PUBLICAÇÕES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/publication/create">Fazer Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/AboutUs">Sobre nós</a>
                        </li>

                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                            </form>
                        </li>

                        @endauth

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/register" style="background:#fff;color:#000;">Registar</a>
                        </li>
                        @endguest

                    </ul>
                </div>
                <!-- <div class="search-box">
                    <input type="text" class="search-txt" placeholder="Search">
                    <a class="search-btn">
                        <img src="images/search_icon.png" alt="#" />
                    </a>
                </div> -->
            </div>
        </nav>
    </header>
    <!-- End header -->




    @if(session('msg'))
    <div class="container-fluid">
        <p class="msg alert alert-info">{{session('msg')}}</p>
    </div>
    @endif

    <!-- CONTEUDO PRINCIPAL DA PAGINA -->
    @yield('content')


    <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo">
                        <a href="index.html"><img class="bg-light" src="/img/logo.png" alt="#" /></a>
                    </div>
                </div>
                <div class="col-lg-12 white_fonts">
                    <h4 class="text-align">Contact Us</h4>
                </div>
                <div class="margin-top_30 col-md-8 offset-md-2 white_fonts">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="/img/templat/social1.png">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>Beira
                                    <br>Mozambique
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="/img/templat/social2.png">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>lostenfound@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="/img/templat/social3.png">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>+258 875180066
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row white_fonts margin-top_30">
                <div class="col-lg-12">
                    <div class="full">
                        <div class="center">
                            <ul class="social_icon">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© 2022 Lostenfound resume . All Rights Reserved.</p>
                    <ul class="bottom_menu">
                        <li><a href="/AboutUs">About Us</a></li>
                        <li><a href="/user/contact">Contact us</a></li>
                        <li><a href="/#TnC">Terms of Service</a></li>
                        <li><a href="/#TnC">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>



    <!-- ALL JS FILES -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/jquery.pogo-slider.min.js"></script>
    <script src="/js/slider-index.js"></script>
    <script src="/js/smoothscroll.js"></script>
    <script src="/js/form-validator.min.js"></script>
    <script src="/js/contact-form-script.js"></script>
    <script src="/js/isotope.min.js"></script>
    <script src="/js/images-loded.min.js"></script>
    <script src="/js/custom.js"></script>


</body>

</html>