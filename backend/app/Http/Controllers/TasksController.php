<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
  {
    //
  }

public function create()
   {
     //
   }

public function store(Request $request)
  {
    //
  }

public function show($id)
  {
    //
  }

  public function edit(Request $request) {
    $request->validate([
        'id' => 'required' ,
        [
            'name' => 'required|min:3|max:255'
        ],
        [
            'name.required' => 'タスク内容を入力してください。',
            'name.min' => '3文字以上で入力してください。',
            'name.max' => '255文字以内で入力してください。'
        ]
    ]);
    $task = Task::findOrFail(request('id'));
    $task->name = request('name');
    $task->finished_at = request('finished_at');
    $task->save();
    return redirect('/');
}

public function update(Request $request, $id)
  {
    //
  }

public function destroy($id)
  {
    //
  }

  public function editForm($id) {
    $task = Task::find($id);
    return view('/edit', [ 'task' => $task]);
    }

    public function updateTime () {

    }
}



