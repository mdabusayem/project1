<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Todo\TodoRepositoryInterface;
use Auth;

class TodoController extends Controller
{

    protected $todo;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {

        $this->todo = $todoRepository;
    }

    public function index()
    {
        $todos =$this->todo->all();
    
        return view('todos.index',compact('todos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->todo->create($request->all());
             

        return redirect()->route('todos.index')
                        ->with('success','Todo created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        $tasks=$this->todo->tasks($todo['id']);
        return view('todos.show',compact('todo','tasks'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todo $todo)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
      
        if($todo['user_id']==Auth::user()->id) {
           $this->todo->updatetodo($todo,$request->all());
           return redirect()->route('todos.index')
                        ->with('success','Todo updated successfully'); 
        }
        else
        {
        return redirect()->route('todos.index')
                        ->with('error','Something wrong');
        }
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        if($todo['user_id']==Auth::user()->id) {
           $this->todo->deletetodo($todo);
           return redirect()->route('todos.index')
                        ->with('success','Todo deleted successfully');
        }
        else
        {
            return redirect()->route('todos.index')
                        ->with('error','Something wrong');
        }
        
    }
}
