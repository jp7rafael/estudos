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

    public function editAnValidArticle(FunctionalTester $I)
    {
        $id = $I->haveRecord('articles', 
                             ['title' => 'old title', 
                             'body' => 'old body',
                             'published_at' => new DateTime(),
                             'created_at' => new DateTime(),
                             'updated_at' => new DateTime(), 
                             'user_id' => $this->userId
                             ]);
        $title = 'Edited at ' . microtime();
        $body = 'Edited at ' . microtime();
        $I->click('#new-button');
        $I->seeCurrentUrlEquals('/articles/create');
        $this->submitTheForm($I, $title, $body, 'Add article'); 
        $I->see($title);
        $I->see($body);
        $I->dontSee('old title');
        $I->dontSee('old body'); 
    }


    private function editAnArticle(FunctionalTester $I, $newTitle, $newBody, $article_id)
    {
        $url = '/articles/'. $article_id .'/edit';
        $I->click(Locator::href($url));
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

}