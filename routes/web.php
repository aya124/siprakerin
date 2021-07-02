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
    return redirect('login');
});

Route::get('/about', 'PagesController@showAbout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'UsersController');
Route::post('user/update', 'UsersController@update')->name('us.update');
Route::get('user/change/{id}', 'UsersController@change');
Route::post('user/passchanged', 'UsersController@passchanged')->name('uspass.update');
Route::get('user/destroy/{id}', 'UsersController@destroy')->name('user.destroyer');

Route::resource('/student', 'StudentController');

Route::resource('/industry', 'IndustryController');
Route::post('industry/update', 'IndustryController@update')->name('ind.update');
Route::get('industry/destroy/{id}', 'IndustryController@destroy');
Route::get('industry/suggestion/{id}', 'IndustryController@showSuggestion')->name('suggestion.show');

Route::resource('/teacher', 'TeacherController');
Route::post('teacher/update', 'TeacherController@update')->name('teach.update');
Route::get('teacher/destroy/{id}', 'TeacherController@destroy');

Route::resource('/status', 'StatusController');
Route::post('status/update', 'StatusController@update')->name('stat.update');
Route::get('status/destroy/{id}', 'StatusController@destroy');

Route::resource('/submission', 'SubmissionController');
Route::post('submission/update', 'SubmissionController@update')->name('sub.update');
Route::get('submission/destroy/{id}', 'SubmissionController@destroy');
Route::post('submission/uploadprocess', 'SubmissionController@uploadprocess');
// Route::post('submission/uploadprocess2', 'SubmissionController@uploadprocess2');
Route::get('submission/print/{id}', 'SubmissionController@print_pdf');
Route::get('submission/suggestion/{id}', 'SubmissionController@showInfo')->name('info.show');

Route::post('admin/role/update', 'RoleController@update')->name('ro.update');
Route::get('admin/role/destroy/{id}', 'RoleController@destroy');
Route::resource('/admin/role', 'RoleController');

Route::resource('admin/permission', 'PermissionController');
Route::post('admin/permission/update', 'PermissionController@update')->name('per.update');
Route::get('admin/permission/destroy/{id}', 'PermissionController@destroy');

Route::resource('/validation', 'ValidationController');
Route::get('/validation/update/{id}', 'ValidationController@update');
Route::get('/validation/decline/{id}', 'ValidationController@decline');
Route::get('setuju/lihat1/{id}', 'ValidationController@getFile1');
Route::get('setuju/lihat2/{id}', 'ValidationController@getFile2');
Route::get('setuju', 'ValidationController@tabsetuju')->name('tab.setuju');
Route::get('tolak', 'ValidationController@tabtolak')->name('tab.tolak');
Route::get('validation/print/{id}', 'ValidationController@pengantar_pdf');
Route::get('validation/progress', 'ValidationController@show');
Route::get('validation/recap/print', 'ValidationController@recap_pdf')->name('validation.recap');
Route::get('validation/year/data', 'ValidationController@byYear')->name('validation.byyear');

Route::resource('/profile', 'ProfileController');
Route::post('profile/update', 'ProfileController@update')->name('prof.update');
Route::get('profile/change/{id}', 'UsersController@change');
Route::post('profile/passchanged', 'ProfileController@passchanged')->name('pass.update');

Route::resource('/report', 'ReportController');
Route::get('report/progress/data', 'ReportController@progress');
Route::get('report/recap/print', 'ReportController@recap_pdf')->name('report.recap');
Route::get('unduhfile/{id}', 'ReportController@unduhFile');

Route::resource('/score', 'ScoreController');
Route::get('score/print/{id}', 'ScoreController@details_pdf');
Route::get('score/progress', 'ScoreController@show');
Route::get('score/recap/print', 'ScoreController@recap_pdf')->name('score.recap');

Route::resource('/year', 'YearController');
Route::post('year/{id}/isactive','YearController@isActive')->name('year.isactive');

Route::resource('/class', 'StudentClassController');

Route::post('add-suggestion', 'IndustryController@addSuggestion')->name('suggestion.add');
Route::post('add-info', 'SubmissionController@addInfo')->name('info.add');

Route::get('user/unlock/{id}','UsersController@Unlock')->name('user.unlock');
