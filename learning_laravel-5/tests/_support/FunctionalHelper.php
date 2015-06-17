<?php
namespace Codeception\Module;
use Laracasts\TestDummy\Factory;
use Auth;
use Illuminate\Support\Facades\Artisan;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    /**
     * @var \League\FactoryMuffin\Factory
     */
    
    public function _initialize()
    {
        Artisan::call('migrate');
    }

    public function haveArticles($num)
    {
        Factory::build('App\Article');
    }

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
