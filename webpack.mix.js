const cssImport = require('postcss-import');
const cssNesting = require('postcss-nesting');
const mix = require('laravel-mix');
const path = require('path');
const fs = require('fs-extra');
const processwireMix = require(`.${path.sep}processwire.mix`);

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const cwd = (dir) => path.resolve(__dirname, dir);

// Change this to where the final compiled js will be in the production server url
const rootUrl = 'pw-inertia';
const public = 'public';
const resources = cwd('resources');

const chunks = `${rootUrl}${path.sep}${public}`;
const chunksDir = cwd(`${public}${path.sep}${chunks}${path.sep}js`);
const chunksDirReal = cwd(`${public}${path.sep}js`);

mix.setPublicPath(public)
  .setResourceRoot(resources)
  .js(`resources${path.sep}js${path.sep}app.js`, 'js')
  .postCss(`resources${path.sep}css${path.sep}app.css`, 'css')
  .options({
    postCss: [
      cssImport(),
      cssNesting(),
    ],
  })
  .webpackConfig({
    output: { chunkFilename: `${chunks}${path.sep}js${path.sep}[name].js?id=[chunkhash]` },
    resolve: {
      extensions: ['.js', '.svelte'],
      mainFields: ['svelte', 'browser', 'module', 'main'],
      alias: {
        '@': path.resolve(`resources${path.sep}js`),
      },
    },
    module: {
      rules: [
        {
          test: /\.(svelte)$/,
          use: {
            loader: 'svelte-loader',
            options: {
              emitCss: true,
              hotReload: true,
            },
          },
        },
      ],
    },
  })
  .version()
  .sourceMaps()
  .then(async () => {
    // Chunks need a special path to be referenced inside the views
    // So we have to copy them the proper location
    fs.copySync(chunksDir, chunksDirReal);
    fs.rmdirSync(cwd(`${public}${path.sep}${rootUrl}`), {recursive: true});
    // Generate the special _mix.php file
    processwireMix();
  });
