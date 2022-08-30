@extends('.layout')

@section('content')

<div class = "container">
    <br>
    <h2>登録内容確認</h2>
    <br>

    <div class="mb-3 row">
        <label>名前：</label>
        <div class="col-sm-10">
        {{$request->name}}
        </div>
    </div>

    <div class="mb-3 row">
        <label>ジャンル:</label>
        <div class="col-sm-10">
        {{$genre->food_genre}}
        </div>
    </div>

    <div class="mb-3 row">
        <label>郵便番号:</label>
        <div class="col-sm-10">
        {{$request->address_code}}
        </div>
    </div>

    <div class="mb-3 row">
        <label>エリア:</label>
        <div class="col-sm-10">
        {{$area->area_name}}
        </div>
    </div>

    <div class="mb-3 row">
        <label>市区町村:</label>
        <div class="col-sm-10">
        {{$request->address}}
        </div>
    </div>

    <div class="mb-3 row">
        <label>それ以降の住所：</label>
        <div class="col-sm-10">
        {{$request->city}}
        </div>
    </div>

    <div class="mb-3 row">
        <label>営業開始時間:</label>
        <div class="col-sm-10">
        {{$request->open_time}}
        </div>
    </div>

    <div class="mb-3 row">
        <label>営業終了時間:</label>
        <div class="col-sm-10">
        {{$request->close_time}}
        </div>
    </div>

    <div class="mb-3 row">
        <label">最大予約席数:</label>
        <div class="col-sm-10">
        {{$request->reserve_limit}}
        </div>
    </div>

    <div class="mb-3 row">
    <label>営業日：</label>
    <div class="row">
        <table class="table">
        @foreach($open as $key=>$vals)
                <tr>
                    <td>{{$vals[0]}}</td>
                    <td>{{$vals[1]}}</td>
                </tr>
        @endforeach
    </table>
    </div>

    </div>
</div>


<form action="/store" method="POST">

    <input type="hidden" name="name" value="{{$request->name}}">
    <input type="hidden" name="genre_id" value="{{$request->genre_id}}">
    <input type="hidden" name="address_code" value="{{$request->address_code}}">
    <input type="hidden" name="area_id" value="{{$request->area_id}}">
    <input type="hidden" name="address" value="{{$request->address}}">
    <input type="hidden" name="city" value="{{$request->city}}">
    <input type="hidden" name="open_time" value="{{$request->open_time}}">
    <input type="hidden" name="close_time" value="{{$request->close_time}}">
    <input type="hidden" name="reserve_limit" value="{{$request->reserve_limit}}">
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <input type="hidden" name="sunday" value="{{$request->sunday}}">
    <input type="hidden" name="monday" value="{{$request->monday}}">
    <input type="hidden" name="tuesday" value="{{$request->tuesday}}">
    <input type="hidden" name="wednesday" value="{{$request->wednesday}}">
    <input type="hidden" name="thursday" value="{{$request->thursday}}">
    <input type="hidden" name="friday" value="{{$request->friday}}">
    <input type="hidden" name="saturday" value="{{$request->saturday}}">

    <div class="text-center">

        <button class="btn btn-outline-primary btn-lg" type="submit" name="back">
            <i class="fa-solid fa-caret-left"></i>
            戻る
        </button>
        <button class="btn btn-primary btn-lg" type="submit" name="send">
            送信
            <i class="fa-solid fa-caret-right"></i>
        </button>
    </div>
    @csrf
</form>
</div>
@endsection