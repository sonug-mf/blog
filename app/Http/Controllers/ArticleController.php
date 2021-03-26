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
}
