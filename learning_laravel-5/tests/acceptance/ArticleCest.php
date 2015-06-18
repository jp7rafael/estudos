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
        $attributes = ['title' => 'New Article title', 'body' => 'Some cool text!'];
        $this->postAnArticle($I, $attributes);
        $I->waitForElementNotVisible('#myModalLabel', 4);
        $I->see($attributes['title']);
        $I->see($attributes['body']);
    }

    public function postAnInvalidArticle(AcceptanceTester $I)
    {  
        $attributes = ['title' => '32', 'body' => ''];
        $this->postAnArticle($I, $attributes);
        $I->see('The title must be at least 3 characters.', '.alert');
        $I->amOnPage('/articles');
        $I->dontSee($title);
    }

    private function postAnArticle(AcceptanceTester $I, $attributes)
    {
        $I->click('#new-button');
        $this->submitTheForm($I, $attributes, 'Add article');   
    }

    public function editWithValidArticleChange(AcceptanceTester $I)
    {
        $title = 'Edited at ' . microtime();
        $body = 'Edited at ' . microtime();
        $attributes = ['title' => $title, 'body' => $body];
        $this->editAnArticle($I, $attributes);
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
        //$I->see('The title must be at least 3 characters.');
        //$I->see('The body field is required.'); 
    }


    private function editAnArticle(AcceptanceTester $I, $attributes)
    {
        $article_id = $this->haveArticle($I, $attributes);
        $I->amOnPage('/articles');
        $url = '/articles/' . $article_id . '/edit';
        $I->click("[href*='" . $url . "']");
        $I->seeCurrentUrlEquals($url);
        $this->submitTheForm($I, $$attributes, 'update Article');
    }

    private function submitTheForm(AcceptanceTester $I, $attributes, $formTitle)
    {
        $I->waitForElement('#myModalLabel', 2);
        $I->see($formTitle, 'h4');
        $I->fillField('#title', $attributes['title']);
        $I->fillField('#body', $attributes['body']);
        $I->click('#articleSubmit');
    }

}