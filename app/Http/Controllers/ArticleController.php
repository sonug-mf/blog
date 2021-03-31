<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Article;

class ArticleController extends Controller
{

    public function show($slug)
    {
        return view('article', ['slug' => $slug]);
    }

    public function list(){
        $data = Article::where('status', 'active')->get();

        return view('admin.article.list', ['data' => $data]);
    }

    public function create(){
        $default = (object) array('title' => '', 'desc' => '', 'id' => 0);
        return view('admin.article.create', ['data' => $default]);

    }

    public function submit(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $article = new Article();
        $article->title = $request->getContent('title');
        $article->description = $request->getContent('description');
        $article->slug = str_replace(' ', '-', $request->getContent('title'));
        
    }

}
