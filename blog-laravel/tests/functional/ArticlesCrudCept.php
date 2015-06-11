<?php 
$I = new FunctionalTester($scenario);
$I->am('member');
$I->wantTo('Post a new article');
$I->logMeIn();
$I->amOnPage('/articles');
$I->click('#new-button');
$I->seeCurrentUrlEquals('/articles/create');
$I->see('Add article', 'h4');
$I->fillField('#title','My new title');
$I->fillField('#body','My new article content');
$I->click('Add article');
$I->amOnPage('/articles');
$I->see('My new title');