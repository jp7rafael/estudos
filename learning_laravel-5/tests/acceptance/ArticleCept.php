<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');

$I->amOnPage('/articles/create');
// $I->fillField('title', 'New title');
// $I->submitForm('#create-article');