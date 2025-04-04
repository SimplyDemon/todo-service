@extends('layouts.app')

@section('content')
    <ul>
        <li>
            Тег: {{$single->name}}
        </li>
    </ul>

    <form method="POST" action="{{ route( 'tags.destroy', $single ) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-primary">
            Удалить
        </button>
    </form>

    <a href="{{ route( 'tags.edit', $single ) }}">
        Редактировать
    </a>
@endsection
