<?php
namespace Codeception\Module;
use Laracasts\TestDummy\Factory;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class AcceptanceHelper extends \Codeception\Module
{

    public function logMeIn($I)
    {
        //$user = Factory::create('App\User');
        //$user = \App\User::first();
        $this->login($I, 'rafael@jp7.com.br', '123456');
        return 1;
    }  

    public function login($I, $email, $password)
    {
        $I->amOnPage('auth/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('.btn');
        $I->seeCurrentUrlEquals('/home');
    }

    public function logMeOut($I)
    {
        $I->amOnPage('/auth/logout');
        $I->seeCurrentUrlEquals('/');
    }

    public function lishaveArticle($I, array $attributes)
    {
        return $I->haveRecord('articles', 
                             ['title' => $attributes['title'], 
                             'body' => $attributes['body'],
                             'published_at' => new DateTime(),
                             'created_at' => new DateTime(),
                             'updated_at' => new DateTime(), 
                             'user_id' => $this->userId
                             ]);
    }
}
    