@extends('layouts.app')

@section('content')
    @if($all)
    <ul class="list-group">
        @foreach($all as $single)
            <li class="list-group-item">
                <a href="{{route('tags.show', $single)}}" >
                    {{ $single->name }}
                </a>
            </li>

        @endforeach
    </ul>

    {{$all->links()}}

    @else
        <p>Нет тегов</p>
    @endif
@endsection
