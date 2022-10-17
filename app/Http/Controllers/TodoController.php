<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Support\Carbon;
use Auth;

class TodoController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Todo::all()]);
    }

    public function store(TodoRequest $request)
    {
        $todo = Todo::create([
            'user_id' => Auth::user()->id,
            'todo' => $request->todo
        ]);

        return response()->json([
            'Status' => 'Success',
            'data' => $todo
        ]);
    }

    public function update(UpdateTodoRequest $request, $id)
    {
        $todoItem = Todo::find($id);
        if($todoItem->user_id == Auth::user()->id)
        {
            $todoItem->completed = $request->completed ? true : false;
            $todoItem->completed_at = $request->completed ? Carbon::now() : '';
            $todoItem->save();

            return response()->json(['Status' => 'Updated successful', 'data' => $todoItem]);
        }

        return 'Unathorized';
    }

    public function delete($id)
    {
        $todoItem = Todo::find($id);
        if($todoItem->user_id == Auth::user()->id)
        {
            $todoItem->delete();
            return 'Todo deleted successfully';
        }

        return 'Unathorized';
        
    }
}
