<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('/username', function () {
    return "Tossapon";
});

Route::get('/username/{name}', function ($name) {
    return "Username = " . $name;
});

Route::get('/index', function() {
    $message = "indexPage";
    $genders[] = ['id' => '1', 'name' => 'male'];
    $genders[] = ['id' => '2', 'name' => 'female'];
    return view('index', ['title' => $message, 'showgenders' => $genders]);
});

Route::get('/store', function( Request $request ) {
    return $request;
    return "Login Success";
});

Route::post('/store', function( Request $request ) {
    return $request;
});

Route::get('/task/create', function() {
    $types[] = ['id' => 1, 'name' => 'Support'];
    $types[] = ['id' => 2, 'name' => 'Maintenance'];
    $types[] = ['id' => 3, 'name' => 'Change Requirement'];

    $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
    $statuses[] = ['id' => 1, 'name' => 'Completed'];

    return view('tasks.create', ['types' => $types, 'statuses' => $statuses]);
});
