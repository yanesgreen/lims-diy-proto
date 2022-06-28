const mix = require('laravel-mix');

// nb: (yang langsung ditaruh di /public)
// js: select2.min.js, jquery.Datatable.min.js, dataTables.bootstrap4.min.js ,bgswitcher,js, chart.js, jquery.js, jsignature.min.js
mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/frontend.js', 'public/js')
    .js('resources/js/backend.js', 'public/js')
    .sass('resources/sass/frontend.scss', 'public/css')
    .sass('resources/sass/auth.scss', 'public/css')
    .sass('resources/sass/backend.scss', 'public/css')
    .sass('resources/sass/fontawesome.scss', 'public/css')
    .sass('resources/sass/normalize.scss', 'public/css')
    .sass('resources/sass/paper.scss', 'public/css')
    .sass('resources/sass/cetakan.scss', 'public/css')
    .styles('resources/css/dataTables.bootstrap4.css', 'public/css/dataTables.bootstrap4.css')
    .styles('resources/css/select2.css', 'public/css/select2.css')
    .styles('resources/css/table.css', 'public/css/table.css')
    .version();

