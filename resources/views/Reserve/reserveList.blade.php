@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>登録店舗一覧</h2>
<br>
    @foreach ($reserveList as $reserve)
        {{$reserve}}
    @endforeach

</div>
@endsection