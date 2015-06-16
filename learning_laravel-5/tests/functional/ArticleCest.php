<?php

class ArticleCest
{
    protected $userId;

    public function _before(FunctionalTester $I)
    {
        $this->userId = $I->logMeIn();
        $I->amOnPage('/articles');
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function postAnValidArticle(FunctionalTester $I)
    {  
        $title = 'New Article title';
        $body = 'Some cool text!';
        $this->postAnArticle($I, $title, $body);
        $I->amOnPage('/articles');
        $I->see($title);
        $I->see($body);
    }

    public function postAnInvalidArticle(FunctionalTester $I)
    {  
        $title = '32';
        $body = '';
        $this->postAnArticle($I, 'A', 'Some cool text!');
        $I->see('The title must be at least 3 characters.', '.alert');
        $I->amOnPage('/articles');
        $I->dontSee($title);
    }

    private function postAnArticle(FunctionalTester $I, $title, $body)
    {
        $I->click('#new-button');
        $I->seeCurrentUrlEquals('/articles/create');
        $this->submitTheForm($I, $title, $body, 'Add article');   
    }

    public function editWithValidArticleChange(FunctionalTester $I)
    {
        $title = 'Edited at ' . microtime();
        $body = 'Edited at ' . microtime();
        $this->editAnArticle($I, $title, $body);
        $I->see($title);
        $I->see($body);
        $I->dontSee('old title');
        $I->dontSee('old body'); 
    }

    public function editWithInvalidArticleChange(FunctionalTester $I)
    {
        $title = 'oi';
        $body = '';
        $this->editAnArticle($I, $title, $body);
        $I->see('The title must be at least 3 characters.');
        $I->see('The body field is required.'); 
    }


    private function editAnArticle(FunctionalTester $I, $newTitle, $newBody)
    {
        $this->haveArticle($I, 'old title', 'body');
        $I->amOnPage('/articles');
        $url = '/articles/' . $article_id . '/edit';
        $I->click("[href*='" . $url . "']");
        $I->seeCurrentUrlEquals($url);
        $this->submitTheForm($I, $newTitle, $newBody, 'update Article');
    }

    private function submitTheForm(FunctionalTester $I, $title, $body, $formTitle)
    {
        $I->see($formTitle, 'h4');
        $I->fillField('#title', $title);
        $I->fillField('#body', $body);
        $I->click($formTitle);
    }

    private function haveArticle(FunctionalTester $I, $title, $body)
    {
        $article_id = $I->haveRecord('articles', 
                             ['title' => $title, 
                             'body' => $body,
                             'published_at' => new DateTime(),
                             'created_at' => new DateTime(),
                             'updated_at' => new DateTime(), 
                             'user_id' => $this->userId
                             ]);
    }

    private deleteAnArticle(FunctionalTester $I)
    {
        $this->haveArticle($I, 'delete article', 'this article will be deleted');
        $I->seeCurrentUrlEquals('/articles');
        $I->click();
    }

}