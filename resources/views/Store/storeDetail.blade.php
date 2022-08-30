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
    <form action="{{ route('reserve.create') }}">
        <div class="text-center">
            <input type="hidden" name="store_id" value="{{$store->id}}">
        <input type="submit" class="btn btn-primary btn-lg" value="予約する">
      </div>
    </form>

    </div>
@endsection