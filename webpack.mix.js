const mix = require("laravel-mix");

mix
    .setPublicPath('dist')
    .js('./resources/js/field.js', 'js')
    .sass('./resources/sass/field.scss', 'css')
    .postCss("./vendor/van-ons/laraberg/public/css/laraberg.css", "css")
    .js("./vendor/van-ons/laraberg/public/js/laraberg.js", "js")
;
