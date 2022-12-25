@extends('cabinet.layouts.app')

@section('title')Кабинет.Новость.Форма@endsection

@section('content')
    <div class="container p-3">
        <form action="{{route('cabinet.news.store')}}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Введите заголовок">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description" placeholder="Введите описание"></textarea>
            </div>
            <div class="form-group mb-2">
                <label for="small_description">Короткое описание</label>
                <input type="text" class="form-control" id="small_description" name="small_description" placeholder="Введите описание">
            </div>
            <button class="btn btn-success" type="submit">Добавить</button>
            <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
        </form>
    </div>
@endsection
