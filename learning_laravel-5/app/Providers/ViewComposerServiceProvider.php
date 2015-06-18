<?php namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Database\Schema\Blueprint;

class ViewComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //if (Schema::hasTable('articles'))
        //{ 
            $latest = null;
            $latest = Article::latest()->first();       
            $this->composerNavigation('latest',  $latest);
        //}
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composerNavigation($name, $item)
    {
        view()->composer('shared.nav', function ($view) {
            $view->with('latest', Article::latest()->first());
        });
    }
}
