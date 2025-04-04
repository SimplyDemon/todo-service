@extends('layouts.app')

@section('content')

    <form method="post" action="<?= route( 'tags.store' ) ?>">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">
                Тег
            </label>
            <input type="text" value="{{old('name', '')}}" class="form-control" name="name" id="name" minlength="2"
                   maxlength="200" required>
            <div class="form-text">
                Тег
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            Создать
        </button>
    </form>

@endsection
