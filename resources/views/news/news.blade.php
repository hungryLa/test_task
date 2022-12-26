@extends('layouts.app')

@section('title')
    Новость {{$news->title}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="card m-2 p-1" style="width: 100%;">
                <img src="{{asset($news->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title"><a class="text-decoration-none" href="">{{$news->title}}</a></h2>
                    <h6>Автор: <a href="">{{$news->user->name}}</a></h6>
                    <p class="card-text">{{$news->small_description}}</p>
                    <text>{{$news->description}}</text>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2 mb-3">
        <form action="{{route('cabinet.news.addComment',$news)}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="newComment">Новый комментарий</label>
                <textarea class="form-control" name="newComment" id="newComment"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Добавить комментарий</button>
            </div>
        </form>
    </div>
    <div class="container">
        @foreach($comments as $comment)
            @if($comment->user_id == Auth::id())
                <div class="row">
                    <p><a href="">{{$comment->user->name}}</a>
                        <mark style="float:right;">Лайков: {{$comment->count_likes}}</mark>
                    </p>
                    <div class="col-11">
                        <form class="" action="{{route('cabinet.news.editComment', $comment)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input class="form-control mb-2" value="{{$comment->content}}" id="text_comment"
                                   name="text_comment">
                            <button type="submit" class="btn btn-warning">Изменить</button>
                        </form>
                    </div>
                    <div class="col-1 p-0">
                        <form method="POST" action="{{route('cabinet.news.destroyComment',[$news, $comment])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="row">
                    <p><a href="">{{$comment->user->name}}</a>
                        <mark style="float:right;">
                            @if($comment->likes->firstWhere('user_id', Auth::id()))
                                <a href="{{route('comment.unlike',$comment)}}" class="m-1">
                                    <img src="{{asset('icons/star_active.png')}}" width="30px" height="30px" alt="">
                                </a>
                            @else
                                <a href="{{route('comment.like',$comment)}}" class="m-1">
                                    <img src="{{asset('icons/star.png')}}" width="30px" height="30px" alt="">
                                </a>
                            @endif
                            <b>Лайков: {{$comment->count_likes}}</b>
                        </mark>
                    </p>
                    <p>{{$comment->content}}</p>
                </div>
            @endif
        @endforeach
    </div>

@endsection
