<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>お気に入り店舗</h1>
    @foreach ($favoriteStores as $store)
        <ul>
            <li>{{$store->name}}</li>
            <form action="{{route('togglefavorite')}}" method="post">
                @csrf
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="submit" value="お気に入り解除">
            </form>
        </ul>
    @endforeach
</body>
</html>