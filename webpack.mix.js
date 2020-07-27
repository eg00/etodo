const mix = require('laravel-mix');

mix.options({
    terser: {
        extractComments: false,
    }
});

mix.sass('resources/sass/app.scss', 'public/css/app.css');
mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/spa/spa.js', 'public/js');

