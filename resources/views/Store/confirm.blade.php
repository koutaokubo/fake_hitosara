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
<p>名前：{{$request->name}}</p>
<p>ジャンル:{{$genre->food_genre}}</p>
<p>郵便番号:{{$request->address_code}}</p>
<p>エリア:{{$area->area_name}}</p>
<p>住所:{{$request->address}}</p>
<p>営業開始時間:{{$request->open_time}}</p>
<p>営業終了時間:{{$request->close_time}}</p>
<p>予約締切時間:{{$request->reserve_limit}}</p>
</li>
</ul>
<form action="/store" method="POST">

    <input type="hidden" name="name" value="{{$request->name}}">
    <input type="hidden" name="genre_id" value="{{$request->genre_id}}">
    <input type="hidden" name="address_code" value="{{$request->address_code}}">
    <input type="hidden" name="area_id" value="{{$request->area_id}}">
    <input type="hidden" name="address" value="{{$request->address}}">
    <input type="hidden" name="open_time" value="{{$request->open_time}}">
    <input type="hidden" name="close_time" value="{{$request->close_time}}">
    <input type="hidden" name="reserve_limit" value="{{$request->reserve_limit}}">

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