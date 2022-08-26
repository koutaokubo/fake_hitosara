<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach ($stores as $store)
        <p>{{$store->id}}</p>
        @foreach ($reserves as $reserve)
            <p>{{$reserve->id}}</p>
            <p>{{$user->name}}</p>
            <p>{{$favoriteStore}}</p>
        @endforeach

    @endforeach
</body>
</html>
