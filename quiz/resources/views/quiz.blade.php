@extends('layout')

@section('main_content')
@php $i = 1 @endphp

<h1>Вопрос № {{$questId}} </h1>

<p class="fs-4">{{$question['text']}}</p>
<form action="{{$_ENV['REQUEST_URI']}}" method="post" name="userAnswers" class="align-baseline">
    @csrf
    <input type="hidden" name="questId" value="{{$question['id']}}">
    
    @foreach ($question['choices'] as $choice)
       <div class="input-group-text" id="div{{$i}}"> 
            @php $flag=false; @endphp
            @if (session()->has('question' . $questId . '.choices'))
                @php $userAnswers = session()->get('question' . $questId . '.choices') @endphp
                @foreach ($userAnswers as $session)                 
                    @if ($choice['id'] == $session) @php $flag =true; @endphp @endif 
                @endforeach
             @endif
            <input type="checkbox" name="{{$choice['id']}}"@if($flag) checked @endif id="ch{{$i++}}">
            <span class="btn"> {{$choice['text']}} </span>
        </div><br>
    @endforeach

    <button type="submit" class="btn-success fs-4">  
        @if ($questId < $quizCount) Следующий вопрос
            @else Завершить тест
        @endif 
    </button>

</form> <br>

@if ($questId>1)
<a href="/quiz/{{$questId-1}}"> <- вернуться обратно </a>    
@endif

<script src="{{asset("js/script.js")}}"></script>
@endsection
