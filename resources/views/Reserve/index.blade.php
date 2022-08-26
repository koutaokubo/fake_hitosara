<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($reserves as $reserve)
        <p>{{$reserve->id}}</p>
        <p>{{$user->name}}</p>
    @endforeach
    @foreach ($stores as $store)
        <a href="{{ route('store.show', ['store_id' => $store->id, 'area_id' => $store->area_id]) }}">{{$store->name}}</a>
    @endforeach
</body>
</html>