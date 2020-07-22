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
    .sass('node_modules/toastr/toastr.scss', 'public/css')
    .sass('resources/sass/style.scss', 'public/css');

mix.copy('node_modules/vue2-filters/dist/vue2-filters.min.js','public/js');

mix.scripts([
    'resources/js/backend/category.js'
], 'public/js/backend/category.min.js');

mix.scripts([
    'resources/js/backend/product.js'
], 'public/js/backend/product.min.js');

mix.scripts([
    'resources/js/backend/invoice.js'
], 'public/js/backend/invoice.min.js');

mix.scripts([
    'resources/js/backend/preorder.js'
], 'public/js/backend/preorder.min.js');

mix.scripts([
    'resources/js/backend/order.js'
], 'public/js/backend/order.min.js');


mix.scripts([
    'resources/js/backend/custom.js'
], 'public/js/backend/custom.min.js');

mix.scripts([
    'resources/js/backend/user.js'
], 'public/js/backend/user.min.js');


mix.scripts([
    'resources/js/backend/create-charts.js'
], 'public/js/backend/create-charts.min.js');

mix.copy('node_modules/sweetalert/dist/sweetalert.min.js','public/js'); //copy sewwaler.min.js ไปไว้ ที่ public js
mix.copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js','public/js'); //copy sewwaler.min.js ไปไว้ ที่ public js
mix.copy('node_modules/toastr/build/toastr.min.js','public/js');
mix.copy('node_modules/admin-lte/plugins/select2/js/select2.full.min.js','public/js');


//font
mix.copy('resources/js/themejs/jquery.nice-select.min.js','public/js/themejs'); //copy jquery.nice-select.min.js ไปไว้ ที่ public /js/themejs
mix.copy('resources/js/themejs/jquery-ui.min.js','public/js/themejs'); //copy jquery-ui.min.js ไปไว้ ที่ public /js/themejs
mix.copy('resources/js/themejs/jquery.slicknav.js','public/js/themejs'); //copy jquery.slicknav.js ไปไว้ ที่ public /js/themejs
mix.copy('resources/js/themejs/mixitup.min.js','public/js/themejs'); //copy mixitup.min.js ไปไว้ ที่ public /js/themejs
mix.copy('resources/js/themejs/owl.carousel.min.js','public/js/themejs'); //copy owl.carousel.min.js ไปไว้ ที่ public /js/themejs
mix.copy('resources/js/themejs/main.js','public/js/themejs'); //copy main.js ไปไว้ ที่ public /js/themejs

mix.copy('resources/themecss/bootstrap.min.css','public/css/themecss');
mix.copy('resources/themecss/font-awesome.min.css','public/css/themecss');
mix.copy('resources/themecss/elegant-icons.css','public/css/themecss');
mix.copy('resources/themecss/nice-select.css','public/css/themecss');
mix.copy('resources/themecss/jquery-ui.min.css','public/css/themecss');
mix.copy('resources/themecss/owl.carousel.min.css','public/css/themecss');
mix.copy('resources/themecss/slicknav.min.css','public/css/themecss');

//back

mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/backend/bootstrap.min.css');


mix.copy('resources/js/backend/modernizr.min.js', 'public/js/backend/modernizr.min.js');
mix.copy('resources/js/backend/detect.js', 'public/js/backend/detect.js');
mix.copy('resources/js/backend/jquery.blockUI.js', 'public/js/backend/jquery.blockUI.js');
mix.copy('resources/js/backend/switchery.min.js', 'public/js/backend/switchery.min.js');
mix.copy('resources/js/backend/popper.min.js', 'public/js/backend/popper.min.js');
mix.copy('resources/js/backend/Chart.min.js', 'public/js/backend/Chart.min.js');
mix.copy('resources/js/backend/jquery.min.js', 'public/js/backend/jquery.min.js');

mix.copy('node_modules/vue/dist/vue.min.js', 'public/js/backend/vue.min.js');
mix.copy('node_modules/axios/dist/axios.min.js', 'public/js/backend/axios.min.js');
// mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/backend/jquery.min.js');
mix.copy('node_modules/moment/min/moment.min.js', 'public/js/backend/moment.min.js');
mix.copy('node_modules/fastclick/lib/fastclick.js', 'public/js/backend/fastclick.js');
mix.copy('node_modules/nicescroll/dist/jquery.nicescroll.min.js', 'public/js/backend/jquery.nicescroll.min.js');
mix.copy('node_modules/jquery-scrollTo/dist/jquery-scrollTo.min.js', 'public/js/backend/jquery-scrollTo.min.js');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/backend/bootstrap.min.js');
mix.copy('node_modules/holderjs/holder.min.js', 'public/js/backend/holder.min.js');
mix.copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/js/backend/sweetalert2.all.min.js');
mix.copy('node_modules/gasparesganga-jquery-loading-overlay/dist/loadingoverlay.min.js', 'public/js/backend/loadingoverlay.min.js');
mix.copy('node_modules/axios/dist/axios.min.js', 'public/js/backend/axios.min.js');
mix.copy('node_modules/jquery-validation/dist/jquery.validate.min.js', 'public/js/backend/jquery.validate.min.js');
mix.copy('node_modules/jquery-validation/dist/localization/messages_th.js', 'public/js/backend/messages_th.js');
mix.copy('node_modules/datatables.net/js/jquery.dataTables.js', 'public/js/backend/jquery.dataTables.js');
mix.copy('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js', 'public/js/backend/dataTables.bootstrap4.js');
mix.copy('node_modules/gasparesganga-jquery-loading-overlay/dist/loadingoverlay.min.js', 'public/js/backend/loadingoverlay.min.js');
mix.copy('node_modules/select2/dist/js/select2.min.js', 'public/js/backend/select2.min.js');
mix.copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'public/js/backend/bootstrap-datepicker.min.js');

mix.copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/backend/adminlte.min.js');
mix.copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js/backend/bootstrap.bundle.min.js');
mix.copy('node_modules/admin-lte/plugins/summernote/summernote-bs4.min.js', 'public/js/backend/summernote-bs4.min.js');


mix.copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css/backend/adminlte.min.css');
mix.copy('node_modules/admin-lte/plugins/summernote/summernote-bs4.css', 'public/css/backend/summernote-bs4.css');
mix.copy('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css/backend/all.min.css');


//  mix.copy('node_modules/admin-lte/plugins/select2/css/select2.min.css','public/css/backend/select2.min.css');

mix.copy('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/css/backend/sweetalert2.min.css');
mix.copy('node_modules/select2/dist/css/select2.min.css', 'public/css/backend/select2.min.css');
mix.copy('node_modules/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css', 'public/css/backend/select2-bootstrap4.min.css');
mix.copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css', 'public/css/backend/dataTables.bootstrap4.css');
mix.copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css', 'public/css/backend/bootstrap-datepicker3.min.css');
mix.copy('resources/css/switchery.min.css', 'public/css/backend/switchery.min.css');
mix.copy('resources/css/custom.css', 'public/css/backend/custom.css');
mix.copy('resources/css/style.css', 'public/css/backend/style.css');

