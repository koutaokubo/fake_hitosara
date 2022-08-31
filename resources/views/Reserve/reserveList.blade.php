@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>予約一覧</h2>
<br>
    <h1>{{ $store->name }}</h1>
    @foreach ($reserveList as $reserve)
        {{$reserve}}
    @endforeach

</div>
@endsection