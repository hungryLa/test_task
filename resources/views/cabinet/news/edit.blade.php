@extends('cabinet.layouts.app')

@section('title')
    Кабинет.Новость.Редактирование
@endsection

@section('content')
    <div class="container p-3">
        <form action="{{route('cabinet.news.update',$news)}}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="id" id="id" value="{{$news->id}}">
            <div class="form-group mb-2">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                       placeholder="Введите заголовок" value="{{$news->title}}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description"
                          placeholder="Введите описание">{{$news->description}}</textarea>
            </div>
            <div class="form-group mb-2">
                <label for="small_description">Короткое описание</label>
                <input type="text" class="form-control" id="small_description" name="small_description"
                       placeholder="Введите описание" value="{{$news->small_description}}">
            </div>
            <button class="btn btn-warning" type="submit">Изменить</button>
        </form>
    </div>
@endsection
