<?php
namespace Codeception\Module;
use Laracasts\TestDummy\Factory;
use Auth;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class AcceptanceHelper extends \Codeception\Module
{
    public function logMeIn()
    {
        $user = Factory::create('App\User');
        Auth::loginUsingId($user->id);
        return $user->id;
    }

     public function _after(\Codeception\TestCase $test)
    {
        Auth::logout();
    }
}
