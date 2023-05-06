@extends('layouts.app-master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('todos.index') }}"> Back to To-do List</a>
            </div>
            <div class="pull-left">
                <h2>{{App\Models\Task::gettodo($id)}} Task List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.task_create',$id) }}"> Add</a>
            </div>
            
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($Tasks as $Task)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $Task->name }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$Task->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('tasks.show',$Task->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('tasks.edit',$Task->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $Tasks->links() !!}
      
@endsection