@extends('layouts.app')

@section('title')Новость {{$news->title}}@endsection
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
    <div class="container">
        @foreach($comments as $comment)
            <div class="row">
                <p><a href="">{{$comment->user->name}}</a> <mark style="float:right;">Лайков: {{$comment->likes}}</mark></p>
                <p>{{$comment->content}}</p>
            </div>
        @endforeach
    </div>

@endsection
