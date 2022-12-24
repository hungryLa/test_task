@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($news as $item)
                <div class="card m-2 p-1" style="width: 45%;">
                    <img src="{{asset($item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a class="text-decoration-none" href="{{route('news.show',$item->id)}}">{{$item->title}}</a></h5>
                        <p class="card-text">{{$item->small_description}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            {{$news->links()}}
        </div>
    </div>


@endsection
