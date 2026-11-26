<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // Master Data (00PRD/features/01-master-organization.md). Digating auth, berbeda
    // dari halaman /admin-ui/* demo lain yang masih terbuka publik.
    Route::prefix('master-data')->name('master-data.')->group(function () {
        Route::get('/countries', [App\Http\Controllers\MasterData\CountryController::class, 'index'])
            ->name('countries');
        Route::get('/provinces', [App\Http\Controllers\MasterData\ProvinceController::class, 'index'])
            ->name('provinces');
        Route::get('/cities', [App\Http\Controllers\MasterData\CityController::class, 'index'])
            ->name('cities');
        Route::get('/outlets', [App\Http\Controllers\MasterData\OutletController::class, 'index'])
            ->name('outlets');
        Route::get('/organization-units', [App\Http\Controllers\MasterData\OrganizationUnitController::class, 'index'])
            ->name('organization-units');
    });
});

// Admin UI template pages (converted from public/*.html into resources/views/admin/*.blade.php)
Route::view('/admin-ui/404', 'admin-ui.404')->name('admin.404');
Route::view('/admin-ui/505', 'admin-ui.505')->name('admin.505');
Route::view('/admin-ui/blank', 'admin-ui.blank')->name('admin.blank');
Route::view('/admin-ui/buttons', 'admin-ui.buttons')->name('admin.buttons');
Route::view('/admin-ui/calender', 'admin-ui.calender')->name('admin.calender');
Route::view('/admin-ui/carousel', 'admin-ui.carousel')->name('admin.carousel');
Route::view('/admin-ui/charts_Js', 'admin-ui.charts_Js')->name('admin.charts_Js');
Route::view('/admin-ui/charts_am', 'admin-ui.charts_am')->name('admin.charts_am');
Route::view('/admin-ui/charts_flot', 'admin-ui.charts_flot')->name('admin.charts_flot');
Route::view('/admin-ui/charts_morris', 'admin-ui.charts_morris')->name('admin.charts_morris');
Route::view('/admin-ui/charts_sparkline', 'admin-ui.charts_sparkline')->name('admin.charts_sparkline');
Route::view('/admin-ui/code_editor', 'admin-ui.code_editor')->name('admin.code_editor');
Route::view('/admin-ui/compose', 'admin-ui.compose')->name('admin.compose');
Route::view('/admin-ui/custom-product-create', 'admin-ui.custom-product-create')->name('admin.custom-product-create');
Route::view('/admin-ui/custom-product-create-config-inserted', 'admin-ui.custom-product-create-config-inserted')->name('admin.custom-product-create-config-inserted');
Route::view('/admin-ui/custom-product-create-config-step-01', 'admin-ui.custom-product-create-config-step-01')->name('admin.custom-product-create-config-step-01');
Route::view('/admin-ui/custom-product-create-config-step-02', 'admin-ui.custom-product-create-config-step-02')->name('admin.custom-product-create-config-step-02');
Route::view('/admin-ui/custom-product-create-config-step-03', 'admin-ui.custom-product-create-config-step-03')->name('admin.custom-product-create-config-step-03');
Route::view('/admin-ui/custom-product-create-config-step-04', 'admin-ui.custom-product-create-config-step-04')->name('admin.custom-product-create-config-step-04');
Route::view('/admin-ui/custom-product-list', 'admin-ui.custom-product-list')->name('admin.custom-product-list');
Route::view('/admin-ui/custom-table-data', 'admin-ui.custom-table-data')->name('admin.custom-table-data');
Route::view('/admin-ui', 'admin-ui.dashboard')->name('admin.dashboard');
Route::view('/admin-ui/dataTables', 'admin-ui.dataTables')->name('admin.dataTables');
Route::view('/admin-ui/footable', 'admin-ui.footable')->name('admin.footable');
Route::view('/admin-ui/forget_password', 'admin-ui.forget_password')->name('admin.forget_password');
Route::view('/admin-ui/form-mask', 'admin-ui.form-mask')->name('admin.form-mask');
Route::view('/admin-ui/form_editor_wysihtml5', 'admin-ui.form_editor_wysihtml5')->name('admin.form_editor_wysihtml5');
Route::view('/admin-ui/form_file_upload', 'admin-ui.form_file_upload')->name('admin.form_file_upload');
Route::view('/admin-ui/form_input_group', 'admin-ui.form_input_group')->name('admin.form_input_group');
Route::view('/admin-ui/form_select', 'admin-ui.form_select')->name('admin.form_select');
Route::view('/admin-ui/form_touchspin', 'admin-ui.form_touchspin')->name('admin.form_touchspin');
Route::view('/admin-ui/form_wizard', 'admin-ui.form_wizard')->name('admin.form_wizard');
Route::view('/admin-ui/forms_basic', 'admin-ui.forms_basic')->name('admin.forms_basic');
Route::view('/admin-ui/forms_cropper', 'admin-ui.forms_cropper')->name('admin.forms_cropper');
Route::view('/admin-ui/forms_editor_ck', 'admin-ui.forms_editor_ck')->name('admin.forms_editor_ck');
Route::view('/admin-ui/forms_editor_markdown', 'admin-ui.forms_editor_markdown')->name('admin.forms_editor_markdown');
Route::view('/admin-ui/forms_editor_summernote', 'admin-ui.forms_editor_summernote')->name('admin.forms_editor_summernote');
Route::view('/admin-ui/forms_editor_trumbowyg', 'admin-ui.forms_editor_trumbowyg')->name('admin.forms_editor_trumbowyg');
Route::view('/admin-ui/forms_validation', 'admin-ui.forms_validation')->name('admin.forms_validation');
Route::view('/admin-ui/gridSystem', 'admin-ui.gridSystem')->name('admin.gridSystem');
Route::view('/admin-ui/horizontal_timeline', 'admin-ui.horizontal_timeline')->name('admin.horizontal_timeline');
Route::view('/admin-ui/icheck_toggle_pagination', 'admin-ui.icheck_toggle_pagination')->name('admin.icheck_toggle_pagination');
Route::view('/admin-ui/icon_socicon', 'admin-ui.icon_socicon')->name('admin.icon_socicon');
Route::view('/admin-ui/icons_bootstrap', 'admin-ui.icons_bootstrap')->name('admin.icons_bootstrap');
Route::view('/admin-ui/icons_flag', 'admin-ui.icons_flag')->name('admin.icons_flag');
Route::view('/admin-ui/icons_fontawesome', 'admin-ui.icons_fontawesome')->name('admin.icons_fontawesome');
Route::view('/admin-ui/icons_line', 'admin-ui.icons_line')->name('admin.icons_line');
Route::view('/admin-ui/icons_material', 'admin-ui.icons_material')->name('admin.icons_material');
Route::view('/admin-ui/icons_pe', 'admin-ui.icons_pe')->name('admin.icons_pe');
Route::view('/admin-ui/icons_weather', 'admin-ui.icons_weather')->name('admin.icons_weather');
Route::view('/admin-ui/invoice', 'admin-ui.invoice')->name('admin.invoice');
Route::view('/admin-ui/labels-badges-alerts', 'admin-ui.labels-badges-alerts')->name('admin.labels-badges-alerts');
Route::view('/admin-ui/list', 'admin-ui.list')->name('admin.list');
Route::view('/admin-ui/lockscreen', 'admin-ui.lockscreen')->name('admin.lockscreen');
Route::view('/admin-ui/login', 'admin-ui.login')->name('admin.login');
Route::view('/admin-ui/mailDetails', 'admin-ui.mailDetails')->name('admin.mailDetails');
Route::view('/admin-ui/mailbox', 'admin-ui.mailbox')->name('admin.mailbox');
Route::view('/admin-ui/maps_amcharts', 'admin-ui.maps_amcharts')->name('admin.maps_amcharts');
Route::view('/admin-ui/maps_data', 'admin-ui.maps_data')->name('admin.maps_data');
Route::view('/admin-ui/maps_gmaps', 'admin-ui.maps_gmaps')->name('admin.maps_gmaps');
Route::view('/admin-ui/maps_google', 'admin-ui.maps_google')->name('admin.maps_google');
Route::view('/admin-ui/maps_jvector', 'admin-ui.maps_jvector')->name('admin.maps_jvector');
Route::view('/admin-ui/maps_snazzy', 'admin-ui.maps_snazzy')->name('admin.maps_snazzy');
Route::view('/admin-ui/modals', 'admin-ui.modals')->name('admin.modals');
Route::view('/admin-ui/notification', 'admin-ui.notification')->name('admin.notification');
Route::view('/admin-ui/panels', 'admin-ui.panels')->name('admin.panels');
Route::view('/admin-ui/pricing', 'admin-ui.pricing')->name('admin.pricing');
Route::view('/admin-ui/profile', 'admin-ui.profile')->name('admin.profile');
Route::view('/admin-ui/progressbars', 'admin-ui.progressbars')->name('admin.progressbars');
Route::view('/admin-ui/register', 'admin-ui.register')->name('admin.register');
Route::view('/admin-ui/slider', 'admin-ui.slider')->name('admin.slider');
Route::view('/admin-ui/table', 'admin-ui.table')->name('admin.table');
Route::view('/admin-ui/tabs', 'admin-ui.tabs')->name('admin.tabs');
Route::view('/admin-ui/timeline', 'admin-ui.timeline')->name('admin.timeline');
Route::view('/admin-ui/tree-view', 'admin-ui.tree-view')->name('admin.tree-view');
Route::view('/admin-ui/typography', 'admin-ui.typography')->name('admin.typography');
Route::view('/admin-ui/widgets', 'admin-ui.widgets')->name('admin.widgets');
Route::view('/admin-ui/x-editable', 'admin-ui.x-editable')->name('admin.x-editable');
