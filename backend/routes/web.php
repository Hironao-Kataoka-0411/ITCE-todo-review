<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Bus\UpdatedBatchJobCounts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tasks', [
        'tasks' => App\Models\Task::latest()->get()
    ]);
 });



 Route::get('/edit/{id}' , 'App\Http\Controllers\TasksController@editForm')->name('edit.blade');
 Route::post('/edit/{id}', 'App\Http\Controllers\TasksController@edit');


 //tasks.blade.phpからformリクエストの設定、バリデーション
Route::post('/task', function (Request $request) {
        request()->validate(
            [
                'name' => 'required|unique:tasks|min:3|max:255'
            ],
            [
                'name.required' => 'タスク内容を入力してください。',
                'name.unique' => 'そのタスクは既に追加されています。',
                'name.min' => '3文字以上で入力してください。',
                'name.max' => '255文字以内で入力してください。'
            ]
        );
        $task = new Task();
        $task->id = request('id');
        $task->name = request('name');
        $task->finished_at = request('finished_at');

        $task->save();
        return redirect('/');
    });




Route::delete('/task/{task}', function (Task $task) {
        $task->delete();
        return redirect('/');
 });

