<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenulistController;
use App\Http\Controllers\ApplinkController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FranchiseeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BankController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.app-login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/menulist', [MenulistController::class, 'index'])->middleware(['auth'])->name('menulist');
Route::get('/dashboard', [MenulistController::class, 'table'])->middleware(['auth'])->name('dashboard');


//menu
Route::get('/menu/table', [MenuController::class, 'table'])->middleware(['auth'])->name('data.table');
Route::get('/menu/deactive/{id}', [MenuController::class, 'deactive'])->middleware(['auth'])->name('menu.deactive');
Route::get('/menu/active/{id}', [MenuController::class, 'active'])->middleware(['auth'])->name('menu.active');
Route::get('/menu/delete/{id}', [MenuController::class, 'delete'])->middleware(['auth'])->name('menu.delete');
Route::get('/menu/create', function () {
    return view('admin.menu.create');
})->middleware(['auth'])->name('menu.create');
Route::post('/menu/addmenu', ['as' => '/menu/addmenu', 'uses' => 'App\Http\Controllers\MenuController@addmenu']);
Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->middleware(['auth'])->name('menu.edit');
Route::post('/menu/update', ['as' => '/menu/update/', 'uses' => 'App\Http\Controllers\MenuController@update']);


//submenu
Route::get('/submenu/table', [SubmenuController::class, 'table'])->middleware(['auth'])->name('submenu.table');
Route::get('/submenu/create', [SubmenuController::class, 'create'])->middleware(['auth'])->name('submenu.create');
Route::get('/submenu/deactive/{id}', [SubmenuController::class, 'deactive'])->middleware(['auth'])->name('submenu.deactive');
Route::get('/submenu/active/{id}', [SubmenuController::class, 'active'])->middleware(['auth'])->name('submenu.active');
Route::get('/submenu/delete/{id}', [SubmenuController::class, 'delete'])->middleware(['auth'])->name('submenu.delete');
Route::post('/submenu/addsubmenu', ['as' => '/submenu/addsubmenu', 'uses' => 'App\Http\Controllers\SubmenuController@addsubmenu']);
Route::get('/submenu/edit/{id}', [SubmenuController::class, 'edit'])->middleware(['auth'])->name('submenu.edit');
Route::post('/submenu/update', ['as' => '/submenu/update/', 'uses' => 'App\Http\Controllers\SubmenuController@update']);

//user/staff
Route::get('/staff/table', [StaffController::class, 'table'])->middleware(['auth'])->name('staff.table');
Route::get('/staff/view/{id}', [StaffController::class, 'view'])->middleware(['auth'])->name('staff.view');
Route::get('/staff/create', [StaffController::class, 'create'])->middleware(['auth'])->name('staff.create');
Route::get('/staff/deactive/{id}', [StaffController::class, 'deactive'])->middleware(['auth'])->name('staff.deactive');
Route::get('/staff/active/{id}', [StaffController::class, 'active'])->middleware(['auth'])->name('staff.active');
Route::get('/staff/delete/{id}', [StaffController::class, 'delete'])->middleware(['auth'])->name('staff.delete');
Route::post('/staff/addsubmenu', ['as' => '/staff/addsubmenu', 'uses' => 'App\Http\Controllers\StaffController@addsubmenu'])->name('staff.addsubmenu');
Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->middleware(['auth'])->name('staff.edit');
Route::post('/staff/update', ['as' => '/staff/update', 'uses' => 'App\Http\Controllers\StaffController@update']);

//user/franchisee
Route::get('/franchisee/table', [FranchiseeController::class, 'table'])->middleware(['auth'])->name('franchisee.table');
Route::get('/franchisee/view/{id}', [FranchiseeController::class, 'view'])->middleware(['auth'])->name('franchisee.view');
Route::get('/franchisee/create', [FranchiseeController::class, 'create'])->middleware(['auth'])->name('franchisee.create');
Route::get('/franchisee/deactive/{id}', [FranchiseeController::class, 'deactive'])->middleware(['auth'])->name('franchisee.deactive');
Route::get('/franchisee/active/{id}', [FranchiseeController::class, 'active'])->middleware(['auth'])->name('franchisee.active');
Route::get('/franchisee/delete/{id}', [FranchiseeController::class, 'delete'])->middleware(['auth'])->name('franchisee.delete');
Route::post('/franchisee/addsubmenu', ['as' => '/franchisee/addsubmenu', 'uses' => 'App\Http\Controllers\FranchiseeController@addsubmenu'])->name('franchisee.addsubmenu');
Route::get('/franchisee/edit/{id}', [FranchiseeController::class, 'edit'])->middleware(['auth'])->name('franchisee.edit');
Route::post('/franchisee/update', ['as' => '/franchisee/update', 'uses' => 'App\Http\Controllers\FranchiseeController@update']);

//user/vendor
Route::get('/vendor/table', [VendorController::class, 'table'])->middleware(['auth'])->name('vendor.table');
Route::get('/vendor/view/{id}', [VendorController::class, 'view'])->middleware(['auth'])->name('vendor.view');
Route::get('/vendor/create', [VendorController::class, 'create'])->middleware(['auth'])->name('vendor.create');
Route::get('/vendor/deactive/{id}', [VendorController::class, 'deactive'])->middleware(['auth'])->name('vendor.deactive');
Route::get('/vendor/active/{id}', [VendorController::class, 'active'])->middleware(['auth'])->name('vendor.active');
Route::get('/vendor/delete/{id}', [VendorController::class, 'delete'])->middleware(['auth'])->name('vendor.delete');
Route::post('/vendor/addsubmenu', ['as' => '/vendor/addsubmenu', 'uses' => 'App\Http\Controllers\VendorController@addsubmenu'])->name('vendor.addsubmenu');
Route::get('/vendor/edit/{id}', [VendorController::class, 'edit'])->middleware(['auth'])->name('vendor.edit');
Route::post('/vendor/update', ['as' => '/vendor/update', 'uses' => 'App\Http\Controllers\VendorController@update']);

//Report
Route::get('/preport/table', [BankController::class, 'table'])->middleware(['auth'])->name('preport.table');
Route::get('/preport/initate/{id}', [BankController::class, 'initate'])->middleware(['auth'])->name('preport.initate');
Route::get('/preport/process/{id}', [BankController::class, 'process'])->middleware(['auth'])->name('preport.process');
Route::get('/preport/approve/{id}', [BankController::class, 'approve'])->middleware(['auth'])->name('preport.approve');
Route::get('/preport/reject/{id}', [BankController::class, 'reject'])->middleware(['auth'])->name('preport.reject');

//cc
Route::get('/preport/tablecc', [BankController::class, 'tablecc'])->middleware(['auth'])->name('preport.tablecc');
Route::get('/preport/initatecc/{id}', [BankController::class, 'initatecc'])->middleware(['auth'])->name('preport.initatecc');
Route::get('/preport/processcc/{id}', [BankController::class, 'processcc'])->middleware(['auth'])->name('preport.processcc');
Route::get('/preport/approvecc/{id}', [BankController::class, 'approvecc'])->middleware(['auth'])->name('preport.approvecc');
Route::get('/preport/rejectcc/{id}', [BankController::class, 'rejectcc'])->middleware(['auth'])->name('preport.rejectcc');

//demat
Route::get('/preport/tabledemat', [BankController::class, 'tabledemat'])->middleware(['auth'])->name('preport.tabledemat');
Route::get('/preport/initatedemat/{id}', [BankController::class, 'initatedemat'])->middleware(['auth'])->name('preport.initatedemat');
Route::get('/preport/processdemat/{id}', [BankController::class, 'processdemat'])->middleware(['auth'])->name('preport.processdemat');
Route::get('/preport/approvedemat/{id}', [BankController::class, 'approvedemat'])->middleware(['auth'])->name('preport.approvedemat');
Route::get('/preport/rejectdemat/{id}', [BankController::class, 'rejectdemat'])->middleware(['auth'])->name('preport.rejectdemat');

//crypto
Route::get('/preport/tablecrypto', [BankController::class, 'tablecrypto'])->middleware(['auth'])->name('preport.tablecrypto');
Route::get('/preport/initatecrypto/{id}', [BankController::class, 'initatecrypto'])->middleware(['auth'])->name('preport.initatecrypto');
Route::get('/preport/processcrypto/{id}', [BankController::class, 'processcrypto'])->middleware(['auth'])->name('preport.processcrypto');
Route::get('/preport/approvecrypto/{id}', [BankController::class, 'approvecrypto'])->middleware(['auth'])->name('preport.approvecrypto');
Route::get('/preport/rejectcrypto/{id}', [BankController::class, 'rejectcrypto'])->middleware(['auth'])->name('preport.rejectcrypto');

//loan
Route::get('/preport/tableloan', [BankController::class, 'tableloan'])->middleware(['auth'])->name('preport.tableloan');
Route::get('/preport/initateloan/{id}', [BankController::class, 'initateloan'])->middleware(['auth'])->name('preport.initateloan');
Route::get('/preport/processloan/{id}', [BankController::class, 'processloan'])->middleware(['auth'])->name('preport.processloan');
Route::get('/preport/approveloan/{id}', [BankController::class, 'approveloan'])->middleware(['auth'])->name('preport.approveloan');
Route::get('/preport/rejectloan/{id}', [BankController::class, 'rejectloan'])->middleware(['auth'])->name('preport.rejectloan');

//onboarding
Route::get('/preport/tableonboarding', [BankController::class, 'tableonboarding'])->middleware(['auth'])->name('preport.tableonboarding');
Route::get('/preport/initateonboarding/{id}', [BankController::class, 'initateonboarding'])->middleware(['auth'])->name('preport.initateonboarding');
Route::get('/preport/processonboarding/{id}', [BankController::class, 'processonboarding'])->middleware(['auth'])->name('preport.processonboarding');
Route::get('/preport/approveonboarding/{id}', [BankController::class, 'approveonboarding'])->middleware(['auth'])->name('preport.approveonboarding');
Route::get('/preport/rejectonboarding/{id}', [BankController::class, 'rejectonboarding'])->middleware(['auth'])->name('preport.rejectonboarding');

//govt
Route::get('/preport/tablegovt', [BankController::class, 'tablegovt'])->middleware(['auth'])->name('preport.tablegovt');
Route::get('/preport/initategovt/{id}', [BankController::class, 'initategovt'])->middleware(['auth'])->name('preport.initategovt');
Route::get('/preport/processgovt/{id}', [BankController::class, 'processgovt'])->middleware(['auth'])->name('preport.processgovt');
Route::get('/preport/approvegovt/{id}', [BankController::class, 'approvegovt'])->middleware(['auth'])->name('preport.approvegovt');
Route::get('/preport/rejectgovt/{id}', [BankController::class, 'rejectgovt'])->middleware(['auth'])->name('preport.rejectgovt');

//loann
Route::get('/preport/tableloann', [BankController::class, 'tableloann'])->middleware(['auth'])->name('preport.tableloann');
Route::get('/preport/initateloann/{id}', [BankController::class, 'initateloann'])->middleware(['auth'])->name('preport.initateloann');
Route::get('/preport/processloann/{id}', [BankController::class, 'processloann'])->middleware(['auth'])->name('preport.processloann');
Route::get('/preport/approveloann/{id}', [BankController::class, 'approveloann'])->middleware(['auth'])->name('preport.approveloann');
Route::get('/preport/rejectloann/{id}', [BankController::class, 'rejectloann'])->middleware(['auth'])->name('preport.rejectloann');
Route::get('/preport/viewloann/{id}', [BankController::class, 'viewloann'])->middleware(['auth'])->name('preport.viewloann');



//About Us
Route::get('/about/table', [MenulistController::class, 'table'])->middleware(['auth'])->name('about.table');
Route::get('/about/deactive/{id}', [MenulistController::class, 'deactive'])->middleware(['auth'])->name('about.deactive');
Route::get('/about/active/{id}', [MenulistController::class, 'active'])->middleware(['auth'])->name('about.active');
Route::get('/about/delete/{id}', [MenulistController::class, 'delete'])->middleware(['auth'])->name('about.delete');
Route::get('/about/create', function () {return view('frontend.abouts.create');})->middleware(['auth'])->name('about.create');
Route::post('/about/addabout', ['as' => '/about/addabout', 'uses' => 'App\Http\Controllers\MenulistController@addabout']);
Route::get('/about/edit/{id}', [MenulistController::class, 'edit'])->middleware(['auth'])->name('about.edit');
Route::post('/about/update', ['as' => '/about/update/', 'uses' => 'App\Http\Controllers\MenulistController@update']);

//setting
Route::get('/setting/table', [ApplinkController::class, 'table'])->middleware(['auth'])->name('setting.table');
Route::get('/setting/deactive/{id}', [ApplinkController::class, 'deactive'])->middleware(['auth'])->name('setting.deactive');
Route::get('/setting/active/{id}', [ApplinkController::class, 'active'])->middleware(['auth'])->name('setting.active');
Route::get('/setting/delete/{id}', [ApplinkController::class, 'delete'])->middleware(['auth'])->name('setting.delete');
Route::get('/setting/create', function () {
    return view('frontend.abouts.create');
})->middleware(['auth'])->name('setting.create');
Route::post('/setting/addabout', ['as' => '/setting/addabout', 'uses' => 'App\Http\Controllers\ApplinkController@addabout']);
Route::get('/setting/edit/{id}', [ApplinkController::class, 'edit'])->middleware(['auth'])->name('setting.edit');
Route::post('/setting/update', ['as' => '/setting/update/', 'uses' => 'App\Http\Controllers\ApplinkController@update']);

//Banner
Route::get('/banner/table', 'App\Http\Controllers\BannerController@table')->middleware(['auth'])->name('banner.table');
Route::get('/banner/deactive/{id}', 'App\Http\Controllers\BannerController@deactive')->middleware(['auth'])->name('banner.deactive');
Route::get('/banner/active/{id}', 'App\Http\Controllers\BannerController@active')->middleware(['auth'])->name('banner.active');
Route::get('/banner/delete/{id}', 'App\Http\Controllers\BannerController@delete')->middleware(['auth'])->name('banner.delete');
Route::get('/banner/edit/{id}', 'App\Http\Controllers\BannerController@edit')->middleware(['auth'])->name('banner.edit');
Route::get('/banner/create', function () {
    return view('frontend.abouts.create');
})->middleware(['auth'])->name('banner.create');
Route::post('/banner/addabout', ['as' => '/banner/addabout', 'uses' => 'App\Http\Controllers\BannerController@addabout']);
Route::post('/banner/update', ['as' => '/banner/update/', 'uses' => 'App\Http\Controllers\BannerController@update']);

//Contact

Route::get('/contact/table', 'App\Http\Controllers\ContactController@table')->middleware(['auth'])->name('contact.table');
Route::get('/contact/deactive/{id}', 'App\Http\Controllers\ContactController@deactive')->middleware(['auth'])->name('contact.deactive');
Route::get('/contact/active/{id}', 'App\Http\Controllers\ContactController@active')->middleware(['auth'])->name('contact.active');
Route::get('/contact/delete/{id}', 'App\Http\Controllers\ContactController@delete')->middleware(['auth'])->name('contact.delete');
Route::get('/contact/edit/{id}', 'App\Http\Controllers\ContactController@edit')->middleware(['auth'])->name('contact.edit');
Route::get('/contact/create', function () {
    return view('frontend.abouts.create');
})->middleware(['auth'])->name('contact.create');
Route::post('/contact/addabout', ['as' => '/contact/addabout', 'uses' => 'App\Http\Controllers\ContactController@addabout']);
Route::post('/contact/update', ['as' => '/contact/update/', 'uses' => 'App\Http\Controllers\ContactController@update']);

//Disclimer

Route::get('/disclimer/table', 'App\Http\Controllers\DisclimerController@table')->middleware(['auth'])->name('disclimer.table');
Route::get('/disclimer/deactive/{id}', 'App\Http\Controllers\DisclimerController@deactive')->middleware(['auth'])->name('disclimer.deactive');
Route::get('/disclimer/active/{id}', 'App\Http\Controllers\DisclimerController@active')->middleware(['auth'])->name('disclimer.active');
Route::get('/disclimer/delete/{id}', 'App\Http\Controllers\DisclimerController@delete')->middleware(['auth'])->name('disclimer.delete');
Route::get('/disclimer/edit/{id}', 'App\Http\Controllers\DisclimerController@edit')->middleware(['auth'])->name('disclimer.edit');
Route::get('/disclimer/create', function () {
    return view('frontend.abouts.create');
})->middleware(['auth'])->name('disclimer.create');
Route::post('/disclimer/addabout', ['as' => '/disclimer/addabout', 'uses' => 'App\Http\Controllers\DisclimerController@addabout']);
Route::post('/disclimer/update', ['as' => '/disclimer/update/', 'uses' => 'App\Http\Controllers\DisclimerController@update']);

// NewUpdate
Route::get('/newupdate/table', 'App\Http\Controllers\NewupdateController@table')->middleware(['auth'])->name('newupdate.table');
Route::get('/newupdate/deactive/{id}', 'App\Http\Controllers\NewupdateController@deactive')->middleware(['auth'])->name('newupdate.deactive');
Route::get('/newupdate/active/{id}', 'App\Http\Controllers\NewupdateController@active')->middleware(['auth'])->name('newupdate.active');
Route::get('/newupdate/delete/{id}', 'App\Http\Controllers\NewupdateController@delete')->middleware(['auth'])->name('newupdate.delete');
Route::get('/newupdate/edit/{id}', 'App\Http\Controllers\NewupdateController@edit')->middleware(['auth'])->name('newupdate.edit');
Route::get('/newupdate/create', function () {
    return view('frontend.newupdate.create');
})->middleware(['auth'])->name('newupdate.create');
Route::post('/newupdate/addabout', ['as' => '/newupdate/addabout', 'uses' => 'App\Http\Controllers\NewupdateController@addabout']);
Route::post('/newupdate/update', ['as' => '/newupdate/update/', 'uses' => 'App\Http\Controllers\NewupdateController@update']);

//Policy

Route::get('/policy/table', 'App\Http\Controllers\PolicieController@table')->middleware(['auth'])->name('policy.table');
Route::get('/policy/deactive/{id}', 'App\Http\Controllers\PolicieController@deactive')->middleware(['auth'])->name('policy.deactive');
Route::get('/policy/active/{id}', 'App\Http\Controllers\PolicieController@active')->middleware(['auth'])->name('policy.active');
Route::get('/policy/delete/{id}', 'App\Http\Controllers\PolicieController@delete')->middleware(['auth'])->name('policy.delete');
Route::get('/policy/edit/{id}', 'App\Http\Controllers\PolicieController@edit')->middleware(['auth'])->name('policy.edit');
Route::get('/policy/create', function () {
    return view('frontend.policy.create');
})->middleware(['auth'])->name('policy.create');
Route::post('/policy/addabout', ['as' => '/policy/addabout', 'uses' => 'App\Http\Controllers\PolicieController@addabout']);
Route::post('/policy/update', ['as' => '/policy/update/', 'uses' => 'App\Http\Controllers\PolicieController@update']);

//Product

Route::get('/product/table', 'App\Http\Controllers\ProductController@table')->middleware(['auth'])->name('product.table');
Route::get('/product/deactive/{id}', 'App\Http\Controllers\ProductController@deactive')->middleware(['auth'])->name('product.deactive');
Route::get('/product/active/{id}', 'App\Http\Controllers\ProductController@active')->middleware(['auth'])->name('product.active');
Route::get('/product/delete/{id}', 'App\Http\Controllers\ProductController@delete')->middleware(['auth'])->name('product.delete');
Route::get('/product/edit/{id}', 'App\Http\Controllers\ProductController@edit')->middleware(['auth'])->name('product.edit');
Route::get('/product/create', function () {
    return view('frontend.product.create');
})->middleware(['auth'])->name('product.create');
Route::post('/product/addabout', ['as' => '/product/addabout', 'uses' => 'App\Http\Controllers\ProductController@addabout']);
Route::post('/product/update', ['as' => '/product/update/', 'uses' => 'App\Http\Controllers\ProductController@update']);

//Youtube

Route::get('/youtube/table', 'App\Http\Controllers\YoutubeController@table')->middleware(['auth'])->name('youtube.table');
Route::get('/youtube/deactive/{id}', 'App\Http\Controllers\YoutubeController@deactive')->middleware(['auth'])->name('youtube.deactive');
Route::get('/youtube/active/{id}', 'App\Http\Controllers\YoutubeController@active')->middleware(['auth'])->name('youtube.active');
Route::get('/youtube/delete/{id}', 'App\Http\Controllers\YoutubeController@delete')->middleware(['auth'])->name('youtube.delete');
Route::get('/youtube/edit/{id}', 'App\Http\Controllers\YoutubeController@edit')->middleware(['auth'])->name('youtube.edit');
Route::get('/youtube/create', function () {
    return view('frontend.youtube.create');
})->middleware(['auth'])->name('youtube.create');
Route::post('/youtube/addabout', ['as' => '/youtube/addabout', 'uses' => 'App\Http\Controllers\YoutubeController@addabout']);
Route::post('/youtube/update', ['as' => '/youtube/update/', 'uses' => 'App\Http\Controllers\YoutubeController@update']);

// //Submenu

// Route::get('/submenu/table', 'App\Http\Controllers\SubmenuController@table')->middleware(['auth'])->name('submenu.table');
// Route::get('/submenu/create', 'App\Http\Controllers\SubmenuController@create')->middleware(['auth'])->name('submenu.create');
// Route::get('/submenu/deactive/{id}', 'App\Http\Controllers\SubmenuController@deactive')->middleware(['auth'])->name('submenu.deactive');
// Route::get('/submenu/active/{id}', 'App\Http\Controllers\SubmenuController@active')->middleware(['auth'])->name('submenu.active');
// Route::get('/submenu/delete/{id}', 'App\Http\Controllers\SubmenuController@delete')->middleware(['auth'])->name('submenu.delete');
// Route::get('/submenu/edit/{id}', 'App\Http\Controllers\SubmenuController@edit')->middleware(['auth'])->name('submenu.edit');
// Route::post('/submenu/addabout', ['as' => '/submenu/addabout', 'uses' => 'App\Http\Controllers\SubmenuController@addabout']);
// Route::post('/submenu/update', ['as' => '/submenu/update/', 'uses' => 'App\Http\Controllers\SubmenuController@update']);

//Category

Route::get('/category/table', 'App\Http\Controllers\CategorieController@table')->middleware(['auth'])->name('category.table');
Route::get('/category/create', 'App\Http\Controllers\CategorieController@create')->middleware(['auth'])->name('category.create');
Route::get('/category/deactive/{id}', 'App\Http\Controllers\CategorieController@deactive')->middleware(['auth'])->name('category.deactive');
Route::get('/category/active/{id}', 'App\Http\Controllers\CategorieController@active')->middleware(['auth'])->name('category.active');
Route::get('/category/delete/{id}', 'App\Http\Controllers\CategorieController@delete')->middleware(['auth'])->name('category.delete');
Route::get('/category/edit/{id}', 'App\Http\Controllers\CategorieController@edit')->middleware(['auth'])->name('category.edit');
Route::post('/category/addabout', ['as' => '/category/addabout', 'uses' => 'App\Http\Controllers\CategorieController@addabout']);
Route::post('/category/update', ['as' => '/category/update/', 'uses' => 'App\Http\Controllers\CategorieController@update']);

//Combo  Expert

Route::get('/comboexpert/table', 'App\Http\Controllers\ComboexpertController@table')->middleware(['auth'])->name('comboexpert.table');
Route::get('/comboexpert/create', 'App\Http\Controllers\ComboexpertController@create')->middleware(['auth'])->name('comboexpert.create');
Route::get('/comboexpert/deactive/{id}', 'App\Http\Controllers\ComboexpertController@deactive')->middleware(['auth'])->name('comboexpert.deactive');
Route::get('/comboexpert/active/{id}', 'App\Http\Controllers\ComboexpertController@active')->middleware(['auth'])->name('comboexpert.active');
Route::get('/comboexpert/delete/{id}', 'App\Http\Controllers\ComboexpertController@delete')->middleware(['auth'])->name('comboexpert.delete');
Route::get('/comboexpert/edit/{id}', 'App\Http\Controllers\ComboexpertController@edit')->middleware(['auth'])->name('comboexpert.edit');
Route::post('/comboexpert/addabout', ['as' => '/comboexpert/addabout', 'uses' => 'App\Http\Controllers\ComboexpertController@addabout']);
Route::post('/comboexpert/update', ['as' => '/comboexpert/update/', 'uses' => 'App\Http\Controllers\ComboexpertController@update']);

//Crm

Route::get('/crm/table', 'App\Http\Controllers\CrmController@table')->middleware(['auth'])->name('crm.table');
Route::get('/crm/create', 'App\Http\Controllers\CrmController@create')->middleware(['auth'])->name('crm.create');
Route::get('/crm/deactive/{id}', 'App\Http\Controllers\CrmController@deactive')->middleware(['auth'])->name('crm.deactive');
Route::get('/crm/active/{id}', 'App\Http\Controllers\CrmController@active')->middleware(['auth'])->name('crm.active');
Route::get('/crm/delete/{id}', 'App\Http\Controllers\CrmController@delete')->middleware(['auth'])->name('crm.delete');
Route::get('/crm/edit/{id}', 'App\Http\Controllers\CrmController@edit')->middleware(['auth'])->name('crm.edit');
Route::post('/crm/addabout', ['as' => '/crm/addabout', 'uses' => 'App\Http\Controllers\CrmController@addabout']);
Route::post('/crm/update', ['as' => '/crm/update/', 'uses' => 'App\Http\Controllers\CrmController@update']);

//Festive

Route::get('/festive/table', 'App\Http\Controllers\FestiveController@table')->middleware(['auth'])->name('festive.table');
Route::get('/festive/create', 'App\Http\Controllers\FestiveController@create')->middleware(['auth'])->name('festive.create');
Route::get('/festive/deactive/{id}', 'App\Http\Controllers\FestiveController@deactive')->middleware(['auth'])->name('festive.deactive');
Route::get('/festive/active/{id}', 'App\Http\Controllers\FestiveController@active')->middleware(['auth'])->name('festive.active');
Route::get('/festive/delete/{id}', 'App\Http\Controllers\FestiveController@delete')->middleware(['auth'])->name('festive.delete');
Route::get('/festive/edit/{id}', 'App\Http\Controllers\FestiveController@edit')->middleware(['auth'])->name('festive.edit');
Route::post('/festive/addabout', ['as' => '/festive/addabout', 'uses' => 'App\Http\Controllers\FestiveController@addabout']);
Route::post('/festive/update', ['as' => '/festive/update/', 'uses' => 'App\Http\Controllers\FestiveController@update']);

//GoodMorning

Route::get('/goodmorning/table', 'App\Http\Controllers\GoodmorningController@table')->middleware(['auth'])->name('goodmorning.table');
Route::get('/goodmorning/create', 'App\Http\Controllers\GoodmorningController@create')->middleware(['auth'])->name('goodmorning.create');
Route::get('/goodmorning/deactive/{id}', 'App\Http\Controllers\GoodmorningController@deactive')->middleware(['auth'])->name('goodmorning.deactive');
Route::get('/goodmorning/active/{id}', 'App\Http\Controllers\GoodmorningController@active')->middleware(['auth'])->name('goodmorning.active');
Route::get('/goodmorning/delete/{id}', 'App\Http\Controllers\GoodmorningController@delete')->middleware(['auth'])->name('goodmorning.delete');
Route::get('/goodmorning/edit/{id}', 'App\Http\Controllers\GoodmorningController@edit')->middleware(['auth'])->name('goodmorning.edit');
Route::post('/goodmorning/addabout', ['as' => '/goodmorning/addabout', 'uses' => 'App\Http\Controllers\GoodmorningController@addabout']);
Route::post('/goodmorning/update', ['as' => '/goodmorning/update/', 'uses' => 'App\Http\Controllers\GoodmorningController@update']);

//Goodnight

Route::get('/goodnight/table', 'App\Http\Controllers\GoodnightController@table')->middleware(['auth'])->name('goodnight.table');
Route::get('/goodnight/create', 'App\Http\Controllers\GoodnightController@create')->middleware(['auth'])->name('goodnight.create');
Route::get('/goodnight/deactive/{id}', 'App\Http\Controllers\GoodnightController@deactive')->middleware(['auth'])->name('goodnight.deactive');
Route::get('/goodnight/active/{id}', 'App\Http\Controllers\GoodnightController@active')->middleware(['auth'])->name('goodnight.active');
Route::get('/goodnight/delete/{id}', 'App\Http\Controllers\GoodnightController@delete')->middleware(['auth'])->name('goodnight.delete');
Route::get('/goodnight/edit/{id}', 'App\Http\Controllers\GoodnightController@edit')->middleware(['auth'])->name('goodnight.edit');
Route::post('/goodnight/addabout', ['as' => '/goodnight/addabout', 'uses' => 'App\Http\Controllers\GoodnightController@addabout']);
Route::post('/goodnight/update', ['as' => '/goodnight/update/', 'uses' => 'App\Http\Controllers\GoodnightController@update']);

//Lic

Route::get('/lic/table', 'App\Http\Controllers\LicController@table')->middleware(['auth'])->name('lic.table');
Route::get('/lic/create', 'App\Http\Controllers\LicController@create')->middleware(['auth'])->name('lic.create');
Route::get('/lic/deactive/{id}', 'App\Http\Controllers\LicController@deactive')->middleware(['auth'])->name('lic.deactive');
Route::get('/lic/active/{id}', 'App\Http\Controllers\LicController@active')->middleware(['auth'])->name('lic.active');
Route::get('/lic/delete/{id}', 'App\Http\Controllers\LicController@delete')->middleware(['auth'])->name('lic.delete');
Route::get('/lic/edit/{id}', 'App\Http\Controllers\LicController@edit')->middleware(['auth'])->name('lic.edit');
Route::post('/lic/addabout', ['as' => '/lic/addabout', 'uses' => 'App\Http\Controllers\LicController@addabout']);
Route::post('/lic/update', ['as' => '/lic/update/', 'uses' => 'App\Http\Controllers\LicController@update']);

//Occation

Route::get('/occation/table', 'App\Http\Controllers\OccationController@table')->middleware(['auth'])->name('occation.table');
Route::get('/occation/create', 'App\Http\Controllers\OccationController@create')->middleware(['auth'])->name('occation.create');
Route::get('/occation/deactive/{id}', 'App\Http\Controllers\OccationController@deactive')->middleware(['auth'])->name('occation.deactive');
Route::get('/occation/active/{id}', 'App\Http\Controllers\OccationController@active')->middleware(['auth'])->name('occation.active');
Route::get('/occation/delete/{id}', 'App\Http\Controllers\OccationController@delete')->middleware(['auth'])->name('occation.delete');
Route::get('/occation/edit/{id}', 'App\Http\Controllers\OccationController@edit')->middleware(['auth'])->name('occation.edit');
Route::post('/occation/addabout', ['as' => '/occation/addabout', 'uses' => 'App\Http\Controllers\OccationController@addabout']);
Route::post('/occation/update', ['as' => '/occation/update/', 'uses' => 'App\Http\Controllers\OccationController@update']);

//Poster

Route::get('/poster/table', 'App\Http\Controllers\PosterController@table')->middleware(['auth'])->name('poster.table');
Route::get('/poster/create', 'App\Http\Controllers\PosterController@create')->middleware(['auth'])->name('poster.create');
Route::get('/poster/deactive/{id}', 'App\Http\Controllers\PosterController@deactive')->middleware(['auth'])->name('poster.deactive');
Route::get('/poster/active/{id}', 'App\Http\Controllers\PosterController@active')->middleware(['auth'])->name('poster.active');
Route::get('/poster/delete/{id}', 'App\Http\Controllers\PosterController@delete')->middleware(['auth'])->name('poster.delete');
Route::get('/poster/edit/{id}', 'App\Http\Controllers\PosterController@edit')->middleware(['auth'])->name('poster.edit');
Route::post('/poster/addabout', ['as' => '/poster/addabout', 'uses' => 'App\Http\Controllers\PosterController@addabout']);
Route::post('/poster/update', ['as' => '/poster/update/', 'uses' => 'App\Http\Controllers\PosterController@update']);

//User
//Route::get('/user/table', [UserController::class, 'table'])->middleware(['auth'])->name('user.table');
Route::get('/user/table', 'App\Http\Controllers\UserController@table')->middleware(['auth'])->name('user.table');
Route::get('/user/create', 'App\Http\Controllers\UserController@create')->middleware(['auth'])->name('user.create');
Route::get('/user/deactive/{id}', 'App\Http\Controllers\UserController@deactive')->middleware(['auth'])->name('user.deactive');
Route::get('/user/active/{id}', 'App\Http\Controllers\UserController@active')->middleware(['auth'])->name('user.active');
Route::get('/user/paid/{id}', 'App\Http\Controllers\UserController@paid')->middleware(['auth'])->name('user.paid');
Route::get('/user/demo/{id}', 'App\Http\Controllers\UserController@demo')->middleware(['auth'])->name('user.demo');
Route::get('/user/delete/{id}', 'App\Http\Controllers\UserController@delete')->middleware(['auth'])->name('user.delete');
Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@edit')->middleware(['auth'])->name('user.edit');
Route::post('/user/addabout', ['as' => '/user/addabout', 'uses' => 'App\Http\Controllers\UserController@addabout']);
Route::post('/user/update', ['as' => '/user/update/', 'uses' => 'App\Http\Controllers\UserController@update']);

//Birthday

Route::get('/birthday/table', 'App\Http\Controllers\BirthdayController@table')->middleware(['auth'])->name('birthday.table');
Route::get('/birthday/create', 'App\Http\Controllers\BirthdayController@create')->middleware(['auth'])->name('birthday.create');
Route::get('/birthday/deactive/{id}', 'App\Http\Controllers\BirthdayController@deactive')->middleware(['auth'])->name('birthday.deactive');
Route::get('/birthday/active/{id}', 'App\Http\Controllers\BirthdayController@active')->middleware(['auth'])->name('birthday.active');
Route::get('/birthday/delete/{id}', 'App\Http\Controllers\BirthdayController@delete')->middleware(['auth'])->name('birthday.delete');
Route::get('/birthday/edit/{id}', 'App\Http\Controllers\BirthdayController@edit')->middleware(['auth'])->name('birthday.edit');
Route::post('/birthday/addabout', ['as' => '/birthday/addabout', 'uses' => 'App\Http\Controllers\BirthdayController@addabout']);
Route::post('/birthday/update', ['as' => '/birthday/update/', 'uses' => 'App\Http\Controllers\BirthdayController@update']);


require __DIR__.'/auth.php';
