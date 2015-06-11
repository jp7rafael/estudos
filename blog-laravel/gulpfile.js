var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.less('app.less', 'assets/resources/css');

    mix.styles([
      'app.css',
      '../bower/select2-dist/dist/css/select2.min.css']);

    mix.scripts([
      '../bower/jquery/dist/jquery.min.js',
      '../bower/bootstrap/dist/js/bootstrap.min.js',
      '../bower/select2-dist/dist/js/select2.min.js',
      '../bower/jquery-ujs/src/rails.js'
      ]);

});
