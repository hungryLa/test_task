<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function index(){
        $news = News::paginate(4);
        return view('index',compact('news'));
    }

    public function show($id){
        $news = News::find($id);
        $comments = $news->comments;
        return view('news',compact('news','comments'));
    }
}
