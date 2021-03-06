<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Auth;
use Flash;
use Response;
use App\Mailers\ArticleMailer;
use App\Commands\SeedArticles;

class ArticlesController extends Controller {


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    public function index() 
    {
        $articles = Article::latest()->published()->get();
        $tags = Tag::lists('name', 'id')->all();
        return view('articles.index', compact('articles', 'tags'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::lists('name', 'id')->all();
        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        $article->setTags($request->input('tag_list'));

        // flash()->success('Your article has been created!');
        return view('articles.article', compact('article'));
    }

    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id')->all();
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request) 
    {
        $article->update($request->all());
        $article->setTags($request->input('tag_list'));        
        return view('articles.article', compact('article'));
    }

    public function destroy(Article $article)
    {
        $title = $article->title;
        $article->delete();
        // flash()->success("Successfully deleted $title!");
        return $title;
    }

    public function seed(SeedArticles $seedArticle)
    {
        $this->dispatch($seedArticle);
        return redirect('/articles');
    }

}
