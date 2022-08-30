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
    <p>
        定休日： 
        @foreach ($holidays as $key => $holiday)
            @if ($holiday == 2)
                {{$key}}
            @endif
        @endforeach
    @if (@Auth::check())
        <form action="{{route('togglefavorite')}}" method="post">
            @csrf
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            @if($isFavorited == false)
                <input type="submit" value="お気に入り登録">
            @else
                <input type="submit" value="お気に入り解除">
            @endif
            
        </form>
    @endif
    <form action="{{ route('reserve.create') }}">
        <div>
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <input type="submit" value="予約作成">
        </div>
    </form>
</body>
</html>