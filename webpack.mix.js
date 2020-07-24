const mix = require('laravel-mix');

mix.options({
    terser: {
        extractComments: false,
    }
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
