@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>お気に入り店舗</h2>
<br>
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
<table>

</div>
@endsection