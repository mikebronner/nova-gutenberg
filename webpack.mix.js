const mix = require("laravel-mix");

mix
    .setPublicPath("dist")
    .js("./resources/js/field.js", "js")
    .postCss("./resources/css/field.css", "css")
    .copy("vendor/van-ons/laraberg/public/css/laraberg.css", "dist/css")
    .copy("vendor/van-ons/laraberg/public/css/laraberg.css.map", "dist/css")
    .copy("vendor/van-ons/laraberg/public/js/laraberg.js", "dist/js")
    .copy("vendor/van-ons/laraberg/public/js/laraberg.js.map", "dist/js")
;
