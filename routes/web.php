<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['as' => 'landing.index', 'uses' => 'App\Http\Controllers\LandingController@index']);
Route::get('/job', ['as' => 'landing.job', 'uses' => 'App\Http\Controllers\LandingController@job']);
Route::get('/job/detail/{id}', ['as' => 'landing.job.detail', 'uses' => 'App\Http\Controllers\LandingController@jobDetail']);
Route::post('/apply', ['as' => 'landing.apply', 'uses' => 'App\Http\Controllers\LandingController@apply']);

Route::get('jobalumni', function() {
    return view('landing.layouts.maintenance');
});
// Route::get('/job', function() {
//     return view('landing.job');
// });
// Route::get('/job/detail', function() {
//     return view('landing.job-detail');
// });
Route::get('/internship', function() {
    return view('landing.layouts.maintenance');
});
Route::get('/faq    ', function() {
    return view('landing.layouts.maintenance');
});
Route::get('/fill-data', function() {
    return view('landing.layouts.maintenance');
});

Route::get('/admin/', function () {
    return redirect('/admin/dashboard');
    // return redirect('/admin/statistic_builder/dashboard');
});
