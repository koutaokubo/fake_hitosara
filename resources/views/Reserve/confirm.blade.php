@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>予約内容確認</h2>
<br>

<div class="mb-3 row">
<table class="table">
        <tr>
            <td>名前：</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>メールアドレス：</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>電話番号：</td>
            <td>{{$user->tel}}</td>
        </tr>
        <tr>
            <td>店舗：</td>
            <td>{{$store->name}}</td>
        </tr>
        <tr>
            <td>場所：</td>
            <td>{{$store->area->area_name}}
                {{$store->address}}{{$store->city}}</td>
        </tr>
        <tr>
            <td>予約日時：</td>
            <td>{{$request->date}} {{$request->time}}</td>
        </tr>
</table>
</div>

    <form action="{{route('reserve.store') }}" method="POST">
        <input type="hidden" name="reserve_date" value="{{$request->date}}">
        <input type="hidden" name="reserve_time" value="{{$request->time}}">
        <input type="hidden" name="store_id" value="{{$store->id}}">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="hidden" name="menu_id" value="{{$request->menu_id}}">

        <div class="text-center">
            <button class="btn btn-outline-primary btn-lg" type="submit" name="back">
                <i class="fa-solid fa-caret-left"></i>
                戻る
            </button>
            <button class="btn btn-primary btn-lg" type="submit" name="send">
                予約
                <i class="fa-solid fa-caret-right"></i>
            </button>
        </div>
        @csrf
    </form>

</div>
@endsection