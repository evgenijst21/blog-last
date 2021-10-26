<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("assets/css/font-awesome/css/font-awesome.min.css")}}">
    <link href="{{ asset("assets/css/app.css") }}" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="nav">
                <img src="{{asset("assets/img/svg/logo.svg")}}" alt="Fine services" class="logo">
                    <select class="city-menu" size="1">
                        <option value="Москва">Москва</option>
                        <option value="Питер">Питер</option>
                        <option value="Питер">Белгород</option>
                    </select>
            </div>
            <div class="offer">
				<h1>
					Услуги отличного сервиса в Москве
				</h1>
			</div>
            <div class="search">
                <form class="search-form" action="">
                    <input type="search" name="q" placeholder="Стиралка INDESIT"> 
                        <button type="submit" value="Найти">Найти</button>
                </form>
            </div>
        </div>
        
    </header>

    @yield('content')

    @include('layout.part.feedback-form')

    <footer class="footer">
        <div class="container">
            <div class="footer-up">

              <div class="footer_left">
                <div class="footer_logo">
                  <img src="{{asset("assets/img/svg/logo-3.svg")}}" alt="Fine services" class="logo-3">
                </div>
                <div class="line_footer"></div>
                <div class="footer_info"><p>Ремонт в сервисных центрах Москвы</p></div>
              </div>
                
              <div class="footer_right">
                <div class="webstyle_logo">
                  <img src="{{asset("assets/img/svg/webstyle_black.svg")}}" alt="webstyle">
                </div>
                <div class="line_footer"></div>
                <div class="footer_info"><p>Продвижение Белгород</p></div>
              </div>
               
            </div>
            <div class="footer-down">
                <p>©2010-2021</p>
                <p><a href="#">Политика конфиденциальности</a></p>
                <p><a href="#">Политика обработки персональных данных</a></p>
            </div>
        </div>
    </footer>
    <script src="{{asset("assets/js/main.js")}}"></script>
</body>
</html>
    
            

            
        