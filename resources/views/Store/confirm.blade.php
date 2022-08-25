
<p>登録内容確認</p>
<ul>
<li>
名前：<p>{{$request->name}}</p>
郵便番号<p>{{$request->address_code}}</p>
ジャンル<p>{{$request->genre_id}}</p>
エリア<p>{{$request->area_id}}</p>
都道府県<p>{{$request->city}}</p>
住所<p>{{$request->address}}</p>
営業開始時間<p>{{$request->open_time}}</p>
営業終了時間<p>{{$request->close_time}}</p>
予約締切時間<p>{{$request->reverse_limit}}</p>
</li>
</ul>
<form action="" method="POST">

    <input type="hidden" name="name" value="{{$request->name}}">
    <input type="hidden" name="address_code" value="{{$request->address_code}}">
    <input type="hidden" name="area_id" value="{{$request->area_id}}">
    <input type="hidden" name="genre_id" value="{{$request->genre_id}}">
    <input type="hidden" name="city" value="{{$request->city}}">
    <input type="hidden" name="address" value="{{$request->address}}">
    <input type="hidden" name="open_time" value="{{$request->open_time}}">
    <input type="hidden" name="close_time" value="{{$request->close_time}}">
    <input type="hidden" name="reverse_limit" value="{{$request->reverse_limit}}">

    <div>

        <button class="btn btn-primary" type="submit" name="back">
            <i class="fa-solid fa-caret-left"></i>
            戻る
        </button>
        <button class="btn btn-primary" type="submit" name="send">
            送信
            <i class="fa-solid fa-caret-right"></i>
        </button>
    </div>
    @csrf
</form>


