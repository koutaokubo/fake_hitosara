<h2>編集</h2>

<form action="/Store/edit/{{$store->id}}" method="POST">
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" value="{{old('name', $store->name)}}">

        {{-- @if ($errors->has('name'))
            <p class="error">*{{ $errors->first('name') }}</p>
        @endif --}}
    </div>
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" value="{{old('name', $store->name)}}">
    </div>
    <div>
        <label for="address_code">郵便番号</label>
        <input type="text" name="address_code" id="address_code" value="{{old('address_code', $store->address_code)}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">ジャンル</label>
        <select class="form-control" id="exampleFormControlSelect1" name="genre_id">
          <option value="">-</option>
          @foreach ($genres as $foods)
          <option>{{ $foods->food_genre }}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">エリア</label>
        <select class="form-control" id="exampleFormControlSelect1" name="area_id">
          <option value="">-</option>
          @foreach ($area as $city)
          <option>{{ $city->area_name }}</option>
          @endforeach
        </select>
    </div>
    <div>
        <label for="city">都道府県</label>
        <input type="text" name="city" id="city" value="{{old('city', $store->city)}}">
    </div>
    <div>
        <label for="address">住所</label>
        <input type="text" name="address" id="address" value="{{old('address', $store->address)}}">
    </div>
    <div>
        <label for="open_time">営業開始時間</label>
        <input type="time" name="open_time" id="open_time" value="{{old('open_time', $store->open_time)}}">
    </div>
    <div>
        <label for="close_time">営業終了時間</label>
        <input type="time" name="close_time" id="close_time" value="{{old('close_time', $store->close_time)}}">
    </div>
    <div>
        <label for="name">予約締切時間</label>
        <input type="time" name="reverse_limit" id="reverse_limit" value="{{old('reverse_limit', $store->reverse_limit)}}">
    </div>
    <div>
        <input type="submit" value="送信">
    </div>

    @csrf
</form>


