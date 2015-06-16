<?php namespace App\Mailers;

use App\Article;

class ArticleMailer extends Mailer
{
    public function sendArticleTo($email, Article $article)
    {
        return $this->sendTo($email, $article->title, 'emails.article', ['article'=> $article]);
    }
} 