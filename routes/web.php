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

Route::get('/tasks', function() {
    return view('tasks.index');
});

Route::get('/task/create', function() {
    $types[] = ['id' => 1, 'name' => 'Support'];
    $types[] = ['id' => 2, 'name' => 'Maintenance'];
    $types[] = ['id' => 3, 'name' => 'Change Requirement'];

    $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
    $statuses[] = ['id' => 1, 'name' => 'Completed'];

    return view('tasks.create', ['types' => $types, 'statuses' => $statuses]);
});

Route::post('/task/store', function( Request $request ) {
    // การนำข้อมูลลง database แบบเป็นตัวๆ
    // $task = new App\Models\Task();
    // $task->type = $request->type;
    // $task->name = $request->name;
    // $task->detail = $request->detail;
    // $task->status = $request->status;
    // $task->save();

    $validation = $request->validate([
        'type' => 'required',
        'name' => 'required|max:255',
        'status' => 'required'
    ]);

    // การนำข้อมูลลง database ด้วยการเรียกใช้ Model ผ่าน function create ซึ่งต้องไปทำการ
    // ประกาศ protected $fillable ไว้ใน Model ที่เรียกใช้งานด้วย
    App\Models\Task::create($request->all());
    return redirect()->back()->with('success', 'Insert Task Completed !!');
    // return $request->type;
    // return $request->all();
});

Route::get('/task/{id}', function($id) {

    $types[] = ['id' => 1, 'name' => 'Support'];
    $types[] = ['id' => 2, 'name' => 'Maintenance'];
    $types[] = ['id' => 3, 'name' => 'Change Requirement'];

    $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
    $statuses[] = ['id' => 1, 'name' => 'Completed'];

    $task = App\Models\Task::find($id);
    // return $task;
    return view('tasks.edit', ['task' => $task, 'types' => $types, 'statuses' => $statuses]);
});

Route::put('/task/{id}', function( Request $request, $id ) {
    
    $validation = $request->validate([
        'type' => 'required',
        'name' => 'required|max:255',
        'status' => 'required'
    ]);

    App\Models\Task::find($id)->update($request->all());
    return redirect()->back()->with('success', 'Update Task Completed !!');;
    return $request->all();
});
