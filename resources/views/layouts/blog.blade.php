<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />

    <!-- favicon icon -->

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
                    <a class="navbar-brand" href="{{ route('main.index') }}"><img src="/img/blog/logo.svg" height="30px"
                            alt=""></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav text-uppercase">
                        <li><a href="{{ route('main.index') }}">На главную</a></li>
                        <li><a href="{{ route('pages.about') }}" target="_blank">Обо мне</a></li>
                        <li><a href="#">Контакты</a></li>
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
            <h3 class="footer-instagram-title text-center text-uppercase">Instagram</h3>

            <div id="footer-instagram" class="owl-carousel">

                <div class="item">
                    <a href="#"><img src="/img/blog/ins-1.jpg" alt=""></a>
                </div>
                <div class="item">
                    <a href="#"><img src="/img/blog/ins-2.jpg" alt=""></a>
                </div>
                <div class="item">
                    <a href="#"><img src="/img/blog/ins-3.jpg" alt=""></a>
                </div>
                <div class="item">
                    <a href="#"><img src="/img/blog/ins-4.jpg" alt=""></a>
                </div>
                <div class="item">
                    <a href="#"><img src="/img/blog/ins-5.jpg" alt=""></a>
                </div>
                <div class="item">
                    <a href="#"><img src="/img/blog/ins-6.jpg" alt=""></a>
                </div>
                <div class="item">
                    <a href="#"><img src="/img/blog/ins-7.jpg" alt=""></a>
                </div>
                <div class="item">
                    <a href="#"><img src="/img/blog/ins-8.jpg" alt=""></a>
                </div>

            </div>
        </div>
    </div>

    <footer class="footer-widget-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <aside class="footer-widget">
                        <div class="about-img"><img src="/img/blog/footer-logo.png" alt=""></div>
                        <div class="about-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy
                            eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed voluptua. At vero eos et
                            accusam et justo duo dlores et ea rebum magna text ar koto din.
                        </div>
                        <div class="address">
                            <h4 class="text-uppercase">contact Info</h4>

                            <p> 142/5 BC Street, ES, VSA</p>

                            <p> Phone: +123 456 78900</p>

                            <p>rahim@marlindev.ru</p>
                        </div>
                    </aside>
                </div>

                <!-- Carousel -->
                <div class="col-md-4">
                    <aside class="footer-widget">
                        <h3 class="widget-title text-uppercase">Отзывы</h3>

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!--Indicator-->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="single-review">
                                        <div class="review-text">
                                            <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                                tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                                vero eos et accusam justo duo dolores et ea rebum.gubergren no sea
                                                takimata
                                                magna aliquyam eratma</p>
                                        </div>
                                        <div class="author-id">
                                            <img src="/img/blog/author.png" alt="">

                                            <div class="author-text">
                                                <h4>Sophia</h4>

                                                <h4>Client, Tech</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-review">
                                        <div class="review-text">
                                            <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                                tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                                vero eos et accusam justo duo dolores et ea rebum.gubergren no sea
                                                takimata
                                                magna aliquyam eratma</p>
                                        </div>
                                        <div class="author-id">
                                            <img src="/img/blog/author.png" alt="">

                                            <div class="author-text">
                                                <h4>Sophia</h4>

                                                <h4>Client, Tech</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-review">
                                        <div class="review-text">
                                            <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                                tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                                vero eos et accusam justo duo dolores et ea rebum.gubergren no sea
                                                takimata
                                                magna aliquyam eratma</p>
                                        </div>
                                        <div class="author-id">
                                            <img src="/img/blog/author.png" alt="">

                                            <div class="author-text">
                                                <h4>Sophia</h4>

                                                <h4>Client, Tech</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>
                <!-- /Carousel -->

                <!-- Custom Post -->
                @if (isset($randomPost))
                    <div class="col-md-4">
                        <aside class="footer-widget">
                            <h3 class="widget-title text-uppercase">Стоит прочесть</h3>

                            <div class="custom-post">
                                <div>
                                    <a href="{{ route('post.show', $randomPost->slug) }}">
                                        <img src="{{ $randomPost->getImage() }}" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('post.show', $randomPost->slug) }}" class="text-uppercase">
                                        {{ $randomPost->title }}
                                    </a>
                                    <span class="p-date">{{ PostHelper::getDate($randomPost) }}</span>
                                </div>
                            </div>
                        </aside>
                    </div>
                @endif
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
