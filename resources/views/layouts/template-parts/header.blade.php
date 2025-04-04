<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>


<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="{{ route('todos.index') }}" class="nav-link">
                Задачи
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('todos.create') }}" class="nav-link">
                Создать задачу
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('tags.index') }}" class="nav-link">
                Теги
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('tags.create') }}" class="nav-link">
                Создать тег
            </a>
        </li>
    </ul>
    <form class="me-3" role="search" action="{{route('search')}}">
        @csrf
        <input type="search" name="s" class="form-control" placeholder="Поиск" aria-label="Поиск">
    </form>
</header>

<main class="container">

@if (Session::has('message'))
    <div class="alert alert-info" role="alert">
        {!! session('message') !!}
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
@endif
