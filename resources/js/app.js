import './bootstrap';
import 'bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min';
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();
