<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types[] = ['id' => 1, 'name' => 'งานคณะฯ'];
        $types[] = ['id' => 2, 'name' => 'งานตามชื่อตำแหน่ง'];
        $types[] = ['id' => 3, 'name' => 'งานที่ได้รับมอบหมาย'];
        $types[] = ['id' => 4, 'name' => 'งานเพื่อส่วนรวม'];
        

        return view('tasks.index', ['tasks' => Task::all(), 'types' => $types]);
        // return view('tasks.index', ['tasks' => \App\Models\Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types[] = ['id' => 1, 'name' => 'งานคณะฯ'];
        $types[] = ['id' => 2, 'name' => 'งานตามชื่อตำแหน่ง'];
        $types[] = ['id' => 3, 'name' => 'งานที่ได้รับมอบหมาย'];
        $types[] = ['id' => 4, 'name' => 'งานเพื่อส่วนรวม'];

        // การสร้าง เงื่อนไขการ validate form 
        $taskCreateValidateRules = [
            'type' => 'required',
            'name' => 'required'
        ];

        // การสร้างเงื่อนไข การส่งข้อความ ให้กับสิ่งที่เราทำการ validate
        $taskCreateValidateMessages = [
            'type.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'type'" . ').focus()"> <i>ประเภทงาน</i> <b>ด้วยซิ</b>',
            'name.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'name'" . ').focus()"><i>ชื่องาน</i> <b>ด้วยซิ</b>'
        ];

        request()->validate($taskCreateValidateRules, $taskCreateValidateMessages);

        $data = request()->all();
        if( request()->has('status')) {
            $data['status'] = true;
        }
        Task::create($data);
 
        return view('tasks.index', ['tasks' => Task::all(), 'types' => $types]);
        //return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        Task::create($request->all());
        return redirect()->back()->with('success', 'Insert Task Completed !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types[] = ['id' => 1, 'name' => 'งานคณะฯ'];
        $types[] = ['id' => 2, 'name' => 'งานตามชื่อตำแหน่ง'];
        $types[] = ['id' => 3, 'name' => 'งานที่ได้รับมอบหมาย'];
        $types[] = ['id' => 4, 'name' => 'งานเพื่อส่วนรวม'];

        $statuses[] = ['id' => 0, 'name' => 'Incomplete'];
        $statuses[] = ['id' => 1, 'name' => 'Completed'];

        $task = Task::find($id);
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks, 'task' => $task, 'types' => $types, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $types[] = ['id' => 1, 'name' => 'งานคณะฯ'];
        $types[] = ['id' => 2, 'name' => 'งานตามชื่อตำแหน่ง'];
        $types[] = ['id' => 3, 'name' => 'งานที่ได้รับมอบหมาย'];
        $types[] = ['id' => 4, 'name' => 'งานเพื่อส่วนรวม'];

        $validation = $request->validate([
            'type' => 'required',
            'name' => 'required|max:255',
            // 'status' => 'required'
        ]);
    
        $data = $request->all();
        if( ! $request->has('status')) {
            $data['status'] = false;
        }

        //return $data;
        // Task::find($id)->update($request->all());
        Task::find($id)->update($data);        

        return view('tasks.index', ['tasks' => Task::all(), 'types' => $types]);
        //return redirect()->back()->with('success', 'Update Task Completed !!');
    }

    public function updateStatus(Request $request, $id)
    {
        Task::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
