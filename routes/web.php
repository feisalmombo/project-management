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

// Route for Login view
Route::get('/', function () {
    if (\Auth::user()) {
        return redirect()->back();
    }
    return view('auth.login');
});

// Login Route Controller
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('/customerregister', 'CustomersController@index');
Route::post('/customerregister', 'CustomersController@store');

// Logout Route Controller
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route for New view/blade user change password
Route::get('/change_password', function () {
    return view('auth.passwords.new_user_change_pwd');
});

// ChangePassword Route Controller
Route::post('/change_password', 'ChangePasswordController@updateNewuser');


Route::resource('/change-password', 'ChangePasswordController');
Route::post('/change-password', 'ChangePasswordController@update');

// Route for CheckUserStatus Middleware
Route::group(['middleware' => 'CheckUserStatus'], function () {

    // Route for ValidateButtonHistory Middleware
    Route::group(['middleware' => 'ValidateButtonHistory'], function () {

    // Route for Auth Middleware
    Route::group(['middleware' => 'auth'], function () {

    // Home Route Controller
    Route::get('/home', 'HomeController@index')->name('home');

    // ViewUser Route Controller
    Route::resource('/view-users', 'ViewUsersController');
    Route::post('/view-users', 'ViewUsersController@store');
    Route::get('/reset/{id}', 'ViewUsersController@resetpwd');

    // Route for PurchaseOrdersController
    Route::resource('/purchase/order', 'PurchaseOrdersController');
    Route::post('/purchase/order', 'PurchaseOrdersController@store');

            // ===================== PROJECTS ======================
    Route::resource('/projects', 'ProjectController');

	Route::get('/projects', 'ProjectController@index')->name('project.show');

	Route::get('/projects/create', 'ProjectController@create')->name('project.create');

	Route::get('/projects/edit/{id}', 'ProjectController@edit')->name('project.edit');

	Route::post('/projects/update/{id}', 'ProjectController@update')->name('project.update');

	Route::get('/projects/delete/{id}', 'ProjectController@destroy')->name('project.delete');

	// Store the new project from the form posted with the view Above
	Route::post('/projects/store', 'ProjectController@store')->name('project.store');



	// ====================  TASKS =======================
    Route::resource('/tasks','TaskController');

	Route::get('/tasks','TaskController@index')->name('task.show');

	Route::get('/tasks/view/{id}','TaskController@view')->name('task.view');

	// Display the Create Task View form
	Route::get('/tasks/create', 'TaskController@create')->name('task.create');

	// Store the new task from the form posted with the view Above
	Route::post('/tasks/store', 'TaskController@store')->name('task.store');

	// Search view
	Route::get('/tasks/search', 'TaskController@searchTask')->name('task.search');

	// Sort Table
	Route::get('/tasks/sort/{key}', 'TaskController@sort')->name('task.sort');

	Route::get('/tasks/edit/{id}','TaskController@edit')->name('task.edit');


	Route::get('/tasks/list/{projectid}','TaskController@tasklist')->name('task.list');
	Route::get('/tasks/delete/{id}', 'TaskController@destroy')->name('task.delete') ;
	Route::get('/tasks/deletefile/{id}', 'TaskController@deleteFile')->name('task.deletefile');
	Route::post('/tasks/update/{id}', 'TaskController@update')->name('task.update');
	Route::get('/tasks/completed/{id}','TaskController@completed')->name('task.completed');


    // Route for Notification Controller
    Route::resource('/notifications', 'NotificationController');

    // ROUTES FOR PERMISSIONS
    // Call entrust users view
    Route::get('/settings/manage_users/permissions/entrust_user', 'PermissionsController@entrust_user');
    // Get all permissions for specific user
    Route::get('/settings/manage_users/permissions/entrust', 'PermissionsController@entrust');
    // Entrust user route
    Route::post('/settings/manage_users/permissions/entrust_usr', 'PermissionsController@entrust_user_permissions');
    // Get permission for role
    Route::get('/settings/manage_users/permissions/entrustRole', 'PermissionsController@entrust_roles');
    // Route to entrust permissions to the role
    Route::post('/settings/manage_users/permissions/entrust_role_permissions', 'PermissionsController@entrust_role_permissions');
    // Call roles view
    Route::get('/settings/manage_users/permissions/entrust_role', 'PermissionsController@entrust_role');
    Route::resource('/settings/manage_users/permissions/', 'PermissionsController');

    // ROUTES FOR ROLES
    Route::get('/settings/manage_users/roles/entrust', 'RolesController@get_roles');
    Route::post('/settings/manage_users/roles/entrust', 'RolesController@post_roles');
    Route::get('/settings/manage_users/roles/add', 'RolesController@add');
    Route::resource('/settings/manage_users/roles', 'RolesController');
    });
    });
});
