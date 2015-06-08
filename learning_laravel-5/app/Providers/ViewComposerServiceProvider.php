<?php namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composerNavigation('latest', Article::latest()->first());
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
