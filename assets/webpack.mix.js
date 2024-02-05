let mix = require("laravel-mix");

mix.disableSuccessNotifications();
mix.setPublicPath(".");
mix.setResourceRoot(".");
mix.webpackConfig({
  externals: {
    jquery: "jQuery",
  },
});
mix.options({
  postCss: [require("autoprefixer")],
  fileLoaderDirs: {
    fonts: "../fonts",
  },
});

mix.babelConfig({
  plugins: ["@babel/plugin-syntax-dynamic-import"],
});

mix
  .js("src/js/blocks/carousel.js", "dist/js")
  .js("src/js/blocks/gallery.js", "dist/js")
  .js("src/js/blocks/image-overlay.js", "dist/js")
  .js("src/js/blocks/itrac.js", "dist/js")
  .js("src/js/blocks/map-control.js", "dist/js")
  .js("src/js/blocks/slider.js", "dist/js")
  .js("src/js/blocks/text-hover.js", "dist/js")
  .js("src/js/blocks/contact.js", "dist/js")

  .sass("src/scss/blocks/_carousel.scss", "dist/css")
  .sass("src/scss/blocks/_gallery.scss", "dist/css")
  .sass("src/scss/blocks/_image-overlay.scss", "dist/css")
  .sass("src/scss/blocks/_itrac.scss", "dist/css")
  .sass("src/scss/blocks/_map-control.scss", "dist/css")
  .sass("src/scss/blocks/_slider.scss", "dist/css")
  .sass("src/scss/blocks/_team.scss", "dist/css")
  .sass("src/scss/blocks/_text-hover.scss", "dist/css")
  .sass("src/scss/blocks/_contact.scss", "dist/css")
  .options({
    processCssUrls: false,
    postCss: [require("tailwindcss")],
    uglify: {
      uglifyOptions: {
        warnings: true,
        comments: false,
        beautify: false,
        minify: false,
        minimize: false,
        compress: {
          drop_console: true,
          minimize: false,
        }
      },
    }
  });

const proxyServer = process.env.BASE_URL ? process.env.BASE_URL : "localhost";
mix.browserSync({
  proxy: proxyServer,
  open: false,
  files: ["../widgets/*.php"],
});

mix.webpackConfig(require("./webpack.config"));

if (mix.inProduction()) {
  mix.version();
}
