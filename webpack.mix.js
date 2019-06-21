const mix = require('laravel-mix');

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
mix.js('resources/js/app.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')
	.copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js')
	.copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/css/font-awesome.css')
	.copy('node_modules/@fortawesome/fontawesome-free/js/all.min.js', 'public/js/font-awesome.js')
	.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
	.copy('node_modules/trix/dist/trix.css', 'public/css/trix.css')
	.copy('node_modules/trix/dist/trix.js', 'public/js/trix.js')
	.copy('node_modules/trix/dist/trix-core.js', 'public/js/trix-core.js')
    .scripts([
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js'
    ], 'public/js/datatable.js')
    .styles(['node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css'], 'public/css/datatable.css');
