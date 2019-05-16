const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/popper.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/perfect-scrollbar.jquery.min.js',
    'resources/js/bootstrap-notify.js',
    'resources/js/jquery.mask.min.js',
    'resources/js/user.js'
], 'public/js/app.js');

mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/paper-dashboard.min.css',
    'resources/css/demo.css',
], 'public/css/app.css');
