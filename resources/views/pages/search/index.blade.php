@extends('layouts.app')

@section('content')
    @if($search)
        <h2>Результаты по запросу "{{$search}}"</h2>
    @else
        <p>Введите свой запрос в строку поиска.</p>
    @endif

    @if(!$all->isEmpty() && $search)
        <ul class="list-group">
            @foreach($all as $single)
                @include('template-parts/todo/index-item')
            @endforeach
        </ul>

    @else
        <p>Нет заданий</p>
    @endif
@endsection
