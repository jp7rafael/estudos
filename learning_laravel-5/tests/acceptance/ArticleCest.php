<?php

class ArticleCest
{
    protected $userId;

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/articles');
        $this->userId = $I->logMeIn($I);
        #$I->amLoggedAs([$this->userId]);
    }

    public function _after(AcceptanceTester $I)
    {
        $I->logMeOut($I);
    }

    // tests
    public function postAnValidArticle(AcceptanceTester $I)
    {  
        $title = 'New Article title';
        $body = 'Some cool text!';
        $this->postAnArticle($I, $title, $body);
        $I->amOnPage('/articles');
        $I->see($title);
        $I->see($body);
    }

    public function postAnInvalidArticle(AcceptanceTester $I)
    {  
        $title = '32';
        $body = '';
        $this->postAnArticle($I, 'A', 'Some cool text!');
        $I->see('The title must be at least 3 characters.', '.alert');
        $I->amOnPage('/articles');
        $I->dontSee($title);
    }

    private function postAnArticle(AcceptanceTester $I, $title, $body)
    {
        $I->click('#new-button');
        $I->seeElement('#myModalLabel');
        $this->submitTheForm($I, $title, $body, '#myModalLabel');   
    }

    public function editWithValidArticleChange(AcceptanceTester $I)
    {
        $title = 'Edited at ' . microtime();
        $body = 'Edited at ' . microtime();
        $this->editAnArticle($I, $title, $body);
        $I->see($title);
        $I->see($body);
        $I->dontSee('old title');
        $I->dontSee('old body'); 
    }

    public function editWithInvalidArticleChange(AcceptanceTester $I)
    {
        $title = 'oi';
        $body = '';
        $this->editAnArticle($I, $title, $body);
        $I->see('The title must be at least 3 characters.');
        $I->see('The body field is required.'); 
    }


    private function editAnArticle(AcceptanceTester $I, $newTitle, $newBody)
    {
        $article_id = $this->haveArticle($I, 'old title', 'body');
        $I->amOnPage('/articles');
        $url = '/articles/' . $article_id . '/edit';
        $I->click("[href*='" . $url . "']");
        $I->seeCurrentUrlEquals($url);
        $this->submitTheForm($I, $newTitle, $newBody, 'update Article');
    }

    private function submitTheForm(AcceptanceTester $I, $title, $body, $formTitle)
    {
        $I->see($formTitle, 'h4');
        $I->fillField('#title', $title);
        $I->fillField('#body', $body);
        $I->click($formTitle);
    }

    private function haveArticle(AcceptanceTester $I, $title, $body)
    {
        return $I->haveRecord('articles', 
                             ['title' => $title, 
                             'body' => $body,
                             'published_at' => new DateTime(),
                             'created_at' => new DateTime(),
                             'updated_at' => new DateTime(), 
                             'user_id' => $this->userId
                             ]);
    }

}