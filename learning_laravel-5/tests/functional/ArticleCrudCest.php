<?php
// class ArticleCrudCest
// {

    // private $articleAttributes;
    // public function __construct()
    // {
    //     $this->articleAttributes = [
    //         'title' => 'Hello Universe',
    //         'body' => 'You are so awesome',
    //         'created_at' => new DateTime(),
    //         'updated_at' => new DateTime()
    //     ];
    // }
    
    // tests
    // public function createArticle()
    // {
    //     $I = new FunctionalTester($scenario);
    //     $I->am('administrator');
    //     $I->wantTo('Post a new article');
    //     $I->amOnPage('/articles');
    //     $I->click('Add new post');
    //     $I->createArticle(['title' => 'Hello world', 'body' => 'And greetings for all']);
    //     $I->seeCurrentUrlEquals(ArticlesPage::$url);
    //     $I->see('Hello world', '.table');
    // }
    // public function createArticleValidationFails(FunctionalTester $I)
    // {
    //     ArticlesPage::of($I)->createArticle();
    //     $I->seeCurrentUrlEquals(ArticlesPage::route('/create'));
    //     $I->see('The body field is required.','.error');
    //     $I->see('The title field is required.','.error');
    // }
    // public function editArticle(FunctionalTester $I)
    // {
    //     $randTitle = "Edited at " . microtime();
    //     $id = $I->haveRecord('posts', $this->postAttributes);
    //     ArticlesPage::of($I)->editArticle($id, ['title' => 'Edited at ' . $randTitle]);
    //     $I->seeCurrentUrlEquals(ArticlesPage::route("/$id"));
    //     $I->see('Show Article', 'h1');
    //     $I->see($randTitle);
    //     $I->dontSee('Hello Universe');
    // }
    // public function deleteArticle(FunctionalTester $I)
    // {
    //     $id = $I->haveRecord('posts', $this->postAttributes);
    //     $I->amOnPage(ArticlesPage::$url);
    //     $I->see('Hello Universe');
    //     ArticlesPage::of($I)->deleteArticle($id);
    //     $I->seeCurrentUrlEquals(ArticlesPage::$url);
    //     $I->dontSee('Hello Universe');
    // }
// }