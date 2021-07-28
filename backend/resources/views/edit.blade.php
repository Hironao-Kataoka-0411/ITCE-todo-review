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
     <div class="card-header">タスクを編集・更新</div>
     <div class="card-body">
       <form method="POST" action="edit">
        <input type="hidden" name="id" value="{{ $task->id }}">
         @csrf
         <div class="form-group">
           <input type="text" name="name" class="form-control" required value="{{ $task->name }}">
           @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
           @endif

           <div class="finished_at">タスクの期限を決める</div>
           <div><input type="datetime-local" name="finished_at" class="form-date" required value="{{ $task->finished_at }}"></div>

           <button type="submit" class="btn btn-outline-info mt-2"><i class="fas fa-plus fa-lg mr-2"></i>更新</button>
         </div>
       </form>
     </div>
   </div>
 </div>
</body>
</html>
