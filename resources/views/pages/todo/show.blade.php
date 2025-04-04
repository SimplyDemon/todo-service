@extends('layouts.app')

@section('content')
    <ul class="list-group">
        <li class="list-group-item">
            Заголовок: {{$single->title}}
        </li>
        <li class="list-group-item">
            Текст: {{$single->text}}
        </li>
        <li class="list-group-item">
            Выполнено: {{$single->is_completed_readable}}
        </li>
        @if(!$single->tags->isEmpty())
            <li class="list-group-item">
            Теги:
            @foreach($single->tags as $tag)
                {{$tag->name}}@if(!$loop->last), @endif
            @endforeach
        </li>
        @endif
    </ul>

    <form method="POST" action="{{ route( 'todos.destroy', $single ) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-primary">
            Удалить
        </button>
    </form>

    <a href="{{ route( 'todos.edit', $single ) }}">
        Редактировать
    </a>
@endsection
