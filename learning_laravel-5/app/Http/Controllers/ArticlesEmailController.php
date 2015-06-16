<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Mailers\ArticleMailer;

class ArticlesEmailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function create(Article $article)
	{
		return view('articles.email.create', compact('article'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function send(Article $article, ArticleMailer $mailer, Request $request)
	{
		$mailer->sendArticleTo($request->input('email'), $article);
	}

}
