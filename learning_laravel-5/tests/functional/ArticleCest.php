<?php

class ArticleCest
{
    public function _before(FunctionalTester $I)
    {
        $I->logMeIn();
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
        $I->dontSee($body);
    }

    private function postAnArticle(FunctionalTester $I, $title, $body)
    {
        $I->click('#new-button');
        $I->seeCurrentUrlEquals('/articles/create');
        $this->submitTheForm($I, $title, $body, 'Add article');   
    }

    public function editAnValidArticle(FunctionalTester $I)
    {
        $randTitle = "Edited at " . microtime();
        $id = $I->haveRecord('articles', $this->postAttributes);
        $I->click('#new-button');
        $I->seeCurrentUrlEquals('/articles/create');
        $this->submitTheForm($I, $title, $body, 'Add article');  
    }


    private function editAnArticle(FunctionalTester $I, $newTitle, $newBody, $id)
    {
        $id = $I->haveRecord('articles', ['title' => 'old title', 'body' => 'old body']);
        $url = 'articles/'
        Locator::href('/login.php');
        $I->click('#new-button');
        $I->seeCurrentUrlEquals('/articles/create');
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