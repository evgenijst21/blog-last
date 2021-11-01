@section('head')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Rubik:wght@300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/admin-style/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin-style/css/main.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ $title ?? env('APP_NAME') }}</title>
    </head>
@show


@section('header')

    <body>
        <div class="wrapper">
            <header class="header">

                <div class="main-logo">
                    <a href="#"><img class="logo" src="{{ asset('assets/admin-style/img/logo.svg') }}"
                            alt="logo"></a>
                </div>
                <div class="menu-items">
                    <nav class="menu-nav">
                        <ul class="menu-navbar">
                            <li class="menu-li"><a href="/" class="items-link">На сайт</a></li>
                            <li class="menu-li"><a href="{{ route('admin.feedback.index') }}"
                                    class="items-link">Заявки</a></li>
                            @can('view-protected')
                                <li class="menu-li"><a href="{{ route('admin.category.index') }}"
                                        class="items-link">Категории</a></li>
                                <li class="menu-li"><a href="{{ route('admin.tag.index') }}"
                                        class="items-link">Теги</a></li>
                                <li class="menu-li"><a href="{{ route('admin.post.index') }}"
                                        class="items-link">Блог</a></li>
                                <li class="menu-li"><a href="{{ route('admin.user.index') }}"
                                        class="items-link">Пользователи</a></li>
                            @endcan
                        </ul>
                    </nav>
                </div>
                <div class="menu-exit">
                    <button class="btn menu-btn" type="button"><a href="{{ route('auth.logout') }}"
                            class="menu-link">Выход</a></button>
                </div>

            </header>
            <section class="content">
                <div class="container">
                @show

                @section('error')

                    <div class="container">
                        @if ($message = session('success'))
                            <div class="info_feed" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="info_danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                @show


                @section('content')

                @show

                @section('footer')
                </div>
            </section>
            <footer class="footer">
                <div class="container">
                    <div class="footer-up">

                        <div class="footer_left">
                            <div class="footer_logo">
                                <img src="{{ asset('assets/admin-style/img/logo-3.svg') }}" alt="Fine services"
                                    class="logo-3">
                            </div>
                            <div class="line_footer"></div>
                            <div class="footer_info">
                                <p>Ремонт в сервисных центрах Москвы</p>
                            </div>
                        </div>

                        <div class="footer_right">
                            <div class="webstyle_logo">
                                <img src="{{ asset('assets/admin-style/img/webstyle_black.svg') }}" alt="webstyle">
                            </div>
                            <div class="line_footer"></div>
                            <div class="footer_info">
                                <p>Продвижение Белгород</p>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/modules/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/modules/ckfinder/ckfinder.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>

    </html>
@show
