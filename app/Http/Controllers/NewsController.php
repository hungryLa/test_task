<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::paginate(4);
        return view('news.index',compact('news'));
    }
    public function show($id){
        $news = News::find($id);
        $comments = $news->comments;
        return view('news.news',compact('news','comments'));
    }
}
