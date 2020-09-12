const mix = require("laravel-mix");

mix
  .setPublicPath("dist")
  .js("./resources/js/field.js", "js")
  .postCss("./resources/css/field.css", "css")
;
