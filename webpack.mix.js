const mix = require('laravel-mix');

const purgecss = require('@fullhuman/postcss-purgecss')({
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
})

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        purgecss
    ]);
