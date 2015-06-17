<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('delete an article and dont see it anymore');
$userId = $I->logMeIn();
$article_id = $I->haveRecord('articles', 
             ['title' => 'delete article', 
             'body' => 'this article will be deleted',
             'published_at' => new DateTime(),
             'created_at' => new DateTime(),
             'updated_at' => new DateTime(), 
             'user_id' => $userId 
             ]);

$I->amOnPage('/articles');
$I->seeCurrentUrlEquals('/articles');
$url = '/articles/' . $article_id;
$I->seeLink($url);
$I->click("[href*='" . $url . "']", 'Remove');