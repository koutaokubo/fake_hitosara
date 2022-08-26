<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>予約作成</title>
</head>
<body>
    <form method="post" action="{{ route('reserve.confirm') }}" name="action" value="confirm">
        @csrf
        <div class="mt-4">
            ご来店予定日 <input id="open_time" class="block mt-1 w-full" type="date" name="date"/>
        </div>
        <div class="mt-4">
            ご来店予定時間 <input id="close_time" class="block mt-1 w-full" type="time" name="time"/>
        </div>
        <div>
            <input type="submit" value="送信"/>
        </div>
        <div>
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <input type="hidden" name="store_id" value="{{$store->id}}">
        </div>
    </form>
</body>
</html>