<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Category;

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

    public function create($id = null){
        $default = (object) array('title' => '', 'description' => '', 'id' => 0);
        $data = $id ? Article::where('id', $id)->first() : $default;

        $categories = Category::where('status', 'active')->get();
        $selected_categories = ArticleCategory::where('article', $id)->selectRaw('GROUP_CONCAT(`category`) AS `selected`')->first();

        return view('admin.article.create', [
            'data' => $data,
            'categories' => $categories,
            'selected' => explode(',', $selected_categories->selected)
        ]);
    }

    public function submit(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'article_body' => 'required'
        ], [
            'title.required' => 'Article Title is Required',
            'article_body.required' => 'Article Body is Required'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->article_body;
        $article->slug = self::generate_slug($request->title);
        $article->image = ' ';
        $article->save();

        foreach($request->categories as $category){
            $article_category = new ArticleCategory();
            $article_category->article = $article->id;
            $article_category->category = $category;
            $article_category->save();

        }

        return redirect(Route('article.list'));
    }

    public function edit(Request $request, $id = null)
    {
        $this->validate($request, [
            'title' => 'required',
            'article_body' => 'required'
        ], [
            'title.required' => 'Article Title is Required',
            'article_body.required' => 'Article Body is Required'
        ]);

        $record = Article::where('id', $id)->findorFail($id);
        $record->update([
            'title' => $request->title,
            'description' => $request->article_body,
            'slug' => self::generate_slug($request->title)
        ]);

        ArticleCategory::where('article', $id)->delete();
        foreach($request->categories as $category){
            $article_category = new ArticleCategory();
            $article_category->article = $id;
            $article_category->category = $category;
            $article_category->save();

        }
        
        return redirect(Route('article.list'));
    }

    private static function generate_slug(string $title = ''):string
    {
        return str_replace(' ', '-', $title);
    }
}
