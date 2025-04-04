@extends('layouts.app')

@section('content')
    @if($all)
        <ul class="list-group">
            @foreach($all as $single)
                @include('template-parts/todo/index-item')
            @endforeach
        </ul>

        {{$all->links()}}

    @else
        <p>Нет заданий</p>
    @endif
@endsection
