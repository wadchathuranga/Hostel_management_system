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

Route::get('/', function () {
    return view('mywelcome');
});

/*----------------------------------------------------------- Student Routes Begin Here --------------------------------------------------*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//hostel list routes
Route::get('hostel_list','HomeController@hostels')->name('hostel_list');

//student hostel request routes
Route::get('hostel_request','student\std_hostelRequestController@index')->name('hostel_request');
Route::post('hostel_request_submit','student\std_hostelRequestController@save')->name('hostel_request.submit');

//contact page routes
Route::get('contact','student\std_contactMessageController@index')->name('contact');
Route::post('message_submit','student\std_contactMessageController@save')->name('request.submit');

//about page routes
Route::get('about','HomeController@about')->name('about');
/*----------------------------------------------------------- Student Routes End Here --------------------------------------------------*/



/*----------------------------------------------------------- Admin Routes Begin Here --------------------------------------------------*/
Route::prefix('admin')->group(function() {
  //login logout routes
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    //students_details routes
    Route::get('students_details_view','admin\studentDetailsController@index')->name('students_details_view');
    Route::post('students_search','admin\studentDetailsController@search')->name('students_search');
    Route::get('NewStudent','admin\studentDetailsController@addStudent')->name('NewStudent');
    Route::post('students_details_save','admin\studentDetailsController@save')->name('students_details_save');
    Route::get('students_details_view_update/{id}','admin\studentDetailsController@view_update_form');   //this id default route pass id
    Route::post('students_details_view_update/students_details_update','admin\studentDetailsController@update')->name('students_details_update');
    Route::delete('delete_student_details/{id}','admin\studentDetailsController@delete');   //this routes handle by ajax

    //hotels_details routes
    Route::get('hostels_details_view','admin\hostelDetailsController@index')->name('hostels_details_view');
    Route::post('hostels_search','admin\hostelDetailsController@search')->name('hostels_search');
    Route::post('hostels_details_save','admin\hostelDetailsController@save');   //this routes handle by ajax
    Route::put('hostels_details_update/{id}','admin\hostelDetailsController@update');   //this routes handle by ajax
    Route::delete('delete_hostel_details/{id}','admin\hostelDetailsController@delete');   //this routes handle by ajax

    //wardens_details routes
    Route::get('wardens_details_view','admin\wardenDetailsController@index')->name('wardens_details_view');
    Route::post('warden_search','admin\wardenDetailsController@search')->name('warden_search');
    Route::post('wardens_details_save','admin\wardenDetailsController@save');   //this routes handle by ajax
    Route::put('wardens_details_update/{id}','admin\wardenDetailsController@update');   //this routes handle by ajax
    Route::delete('delete_warden_details/{id}','admin\wardenDetailsController@delete');   //this routes handle by ajax

    //faculty_details routes
    Route::get('faculty_details_view','admin\facultyDetailsController@index')->name('faculty_details_view');
    Route::post('faculty_details_save','admin\facultyDetailsController@faculty_add');   //this routes handle by ajax
    Route::put('faculty_details_update/{id}','admin\facultyDetailsController@update');   //this routes handle by ajax
    Route::delete('delete_faculty_details/{id}','admin\facultyDetailsController@delete');   //this routes handle by ajax

    //hostel request process routes
    Route::get('get_hostel_request','admin\admin_hostelRequestController@admin_index')->name('get_hostel_request');
    Route::get('req_accepting/{id}','admin\admin_hostelRequestController@accepting');   //this id default route pass id
    Route::post('get_hostel_request','admin\admin_hostelRequestController@search')->name('request_search');
    Route::delete('delete_hostel_request/{id}','admin\admin_hostelRequestController@delete');   //this routes handle by ajax

    //bank record details routes
    Route::get('bank_record_details_view','admin\bankRecordController@index')->name('bank_record_details_view');
    Route::delete('delete_bank_record_details/{id}','admin\bankRecordController@delete');   //this routes handle by ajax

    //users details routes - Admin
    Route::get('user_details_view','admin\userController@index')->name('user_details_view');
    Route::post('user_details_save','admin\userController@save');   //this routes handle by ajax
    Route::delete('delete_user_details/{id}','admin\userController@delete');   //this routes handle by ajax

    //contact detail routes
    Route::get('message_view','admin\admin_contactMessageController@index')->name('message_view');
    Route::get('message_read/{id}','admin\admin_contactMessageController@read');   //this id default route pass id
    Route::delete('delete_message/{id}','admin\admin_contactMessageController@delete');   //this routes handle by ajax
});
/*------------------------------------------------------ /.Admin Routes End Here ------------------------------------------*/
