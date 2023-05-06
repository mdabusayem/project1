@extends('layouts.app-master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show To-do</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('todos.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h2>{{ $todo->name }} </h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h6>Tasks</h6>
                <ol>
                    @foreach($tasks as $task)
                    <li>{{$task->name}}</li>
                 
                    @endforeach
                </ol>
        </div>
    </div>
@endsection