var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


//Сдандартные компоненты
elixir(function (mix) {

 mix.styles([
  "./vendor/bower_components/bootstrap/dist/css/bootstrap.min.css",
  "./vendor/bower_components/font-awesome/css/font-awesome.min.css",
  "./vendor/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css",
  "./vendor/bower_components/sweetalert/dist/sweetalert.css",
  //"./vendor/bower_components/fancybox/source/jquery.fancybox.css",
  /*
  "./vendor/bower_components/roboto-fontface/css/roboto-fontface.css",
  "./vendor/bower_components/roboto-slab-fontface/roboto-slab-fontface.css",
   */
  "slidetext.css",
  "style.css"
 ], 'public/build/css/app.css');

 mix.scripts([
  "./vendor/bower_components/jquery/dist/jquery.min.js",
  "./vendor/bower_components/bootstrap/dist/js/bootstrap.min.js",
  "./vendor/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js",
  "./vendor/bower_components/sweetalert/dist/sweetalert.min.js",
  //"./vendor/bower_components/fancybox/source/jquery.fancybox.js"
  "slidetext-lib.js",
  "slidetext.js"
 ], 'public/build/js/app.js');

 mix.copy('./vendor/bower_components/bootstrap/dist/fonts/', 'public/build/build/fonts');
 mix.copy('./vendor/bower_components/font-awesome/fonts/', 'public/build/build/fonts');

 /*
 mix.copy('./vendor/bower_components/roboto-fontface/fonts/', 'public/build/build/fonts');
 mix.copy('./vendor/bower_components/roboto-slab-fontface/fonts/', 'public/build/build/css/fonts');
  */

 elixir(function (mix) {
  mix.version(["public/build/css/app.css", "public/build/js/app.js"]);
 });


});
