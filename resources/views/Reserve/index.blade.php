@extends('.layout')

@section('content')

<div class = "container">
<div class="text-center">
@if ($stores != null)
@if (Auth::check())
    {{-- @foreach ($reserves as $reserve)
        <p>{{$reserve->id}} {{ Auth::user()->name }}</p>
    @endforeach
    @foreach ($stores as $store)
        <a href="{{ route('store.detail', ['store_id' => $store->id, 'area_id' => $store->area_id]) }}">{{$store->name}}</a>
    @endforeach --}}
    @for ($i = 0; $i < count($reserves); $i++)
        <p>{{$reserves[$i]->id}}
             {{Auth::user()->name }}
              <a href="{{ route('store.detail', ['store_id' => $stores[$i]->id, 'area_id' => $stores[$i]->area_id]) }}">{{$stores[$i]->name}}</a>
        </p>
    @endfor
@endif
@else
<br>
    <p>予約はありません</p>
<br>
<a href="/home" class="btn btn-primary" role="button" data-bs-toggle="button">予約する</a>

 @endif
</div>
</div>
@endsection