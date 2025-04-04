@extends('layouts.app')

@section('content')

    <form method="post" action="<?= route( 'todos.store' ) ?>">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">
                Заголовок
            </label>
            <input type="text" value="{{old('title', '')}}" class="form-control" name="title" id="title"
                   aria-describedby="text" minlength="2" maxlength="200" required>
            <div class="form-text">
                Заголовок задачи
            </div>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">
                Текст
            </label>
            <input type="text" value="{{old('text', '')}}" class="form-control" name="text" id="text"
                   aria-describedby="text" minlength="2" required>
            <div class="form-text">
                Текст задачи
            </div>
        </div>
        @if($tags)
            <div class="mb-3">
                <label for="tags" class="form-label">
                    Теги
                </label>
                <select class="form-select" aria-label="Теги" multiple name="tags[]" id="tags">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">
                            {{$tag->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">
            Создать
        </button>
    </form>

@endsection
