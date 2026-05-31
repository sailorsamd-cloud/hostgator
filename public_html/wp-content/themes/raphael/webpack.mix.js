let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.scripts([
    'src/js/script.js'
],  'js/script.js');

mix.scripts([
    'src/js/header.js'
],  'js/header.js');
mix.scripts([
    'src/js/home.js'
],  'js/home.js');

mix.scripts([
    'src/js/page/single_product.js'
],  'js/single_product.js');

mix.scripts([
    'src/js/page/blog.js'
],  'js/blog.js');




mix.sass(
    'src/scss/head.scss'
, 'assets/css/head.css').options({
    processCssUrls: false
});

mix.sass(
    'src/scss/pages/home/init.scss'
    , 'assets/css/home.css').options({
    processCssUrls: false
});

mix.sass(
    'src/scss/pages/category/init.scss'
    , 'assets/css/category.css').options({
    processCssUrls: false
});

mix.sass(
    'src/scss/pages/single-product/init.scss'
    , 'assets/css/single-product.css').options({
    processCssUrls: false
});

mix.sass(
    'src/scss/pages/blog/init.scss'
    , 'assets/css/blog.css').options({
    processCssUrls: false
});

mix.sass(
    'src/scss/pages/account/init.scss'
    , 'assets/css/account.css').options({
    processCssUrls: false
});

mix.sass(
    'src/scss/pages/account/account.scss'
    , 'assets/css/account-cart.css').options({
    processCssUrls: false
});





/*
mix.styles([
    'src2/css/bootstrap.css',
    'src2/css/ttgallery.css',
    'src2/css/ttdropdown.css',
    'src2/css/ttselects.css',
    'src2/css/simplelightbox.min.css',
    'src2/css/toastr.css',
    'src2/css/editor.css',
    'src2/css/lity.min.css',
], 'assets/css/allstyle.css');*/
/*
mix.styles([
    'src2/css/style-uncomp.css'
], 'style.css');*/



// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.preact(src, output); <-- Identical to mix.js(), but registers Preact compilation.
// mix.coffee(src, output); <-- Identical to mix.js(), but registers CoffeeScript compilation.
// mix.ts(src, output); <-- TypeScript support. Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.test');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.babelConfig({}); <-- Merge extra Babel configuration (plugins, etc.) with Mix's default.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.extend(name, handler) <-- Extend Mix's API with your own components.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   terser: {}, // Terser-specific options. https://github.com/webpack-contrib/terser-webpack-plugin#options
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
