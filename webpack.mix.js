let mix = require('laravel-mix');

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
mix.scripts([
    'resources/assets/js/categorie.js'
], 'public/js/categorie.min.js');

mix.scripts([
    'resources/assets/js/user.js'
], 'public/js/user.min.js');

mix.scripts([
    'resources/assets/js/document.js'
], 'public/js/document.min.js');

mix.scripts([
    'resources/assets/js/custom.js'
], 'public/js/custom.min.js');

mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');
mix.copy('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/css/sweetalert2.min.css');
mix.copy('node_modules/select2/dist/css/select2.min.css', 'public/css/select2.min.css');
mix.copy('node_modules/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css', 'public/css/select2-bootstrap4.min.css');
mix.copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css', 'public/css/dataTables.bootstrap4.css');
mix.copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css', 'public/css/bootstrap-datepicker3.min.css');

mix.copy('resources/assets/css/switchery.min.css', 'public/css/switchery.min.css');
mix.copy('resources/assets/css/style.css', 'public/css/style.css');
mix.copy('resources/assets/css/custom.css', 'public/css/custom.css');
mix.copy('resources/assets/css/main-login.css', 'public/css/main-login.css');

mix.copy('resources/assets/js/modernizr.min.js', 'public/js/modernizr.min.js');
mix.copy('resources/assets/js/pikeadmin.js', 'public/js/pikeadmin.min.js');
mix.copy('resources/assets/js/detect.js', 'public/js/detect.js');
mix.copy('resources/assets/js/jquery.blockUI.js', 'public/js/jquery.blockUI.js');
mix.copy('resources/assets/js/switchery.min.js', 'public/js/switchery.min.js');
mix.copy('resources/assets/js/popper.min.js', 'public/js/popper.min.js');

mix.copy('node_modules/vue/dist/vue.min.js', 'public/js/vue.min.js');
mix.copy('node_modules/axios/dist/axios.min.js', 'public/js/axios.min.js');
mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
mix.copy('node_modules/moment/min/moment.min.js', 'public/js/moment.min.js');
mix.copy('node_modules/fastclick/lib/fastclick.js', 'public/js/fastclick.js');
mix.copy('node_modules/nicescroll/dist/jquery.nicescroll.min.js', 'public/js/jquery.nicescroll.min.js');
mix.copy('node_modules/jquery.scrollto/jquery.scrollTo.min.js', 'public/js/jquery.scrollTo.min.js');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');
mix.copy('node_modules/holderjs/holder.min.js', 'public/js/holder.min.js');
mix.copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/js/sweetalert2.all.min.js');
mix.copy('node_modules/gasparesganga-jquery-loading-overlay/dist/loadingoverlay.min.js', 'public/js/loadingoverlay.min.js');
mix.copy('node_modules/axios/dist/axios.min.js', 'public/js/axios.min.js');
mix.copy('node_modules/jquery-validation/dist/jquery.validate.min.js', 'public/js/jquery.validate.min.js');
mix.copy('node_modules/jquery-validation/dist/localization/messages_th.js', 'public/js/messages_th.js');
mix.copy('node_modules/datatables.net/js/jquery.dataTables.js', 'public/js/jquery.dataTables.js');
mix.copy('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js', 'public/js/dataTables.bootstrap4.js');
mix.copy('node_modules/gasparesganga-jquery-loading-overlay/dist/loadingoverlay.min.js', 'public/js/loadingoverlay.min.js');
mix.copy('node_modules/select2/dist/js/select2.min.js', 'public/js/select2.min.js');
mix.copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'public/js/bootstrap-datepicker.min.js');

mix.copyDirectory('resources/assets/img', 'public/img');
mix.copyDirectory('resources/assets/font-awesome', 'public/font-awesome');