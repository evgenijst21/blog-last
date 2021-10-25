@extends('layout.site')

@section('content')
<section class="content">
    <div class="container">

@include('layout.part.cat', ['parent' => 0])

        <div class="cardContainer inactive">
            <div class="card">
              <div class="side front">
                <div class="img">
                    <img src="http://placehold.it/370x250"/>
                </div>
                <div class="info">
                  <h3>Крупная бытовая техника</h3><br>
                  <a href="#">Cтиральная машина,</a>
                  <a href="#">Холодильник,</a>
                  <a href="#">Плита,</a>
                  <a href="#">Посудомоечная машина,</a>
                  <a href="#">Водонагреватель,</a>
                  <a href="#">Пылесос,</a>
                  <a href="#">Кондиционер,</a>
                  <a href="#">Духовка</a>    
                </div>
              </div>
            </div>
        </div>
          
        <div class="cardContainer inactive">
            <div class="card">
              <div class="side front">
                <div class="img">
                    <img src="http://placehold.it/370x250"/>
                </div>
                <div class="info">
                  <h3>Мелкая бытовая техника</h3><br>
                  <a href="#">Кофемашина,</a>
                    <a href="#">Мультиварка,</a>
                    <a href="#">Блендер,</a>
                    <a href="#">Утюг,</a>
                    <a href="#">Чайник,</a>
                    <a href="#">Швейная машинка</a>
                </div>
              </div>
            </div>
        </div>
        <div class="cardContainer inactive">
            <div class="card">
              <div class="side front">
                <div class="img">
                    <img src="http://placehold.it/370x250"/>
                </div>
                <div class="info">
                  <h3>Цифровая техника</h3><br>
                  <a href="#">Ноутбук,</a>
                  <a href="#">Телефон,</a>
                  <a href="#">iPhone,</a>
                  <a href="#">Планшет,</a>
                  <a href="#">iPad,</a>
                  <a href="#">MacBook,</a>
                  <a href="#">Компьютер,</a>
                  <a href="#">Фотоаппарат,</a>
                  <a href="#">Моноблок,</a>
                  <a href="#">Проектор,</a>
                  <a href="#">Электронная книга</a>
                </div>
              </div>
            </div>
        </div>
          
        <div class="cardContainer inactive">
            <div class="card">
              <div class="side front">
                <div class="img">
                    <img src="http://placehold.it/370x250"/>
                </div>
                <div class="info">
                  <h3>Крупная бытовая техника</h3>
                  <br>
                    <a href="#">Cтиральная машина,</a>
                    <a href="#">Холодильник,</a>
                    <a href="#">Плита,</a>
                    <a href="#">Посудомоечная машина,</a>
                    <a href="#">Водонагреватель,</a>
                    <a href="#">Пылесос,</a>
                    <a href="#">Кондиционер,</a>
                    <a href="#">Духовка</a>    
                </div>
              </div>
            </div>
        </div>
          
        <div class="cardContainer inactive">
            <div class="card">
              <div class="side front">
                <div class="img">
                    <img src="http://placehold.it/370x250"/>
                </div>
                <div class="info">
                  <h3>Мелкая бытовая техника</h3>
                  <br>
                    <a href="#">Кофемашина,</a>
                    <a href="#">Мультиварка,</a>
                    <a href="#">Блендер,</a>
                    <a href="#">Утюг,</a>
                    <a href="#">Чайник,</a>
                    <a href="#">Швейная машинка</a>
                
                </div>
              </div>
            </div>
        </div>
        <div class="all_tehnic">
            <a href="#" class="tehnic">Все виды техники <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="pleased_clients">
            <div class="how_clients">
                <h2>10 479 261 клиент нашли подходящий сервисный центр</h2>
            </div>
            <div class="delimiter"></div>
            <div class="digniy">
                <ul>
                    <li>233 города</li>
                    <li>32 675 сервсных центров</li>
                    <li>222 963 обращения</li>
                </ul>
            </div>
        </div>
    </div>      
</section>
@endsection