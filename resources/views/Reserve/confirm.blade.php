<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>確認画面</title>
</head>
<body>
    <p>予約内容確認</p>
    <ul>
        <div>
            <li>
                <p>お名前：{{$request->name}}</p>
                <p>メールアドレス：{{$user->email}}</p>
                <p>電話番号:{{$user->tel}}</p>
                <hr>
            </li>
        </div>
        <div>
            <li>
                <p>お店：{{$store->name}}</p>
                <p>予約日時：{{$request->date}}{{$request->time}}</p>
            </li>
        </div>
        <hr>
    </ul>
    <form action="{{route('reserve.store') }}" method="POST">

        <input type="hidden" name="name" value="{{$request->name}}">
        <input type="hidden" name="reserve_date" value="{{$request->date.:$request->time}}">
        <input type="hidden" name="store_id" value="{{$request->store_id}}">
        <input type="hidden" name="user_id" value="{{$request->user_id}}">
        <input type="hidden" name="menu_id" value="{{$request->menu_id}}">
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