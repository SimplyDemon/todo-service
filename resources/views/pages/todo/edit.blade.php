@extends('layouts.app')

@section('content')

    <form method="post" action="<?= route( 'todos.update', $single ) ?>">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">
                Заголовок
            </label>
            <input type="text" value="{{old('title', $single->title)}}" class="form-control" name="title" id="title"
                   aria-describedby="text" minlength="2" maxlength="200" required>
            <div class="form-text">
                Заголовок задачи
            </div>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">
                Текст
            </label>
            <input type="text" class="form-control" name="text" id="text" aria-describedby="text" minlength="2" required
                   value="{{old('text', $single->text)}}">

        </div>
        <div class="mb-3">
            <label for="is_completed" class="form-label">
                Выполнено
            </label>
            <input id="is_completed" type="checkbox" class="form-check-input" name="is_completed" value="1"
                   @if(old('is_completed', $single->is_completed)) checked @endif
            >
        </div>

        @if($tags)
            <div class="mb-3">
                <label for="tags" class="form-label">
                    Теги
                </label>
            <select class="form-select" aria-label="Теги" multiple name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{$single->tags->contains($tag) ? 'selected' : ''}}>
                        {{$tag->name}}
                    </option>
                @endforeach
            </select>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">
            Обновить
        </button>
    </form>

@endsection
