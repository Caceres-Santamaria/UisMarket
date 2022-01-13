const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/sliderDetalle.js', 'public/js')
    .copy('resources/js/popper.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .copy('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js', 'public/js')
    // .copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/js')
    .copy('node_modules/@splidejs/splide/dist/js/splide.min.js', 'public/js')
    .sass('resources/sass/fontawesome.scss', 'public/css')
    .copy('node_modules/@splidejs/splide/dist/css/splide.min.css', 'public/css')
    .copy('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/css')
    .postCss('resources/css/general.css', 'public/css', [
        //
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ]);

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync('http://uismarket.com');
