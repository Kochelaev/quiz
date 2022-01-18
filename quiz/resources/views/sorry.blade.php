@extends('layout')

@section('main_content')

<h2>Извините, что то пошло не так...</h2>  
    <p class="fs-4">
        Серевер не может обработать Ваш запрос. Скорее всего вы пытались обмануть хитрый алгоритм приложения. <br> 
        Предлагаем Вам попробовать начать тестирование с начала.
    </p>    

    <div class = "text-center m-3 p-3">
        <form action="/quiz" method="GET">            
            <button type="submit" class="btn-success fs-3 ">Начать заново</button>
        </form>
    </div>

@endsection
