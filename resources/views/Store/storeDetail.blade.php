<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$store->name}}</title>
</head>
<body>
    <p>{{$store->name}}</p>
    <p>{{$store->address_code}}</p>
    <p>{{$area->area_name}}{{$store->city}}{{$store->address}}</p>
    <form action="{{ route('reserve.create') }}">
        <div>
            {{$store}}
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <input type="submit" value="作成">
        </div>
    </form>
</body>
</html>