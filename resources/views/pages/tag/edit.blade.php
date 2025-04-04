@extends('layouts.app')

@section('content')

    <form method="post" action="<?= route( 'tags.update', $single ) ?>">
        @csrf
        @method('PUT')
        <input type="hidden" name="current_id" value="{{$single->id}}">
        <div class="mb-3">
            <label for="title" class="form-label">
                Тег
            </label>
            <input type="text" value="{{old('name', $single->name)}}" class="form-control" name="name" id="name"
                   minlength="2" maxlength="200" required>
            <div class="form-text">
                Тег
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            Обновить
        </button>
    </form>

@endsection
