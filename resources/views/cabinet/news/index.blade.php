@extends('cabinet.layouts.app')

@section('title')
    Кабинет.Новости
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($news as $item)
                <div class="card m-2 p-1" style="width: 45%;">
                    <img src="{{asset($item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a class="text-decoration-none"
                                                  href="{{route('news.show',[$item->id])}}">{{$item->title}}</a></h5>
                        <p class="card-text">{{$item->small_description}}</p>


                        <form action="{{route('cabinet.news.destroy', $item )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('cabinet.news.edit', $item )}}">
                                <button type="button" class="btn btn-warning">Изменить</button>
                            </a>
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
