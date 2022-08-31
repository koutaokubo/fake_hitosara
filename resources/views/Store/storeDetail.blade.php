@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>{{$store->name}}</h2>
<br>

    <p>{{$store->address_code}}</p>
    <p>{{$area->area_name}}{{$store->city}}{{$store->address}}</p>
    <p>
        定休日： 
        @foreach ($holidays as $key => $holiday)
            @if ($holiday == 2)
                {{$key}}
            @endif
        @endforeach
    </p>
    <table class = "table">
        <tr>
        @foreach($week as $key=>$vals)
                <th>{{$vals[0]}}</th>
        @endforeach
        </tr>
        <tr>
        @foreach($week as $key=>$vals)
            @foreach ($holidays as $days => $holiday)
                @if($days === $vals[2])
                <td>
                    @if ($holiday == 2)
                        定休日
                    @elseif($vals[1]*2 < $store->reserve_limit)
                        〇
                    @elseif($vals[1] < $store->reserve_limit)
                        △
                    @elseif($vals[1] == $store->reserve_limit)
                        ×
                    @else
                        未定
                    @endif
                </td>
                @endif
            @endforeach
        @endforeach
        </tr>
        </table>
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
        <div class="text-center">
            <input type="hidden" name="store_id" value="{{$store->id}}">
        <input type="submit" class="btn btn-primary btn-lg" value="予約する">
      </div>
    </form>

    </div>
@endsection