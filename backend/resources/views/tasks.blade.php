<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Basic Tasks</title>
 <!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
 <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css')}}">
</head>
<body>
 <div class="container">
   <h3 class="my-3">タスク管理ツール</h3>
   <div class="card mb-3">
     <div class="card-header">タスク新規追加</div>
     <div class="card-body">

       <form method="POST" action="{{ url('/task') }}">
         @csrf
         <div class="form-group">
           <input type="text" name="name" class="form-control">
           @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
           @endif

           <div class="finished_at">タスクの期限を決める</div>
           <div><input type="datetime-local" name="finished_at" class="form-date"></div>

           <button type="submit" class="btn btn-outline-info mt-2"><i class="fas fa-plus fa-lg mr-2"></i>追加</button>
         </div>
       </form>
     </div>
   </div>
   <div class="card">
     <div class="card-header">タスク一覧</div>
     <div class="card-body">
       @if (count($tasks) > 0)
       <table class="table table-striped">
        　<tbody>
            <thead>
                    <th class="subtitle">タスク内容</th>
                    <th class="subtitle">編集ボタン</th>
                    <th class="subtitle">削除ボタン</th>
                    <th class="subtitle">記入時間</th>
                    <th class="subtitle">期限</th>
            </thead>

           @foreach ($tasks as $task)
           <tr>
             <td>{{ $task->name }}</td>
             <td><a href="{{ route('edit.blade' , ['id' => $task->id] )}}" class="btn btn-primary" style="width: 100px;">編集</a></td>
             <td>
               <form method="POST" action="{{ url('/task/' . $task->id) }}">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-outline-danger" style="width: 100px;"><i class="far fa-trash-alt"></i> 削除</button>
               </form>
             </td>
             <td >{{ date('Y/m/d H:i',strtotime($task->created_at)) }}</td>
             <td>

                @if (isset($task->finished_at))
                    @if ($task->finished_at > now())
                        {{ date('Y/m/d H:i' , strtotime($task->finished_at)) }}
                    @else
                            <span class="finished_at">{{  date('Y/m/d H:i',strtotime($task->finished_at)) }}</span>
                    @endif
                @else
                    <p></p>
                @endif
            </td>
           </tr>
           @endforeach
         </tbody>
       </table>
       @endif
     </div>
   </div>
 </div>
</body>
</html>
