@extends('.layout')

@section('content')

<div class = "container">
@if ($stores != null)
@if (Auth::check())
<div>
    @foreach ($reserves as $reserve)
        <p>{{$reserve->id}} {{ Auth::user()->name }}</p>
    @endforeach
    @foreach ($stores as $store)
        <a href="{{ route('store.detail', ['store_id' => $store->id, 'area_id' => $store->area_id]) }}">{{$store->name}}</a>
    @endforeach
@endif
@else
    <p>予約はありません</p>
 @endif
</div>
</div>
@endsection