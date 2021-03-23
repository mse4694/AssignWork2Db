<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

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

Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/tasks', [TaskController::class, 'create']);

Route::get('/task/{id}', [TaskController::class, 'edit']);

Route::put('/task/{id}', [TaskController::class, 'update']);

Route::patch( '/task/{task}', [TaskController::class, 'updateStatus']);

Route::delete( '/task/{task}', [TaskController::class, 'destroy']);

Route::post('/task/store', [TaskController::class, 'store']);

// Route::get('/task/create', function() {
//     $types[] = ['id' => 1, 'name' => 'Support'];
//     $types[] = ['id' => 2, 'name' => 'Maintenance'];
//     $types[] = ['id' => 3, 'name' => 'Change Requirement'];

//     $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
//     $statuses[] = ['id' => 1, 'name' => 'Completed'];

//     return view('tasks.create', ['types' => $types, 'statuses' => $statuses]);
// });



// Route::get('/task/{id}', function($id) {

//     $types[] = ['id' => 1, 'name' => 'Support'];
//     $types[] = ['id' => 2, 'name' => 'Maintenance'];
//     $types[] = ['id' => 3, 'name' => 'Change Requirement'];

//     $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
//     $statuses[] = ['id' => 1, 'name' => 'Completed'];

//     $task = App\Models\Task::find($id);
//     // return $task;
//     return view('tasks.edit', ['task' => $task, 'types' => $types, 'statuses' => $statuses]);
// });





Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
