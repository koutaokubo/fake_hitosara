<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<p>登録内容確認</p>
<ul>
<li>
<p>コース名：{{$request->name}}</p>
<p>料金:{{$request->charge}}</p>
<p>時間:{{$request->course_time}}</p>
<p>店名:{{$stores->name}}</p>

</li>
</ul>
<form action="/menu" method="POST">

    <input type="hidden" name="name" value="{{$request->name}}">
    <input type="hidden" name="charge" value="{{$request->charge}}">
    <input type="hidden" name="course_time" value="{{$request->course_time}}">
    <input type="hidden" name="store_id" value="{{$request->store_id}}">
    <div>

        <button class="btn btn-primary" type="submit" name="back">
            <i class="fa-solid fa-caret-left"></i>
            戻る
        </button>
        <button class="btn btn-primary" type="submit" name="send">
            送信
            <i class="fa-solid fa-caret-right"></i>
        </button>
    </div>
    @csrf
</form>
</body>
</html>
