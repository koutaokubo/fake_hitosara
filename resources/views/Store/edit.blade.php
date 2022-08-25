<h2>編集</h2>

<form action="/store/{{$store->id}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" value="{{old('name', $edit->name)}}">

        {{-- @if ($errors->has('name'))
            <p class="error">*{{ $errors->first('name') }}</p>
        @endif --}}
    </div>
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" value="{{old('name', $edit->name)}}">
    </div>
    <div>
        <label for="address_code">郵便番号</label>
        <input type="text" name="address_code" id="address_code" value="{{old('address_code', $edit->address_code)}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">ジャンル</label>
        <select class="form-control" id="exampleFormControlSelect1" name="genre_id">
            <option >-</option>
            @foreach ($genres as $foods)

          <option  value="{{$foods->id}}">{{ $foods->food_genre }}</option>
          @endforeach
        </select>
      </div>
    {{-- <div class="form-group">
        <label for="exampleFormControlSelect1">エリア</label>
        <select class="form-control" id="exampleFormControlSelect1" name="area_id">
          <option value="">-</option>
          @foreach ($area as $city)
          <option>{{ $city->area_name }}</option>
          @endforeach
        </select>
    </div> --}}
    <div>
        <label for="city">都道府県</label>
        <input type="text" name="city" id="city" value="{{old('city', $edit->city)}}">
    </div>
    <div>
        <label for="address">住所</label>
        <input type="text" name="address" id="address" value="{{old('address', $edit->address)}}">
    </div>
    <div>
        <label for="open_time">営業開始時間</label>
        <input type="time" name="open_time" id="open_time" value="{{old('open_time', $edit->open_time)}}">
    </div>
    <div>
        <label for="close_time">営業終了時間</label>
        <input type="time" name="close_time" id="close_time" value="{{old('close_time', $edit->close_time)}}">
    </div>
    <div>
        <label for="name">予約締切時間</label>
        <input type="time" name="reserve_limit" id="reserve_limit" value="{{old('reserve_limit', $edit->reserve_limit)}}">
    </div>
    <div>
        <input type="submit" value="送信">
    </div>

    @csrf
</form>


