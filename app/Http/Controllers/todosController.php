<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class todosController extends Controller
{
    //
    public function index(){
        $todos=Todo::all();
       // return view('todos',['todos'=>$todos]);
        //return view('todos')->with('todos',$todos);
      return view('todos.index',compact('todos'));
    }
    public function show($todo){
      //$todo=Todo::find($todo);
      return view('todos.show')->with('todo',Todo::find($todo));

    }
    public function create(){
      return view('todos.create');
    }
    public function store(Request $request){
    //  dd(request()->all());
   // return $request->all();
   //return $request->input();
   //return $request->input('todoTitle');
  // return $request->todoTitle;

  //+++++++++++++++++++++++++++++validation++++++++++++++++
  $request-> validate([
    'todoTitle'=>'required | min:6',
    'todoDescription'=>'required'

   ]); 
   // another way to validate request atribute values -- did'n work with me
     /*
   $this -> validate($request,[
     'todoTitle'=>'required'|'min:6',
     'todoDescription'=>'required'

   ]);
   */



  //++++++++++++++++++++++++++++++++++++++end Validation




    $todo= new Todo();
    $todo->title = $request->todoTitle;
    $todo->description = $request->todoDescription;
    $todo->compleated=false;
    $todo->save();
    $request->session()->flash('success',' New Todo Created Successfully ! ');
    return redirect('/todos');
    }
    public function edit(Todo $todo){
      
      //$todo =Todo::find($todo);
      return view('todos.edit')->with('todo',$todo);

    }
    public function update(Request $request,Todo $todo){
      $request-> validate([
        'todoTitle'=>'required | min:6',
        'todoDescription'=>'required'
    
       ]); 
       //$todo=Todo::find($todo);
       $todo->title=$request->get('todoTitle');
       $todo->description=$request->get('todoDescription');
       $todo->save();
       $request->session()->flash('success',' Todo Updated Successfully ! ');
       return redirect('/todos');

    }
    public function destroy(Request $request,Todo $todo){
      //$todo=Todo::find($todo);
      $todo->delete();
      $request->session()->flash('success',' Todo Deleted Successfully ! ');
      return redirect('/todos');
    }
    public function compleate(Todo $todo){
      $todo->compleated=true;
      $todo->save();
      session()->flash('success','Todo task Comleated successfully!');
      return redirect('/todos');

    }

}
