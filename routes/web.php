<?php

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

// User Routes



Route::group(['middleware' => ['web']] , function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
// For All Buildings
    Route::get('/showAllBuildings', 'BuController@showAllEnabled');
// For Single Building
    Route::get('/showBu/{id}', 'BuController@showBu');

    Route::get('/forRent', 'BuController@showRent');
    Route::get('/forBuy', 'BuController@showBuy');
    Route::get('/type/{type}', 'BuController@showByType');
    Route::get('/search', 'BuController@search');
    Route::post('/search', 'BuController@search');
    Route::get('/ajax/bu/information','BuController@getAjaxInfo');
    Route::get('/contact','Contact_Controller@contact');
    Route::post('/contact','Contact_Controller@store');
    Route::get('/user/create/bu','Bu_Controller@userAddBu');
    Route::post('/user/create/bu','Bu_Controller@userCreateBu');
    Route::get('/user/show/bu','Bu_Controller@userShowBu');
    Route::get('/user/edit/info','Users_Controller@editUser')->middleware('auth');
    Route::patch('/user/{id}/update', ['as' => 'user.info.update', 'uses' => 'Users_Controller@updateUser'])->middleware('auth');
    Route::get('جعفر', function (){
        echo '<h1 style="text-align: center;margin-top: 20%;color: teal;border: 3px solid #afb42b;border-radius: 20%;box-shadow:0 3px 3px grey;">مع تحيات المبرمج جعفر</h1>';
    });

});



Route::group(['middleware' => ['web' , 'admin']] , function (){
    // Admin Panel ONE

    //data tables ajax
    Route::get('/adminpanel/users/data', ['as' => 'adminpanel.users.data', 'uses' => 'UsersController@DataTablesData']);
    Route::get('/adminpanel/bu/data', ['as' => 'adminpanel.bu.data', 'uses' => 'BuController@DataTablesData']);

    Route::get('/adminpanel/bu/data', ['as' => 'adminpanel.bu.data', 'uses' => 'BuController@DataTablesData']);

    Route::get('/adminpanel','AdminController@index');

    //For Control Users
    Route::resource('/adminpanel/users','UsersController');
    Route::get('/adminpanel/users/create','UsersController@create');
    Route::post('/adminpanel/users/create','UsersController@store');
    Route::get('/adminpanel/users/{id}/edit','UsersController@edit');
    Route::patch('/adminpanel/users/{id}/update', ['as' => 'adminpanel.users.update', 'uses' => 'UsersController@update']);
    
    //Route::patch('/adminpanel/users/{id}/update', 'UsersController@update')->name('adminpanel.users.update');

    Route::get('/adminpanel/users/{id}/delete','UsersController@delete');

    Route::post('adminpanel/users/changepassword/','UsersController@changePassword');

    // For SiteSetting
    Route::get('/adminpanel/sitesetting','SiteSettingController@index');
    Route::post('/adminpanel/sitesetting','SiteSettingController@store');

    // For Control Buildings
    Route::get('/adminpanel/bu','BuController@index');
    Route::get('/adminpanel/bu/create','BuController@create');
    Route::post('/adminpanel/bu/create','BuController@store');
    Route::get('/adminpanel/bu/{id}/edit','BuController@edit');
    Route::patch('/adminpanel/bu/{id}/update', 'BuController@update')->name('adminpanel.bu.update');
    Route::get('/adminpanel/bu/{id}/delete','BuController@delete');



    //Admin Panel TWO (NEW) ...



    //data tables ajax
    Route::get('/admin_panel/users/data', ['as' => 'admin_panel.users.data', 'uses' => 'Users_Controller@DataTablesData']);
    Route::get('/admin_panel/bu/data', ['as' => 'admin_panel.bu.data', 'uses' => 'Bu_Controller@DataTablesData']);
    Route::get('/admin_panel/contact/data', ['as' => 'admin_panel.contact.data', 'uses' => 'Contact_Controller@DataTablesData']);

    Route::get('/admin_panel/bu/data', ['as' => 'admin_panel.bu.data', 'uses' => 'Bu_Controller@DataTablesData']);

    //Index
    Route::get('/admin_panel','Admin_Controller@index');

    //For Control Users
    Route::resource('/admin_panel/users','Users_Controller');
    Route::get('/admin_panel/users/create','Users_Controller@create');
    Route::post('/admin_panel/users/create','Users_Controller@store');
    Route::get('/admin_panel/users/{id}/edit','Users_Controller@edit');
    Route::patch('/admin_panel/users/{id}/update', ['as' => 'admin_panel.users.update', 'uses' => 'Users_Controller@update']);

    //Route::patch('/admin_panel/users/{id}/update', 'Users_Controller@update')->name('admin_panel.users.update');

    Route::get('/admin_panel/users/{id}/delete','Users_Controller@delete');

    Route::post('admin_panel/users/changepassword/','Users_Controller@changePassword');

    // For SiteSetting
    Route::get('/admin_panel/sitesetting','SiteSetting_Controller@index');
    Route::post('/admin_panel/sitesetting','SiteSetting_Controller@store');

    // For Control Buildings
    Route::get('/admin_panel/bu','Bu_Controller@index');
    Route::get('/admin_panel/bu/create','Bu_Controller@create');
    Route::post('/admin_panel/bu/create','Bu_Controller@store');
    Route::get('/admin_panel/bu/{id}/edit','Bu_Controller@edit');
    Route::patch('/admin_panel/bu/{id}/update', 'Bu_Controller@update')->name('admin_panel.bu.update');
    Route::get('/admin_panel/bu/{id}/delete','Bu_Controller@delete');

    //For Control Contacts
    Route::get('/admin_panel/contact','Contact_Controller@index');
    Route::get('/admin_panel/contact/{id}/edit','Contact_Controller@edit');
    Route::patch('/admin_panel/contact/{id}/update', ['as' => 'admin_panel.contact.update', 'uses' => 'Contact_Controller@update']);

    //Route::patch('/admin_panel/users/{id}/update', 'Users_Controller@update')->name('admin_panel.users.update');

    Route::get('/admin_panel/contact/{id}/delete','Contact_Controller@delete');
    
    Route::get('/admin_panel/contact/markAllSeen','Contact_Controller@AllSeen');
});




// Any Routes
Route::any('{slug}', function($slug)
{
    //do whatever you want with the slug
    return redirect('login');
})->where('slug', '([A-z\d-\/_.]+)?');
