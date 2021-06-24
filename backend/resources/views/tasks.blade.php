<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Basic Tasks</title>
 <!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
 <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
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

           <div class="finished_at">終了日時</div>
           <input type="datetime-local" name="finished_at" class="form-date">

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
        <thead>
            <tr>
                <td>タスク内容</td> <td>削除ボタン</td> <td>記入時間</td>　<td>完了予定時間</td>
            </tr>
        </thead>
         <tbody>
           @foreach ($tasks as $task)
           <tr>
             <td>{{ $task->name }}</td>
             <td>
               <form method="POST" action="{{ url('/task/' . $task->id) }}">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-outline-danger" style="width: 100px;"><i class="far fa-trash-alt"></i> 削除</button>
               </form>
             </td>
             <td>{{ $task->created_at }}</td>
             <td>{{ date('Y/m/d :H:i',strtotime($task->finished_at)) }}</td>
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
