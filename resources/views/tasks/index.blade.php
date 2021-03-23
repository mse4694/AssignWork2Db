@extends('layouts.app')

@section('title', 'Task Index')

@section('content')
@if ( isset($success) )
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $success }}
    </div>
@endif
@include('tasks._form')
<h1>Task Contents</h1>
<hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ประเภทงาน</th>
                <th scope="col">ชื่องาน</th>
                <th scope="col">รายละเอียด</th>
                <th scope="col">สถานะ</th>
                <th scope="col">การดำเนินการ</th>
                <th scope="col">แก้ไขสถานะ</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row"> {{ $task->id }}</th>
                <td>{{ $task->getTypeName() }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->detail }}</td>
                <td>{{ $task->status ? 'เสร็จแล้ว' : 'ยังไม่เสร็จ' }}</td>
                <td>
                    <form id="check-complete-{{ $task->id }}" action="/task/{{ $task->id }}" style="display: none" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="1">
                    </form>
                    @if( !$task->status )
                        <button 
                            class="btn btn-sm btn-info" 
                            onclick="document.getElementById('check-complete-{{ $task->id }}').submit()"> 
                            เสร็จแล้ว 
                        </button>
                    @endif
                </td>
                <td>
                    @if( $task->status )
                        <a class="btn btn-sm btn-success" role="button" href="{{ url('/task', $task->id) }}"> แก้ไข</a>
                        <form id="delete-{{ $task->id }}" action="/task/{{ $task->id }}" style="display: none" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="status" value="1">
                        </form>
                        <button 
                            class="btn btn-sm btn-danger" 
                            onclick="document.getElementById('delete-{{ $task->id }}').submit()"> 
                            ลบภาระงาน 
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

{{-- @section('title', 'AssignWork2Db')

@section('content')
First Training Laravel.<br/>
Don't worry.<br/>

Title = {{ $title }}.<br/>

The current UNIX timestamp is {{ time() }}.<br/>

    @foreach ( $showgenders as $gender )
        GenderID = {{ $gender['id'] }}, GenderName = {{ $gender['name'] }}.<br/>
    @endforeach

    <form action="/store" method="GET">
        Username1 : <input type="text" name="username1">
        Password1 : <input type="password" name="password1">
        <input type="submit">
    
    </form>

    <form action="/store" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        Username2 : <input type="text" name="username2">
        Password2 : <input type="password" name="password2">
        <input type="submit">
    
    </form>

@endsection --}}