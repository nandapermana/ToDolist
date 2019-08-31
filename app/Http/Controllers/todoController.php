<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ToDo;

class todoController extends Controller
{
    public function postTodo( Request $request)
    {
    	$this->validate($request, [
            'todo_text'     => 'required',
        ]);
        $todo = new ToDo;
        $todo->todolist = $request->input('todo_text');
        $todo->save();
        return redirect()->back();
    }

    public function homeTodo()
    {
    	$todo = Todo::all();
    	return view('home')->with(['todolist' => $todo]);
    }

    public function deleteSelectedTodo( Request $request)
    {
    	$todo = Todo::find($request['id']);
        $todo->delete();
        return response()->json([
            'data' => $request['id']
        ]);
    }

    public function deleteAll(Request $request)
    {
    	$input = $request->input('items');
    	if( $input !== null){
    		for ($i=0; $i < count($input); $i++) 
    		{ 
	        	$todo = Todo::find($input[$i]);
	        	$todo->delete();
        	}
    	}
    	return redirect()->back();
        //dd($input);
    }

}
