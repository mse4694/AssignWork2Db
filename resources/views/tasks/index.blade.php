@extends('layouts.app')

@section('title', 'Task Index')

@section('content')
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
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@fat</td>
        </tr>

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