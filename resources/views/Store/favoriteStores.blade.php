@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>お気に入り店舗</h2>
<br>

<table class="table">
    @foreach ($favoriteStores as $store)
        <tr><a href="{{route('store.detail', ['store_id' => $store->id])}}"><td>{{$store->name}}</td></tr>
    @endforeach
<table>

</div>
@endsection