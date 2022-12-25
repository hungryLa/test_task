<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function news(){
        $user = Auth::user();
        $news = $user->news;

        return view('cabinet.news.index',compact('user','news'));
    }

    public function create(){
        $user = Auth::user();
        return view('cabinet.news.form',compact('user'));
    }

    public function store(Request $request){
        try {
            News::create([
                'title'=> $request['title'],
                'description'=> $request['description'],
                'image'=> 'news.jpg',
                'small_description'=> $request['small_description'],
                'user_id'=> $request['user_id'],
            ]);
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }
        return redirect()->route('cabinet.news');
    }

    public function edit(News $news){
        return view('cabinet.news.edit', compact('news'));
    }

    public function update(Request $request, $id){
        try {
            $news = News::find($id);
            $news->update([
               'title' =>$request['title'],
               'description' =>$request['description'],
               'small_description' =>$request['small_description'],
            ]);
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
        return redirect()->route('cabinet.news');
    }

    public function destroy(News $news){
        try {
            $news->delete();
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
        return redirect()->route('cabinet.news');
    }
}
