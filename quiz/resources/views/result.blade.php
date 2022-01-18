@extends('layout')

@section('main_content')
    <h1 class="text-center">Ваш результат: {{$result}}%</h1><br>
      
    <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$result}}%" aria-valuenow="{{$result}}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    
    <div class = "text-center m-3 p-3">
        <form action="/quiz" method="GET">            
            <button type="submit" class="btn-success fs-3 ">Начать заново</button>
        </form>
    </div>

@endsection
