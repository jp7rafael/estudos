<?php
namespace Codeception\Module;
use Laracasts\TestDummy\Factory;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FactoryHelper extends \Codeception\Module
{
    /**
     * @var \League\FactoryMuffin\Factory
     */
    protected $factory;
    
    public function _initialize()
    {
    }

    public function haveAnArticle()
    {
        Factory::build('App\User');
    }

    public function haveAnUser()
    {
        Factory::build('App\Article');
    }
}
