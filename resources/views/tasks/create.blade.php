@extends('layouts.app')
@section('title', 'Task')
    
@section('content')
    <form action="{{ url('/task/store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <select name="type">
            @foreach ( $types  as $type)
                <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
            @endforeach
        </select>
    
    </form>
@endsection
