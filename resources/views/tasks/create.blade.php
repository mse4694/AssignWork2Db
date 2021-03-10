@extends('layouts.app')
@section('title', 'Task')
    
@section('content')
<div class="col-8 mx-auto mt-2">
    @if ( $message = Session::get('success') )
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
        
    <div class="text-center"><h2>Create Task</h2></div>
    <form action="{{ url('/task/store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="type">Type :</label>
            <select class="form-select" name="type">
                @foreach ( $types  as $type)
                    <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" value="">
        </div>

        <div class="form-group">
            <label for="detail">Detail :</label>
            <textarea type="text" class="form-control" rows="5" name="detail" value=""></textarea>
        </div>

        <div class="form-group">
            <label class="text-inline">Status :</label>
            @foreach ( $statuses  as $status)
                <label class="radio-inline">
                    <input type="radio" name="status" value="{{ $status['id'] }}"> {{ $status['name']}}
                </label>&nbsp;
            @endforeach
        </div>
        
        <div class="test-center">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    
    </form>
</div>
@endsection
