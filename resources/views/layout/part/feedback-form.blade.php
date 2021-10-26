<section class="feedback-form">
    <div class="container">
        @if ($errors->any())
            <div class="info_danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = session('success'))
            <div class="info_feed" role="alert">
                {{ $message }}
            </div>
        @endif
        {{-- <div class="info_feed" id="info"></div> --}}
        <form action="{{ route('feedback.store') }}" method="POST" class="feedback" id="feedback">
            @csrf
            <h2>Форма обратной связи.</h2>
            <p> Ваше имя* <input class="input" id="name" name="name" type="text" /> </p>

            <p> Электронная почта* <input class="input" id="email" name="email" type="email" /> </p>

            <p> Тема сообщения <input class="input" id="theme" name="theme" type="text" /> </p>

            <p> Текст сообщения:<textarea class="text-feedback" id="text" name="text" rows="5"></textarea></p>
            <p><button class="form-sbm" id="form-sbm" value="Отправить" type="submit">Отправить</button></p>
        </form>
    </div>
</section>


<script>
    // let form = document.getElementById('feedback');

    // form.addEventListener('submit', function(event) {
    //     let promise = fetch("{{ route('feedback.store') }}", {
    //         method: 'POST',
    //         body: new FormData(this),
    //         headers:{"content-type": "application/x-www-form-urlencoded"} 
    //     });

    //     promise.then(
    //         response => {
    //             return response.text();
    //         }
    //     ).then(
    //         text => {
    //             let info = document.getElementById('info')
    //             info.innerText = 'Сообщение отправлено';
    //             setTimeout(() => info.innerText = '', 2000);
    //         }
    //     );

    //     event.preventDefault();
    // });
</script>
