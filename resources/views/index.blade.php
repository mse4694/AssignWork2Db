@extends('layouts.app')

@section('title', 'AssignWork2Db')

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

@endsection