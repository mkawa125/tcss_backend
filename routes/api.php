<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api', 'jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('API')->prefix('v1')->group(function () {
    Route::post('login', 'ApiLoginController@login');

    Route::middleware(['cors', 'jwt.auth'])->group(function (){
        Route::post('contacts', 'Users\messageController@contactMessage')->name('contact-us');
        Route::post('/sendMessage', 'ApiMessageController@store')->name('sendMessage');

        Route::post('register', 'ApiRegisterController@register');
        ROute::get('logout', 'ApiLoginController@logout');

        //schools routes
        Route::get('/schools', 'ApiSchoolController@index');
        Route::post('/schools', 'ApiSchoolController@store');
        ROute::post('/schools/{school}', 'ApiSchoolController@show');
        ROute::post('/updateSchools/{school}', 'ApiSchoolController@update');
        Route::delete('/schools/{school}', 'ApiSchoolController@destroy');

        //students routes
        Route::get('/students', 'ApiStudentController@index');
        Route::post('/students', 'ApiStudentController@store');
        Route::post('/students/{student}', 'ApiStudentController@show');
        Route::post('/UpdateStudents/{student}', 'ApiStudentController@update');
        Route::delete('/students/{student}', 'ApiStudentController@destroy');

    });
});

