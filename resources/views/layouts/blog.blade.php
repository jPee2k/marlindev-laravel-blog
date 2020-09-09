<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />

    <!-- favicon icon -->
    <link rel="icon" type="image/svg" href="/favicon.svg">
    <link rel="icon" type="image/ico" sizes="16x16" href="/favicon.ico">
    <link rel="icon" type="image/ico" sizes="32x32" href="/favicon32.ico">
    <link rel="icon" type="image/ico" sizes="64x64" href="/favicon64.ico">

    <title>
        @yield('title')
    </title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/blog.css">
</head>

<body>

    <nav class="navbar main-menu navbar-default">
        <div class="container">
            <div class="menu-content">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('main.index') }}"><img src="/img/blog/logo.svg" height="30"
                            alt=""></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav text-uppercase">
                        <li><a href="{{ route('main.index') }}">На главную</a></li>
                        <li><a href="{{ route('pages.about') }}" target="_blank">Обо мне</a></li>
                        <!-- <li><a href="#">Контакты</a></li> -->
                    </ul>

                    <ul class="nav navbar-nav text-uppercase pull-right">
                        @if (Auth::check())
                            @if (Auth::user()->is_admin)
                                <li><a href="{{ route('dashboard.index') }}">Админка</a></li>
                            @endif
                            <li><a href="{{ route('user.edit') }}">Мой Профиль</a></li>
                            <li><a href="{{ route('user.logout') }}">Выход</a></li>
                        @else
                            <li><a href="{{ route('user.create') }}">Регистрация</a></li>
                            <li><a href="{{ route('user.login-page') }}">Вход</a></li>
                        @endif


                    </ul>

                </div>
                <!-- /.navbar-collapse -->


                <div class="show-search">
                    <form role="search" method="get" id="searchform" action="#">
                        <div>
                            <input type="text" placeholder="Search and hit enter..." name="s" id="s">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- ======================================================= -->
    <!--main content start-->
    <div class="container">
        @include('layouts.inc.status')
        @include('admin.errors')
    </div>

    @yield('content')
    <!-- end main content-->
    <!-- ======================================================= -->

    <!--footer start-->
    <div id="footer">
        <div class="footer-instagram-section">
            <h3 class="footer-instagram-title text-center text-uppercase">Facebook</h3>

            <div id="footer-instagram" class="owl-carousel">

                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3323518374432664/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-2.fna.fbcdn.net/v/t1.0-9/118764627_3323518391099329_8315191808940209231_n.jpg?_nc_cat=101&_nc_sid=8024bb&_nc_ohc=rbxSoTQ_aSoAX8i4wSG&_nc_ht=scontent.fiev22-2.fna&oh=ce9c8b9ff3bf044ff08a23b0bb6e0b5e&oe=5F7CC2B3" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3317661948351640/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-2.fna.fbcdn.net/v/t1.0-9/118413629_3317661955018306_8257887224121282882_n.jpg?_nc_cat=104&_nc_sid=da1649&_nc_ohc=HH3-27F41EsAX_Rw72P&_nc_ht=scontent.fiev22-2.fna&oh=c7f04a3d4a7c097d7659504dcdd1c600&oe=5F7C1C07" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3313745835409918/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-1.fna.fbcdn.net/v/t1.0-9/118462747_3313745848743250_2073271619132494706_n.jpg?_nc_cat=103&_nc_sid=8024bb&_nc_ohc=dLLVtTAEMVgAX85Xh3H&_nc_ht=scontent.fiev22-1.fna&oh=ac8a93817c73f259f457f010ddd5fb36&oe=5F7AA0F2" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3313745792076589/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-2.fna.fbcdn.net/v/t1.0-9/118385109_3313745798743255_4910596556405115291_n.jpg?_nc_cat=101&_nc_sid=8024bb&_nc_ohc=2nJSR4NO360AX8N94sl&_nc_ht=scontent.fiev22-2.fna&oh=383ef0dc3ff93f52098edb1ddc76ed18&oe=5F79CD17" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3306065409511294/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-2.fna.fbcdn.net/v/t1.0-9/118085447_3306065416177960_6075603015726812656_n.jpg?_nc_cat=104&_nc_sid=8024bb&_nc_ohc=cFN1tXwxCKgAX-OMKX4&_nc_ht=scontent.fiev22-2.fna&oh=4de1ddbf6844199168a6165223aef3de&oe=5F7A0AE7" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3298102170307618/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-2.fna.fbcdn.net/v/t1.0-9/118291319_3298102183640950_7351675380799751134_n.jpg?_nc_cat=102&_nc_sid=8024bb&_nc_ohc=tJN8cLlKi5AAX9sYwfe&_nc_ht=scontent.fiev22-2.fna&oh=86597942bf0a42a4637f2656fde38ec8&oe=5F7A49BF" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3277185582399277/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-1.fna.fbcdn.net/v/t1.0-9/118188090_3277185589065943_1449001586500935015_n.jpg?_nc_cat=108&_nc_sid=8024bb&_nc_ohc=XOQnuVHuFG4AX-AOduy&_nc_ht=scontent.fiev22-1.fna&oh=bdc02b7f4258366963ee281b6ddd8ea2&oe=5F7C2925" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/decor/photos/a.437212319729965/3283825398401962/?type=3&theater" target="_blank">
                        <img src="https://scontent.fiev22-2.fna.fbcdn.net/v/t1.0-9/s960x960/117844555_3283825405068628_543403666751202288_o.jpg?_nc_cat=104&_nc_sid=da1649&_nc_ohc=atjjtARBeHYAX_WQJWs&_nc_ht=scontent.fiev22-2.fna&tp=7&oh=8ccf1e3a0c220573e2285212cb931671&oe=5F7BEDA0" alt="">
                    </a>
                </div>

            </div>
        </div>
    </div>

    <footer class="footer-widget-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <aside class="footer-widget">
                        <div class="col-md-2">
                            <img class="blog-footer-img" src="/img/blog/logo.svg" width="160" alt="">
                        </div>
                        <div class="col-md-10">
                            <div class="about-content">
                                Блог создан исключительно в учебных целях, наверное,
                                сейчас (сентябрь 2020) это лучшее что я склепал на Laravel, но я
                                не остановлюсь! Каждый день поглощаю кучу знаний, и это
                                выльется во что-то знатное=)
                            </div>
                        </div>
                    </aside>

                </div>

                <!-- Carousel -->
                <!-- include('layouts.inc.footer.carousel') -->
                <!-- /Carousel -->

                <!-- Custom Post -->
                <!-- include('layouts.inc.footer.custom-post') -->
                <!-- /Custom Post -->

            </div>
        </div>
        <div class="footer-copy">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            &copy; 2020 <a href="{{ route('main.index') }}">Blog,</a>
                            Designed with <i class="fa fa-heart"></i> by <a href="{{ route('pages.about') }}"
                                target="blank_">jPee</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- js files -->
    <script src="{{ asset('js/blog.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
