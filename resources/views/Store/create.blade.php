<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post" action="/store/confirm" name="action" value="confirm">
        @csrf
        <div>
             名前<input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}"/>
        </div>
        <div>
           郵便番号 <input id="address_code" class="block mt-1 w-full" type="text" name="address_code" value="{{old('address_code')}}"/>
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
      <div class="form-group">
        <label for="exampleFormControlSelect1">エリア</label>
        <select class="form-control" id="exampleFormControlSelect1" name="area_id" value="{{old('area_id')}}">
            <option >-</option>
            @foreach ($area as $city)


          <option value="{{$city->id}}"
            @if ($city->id == old('area_id') )
            selected
            @endif
            >{{ $city->area_name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        市区町村<input id="address" class="block mt-1 w-full" type="text" name="address" value="{{old('address')}}"/>
      </div>
      <div>
        以降の住所<input id="city" class="block mt-1 w-full" type="text" name="city" value="{{old('city')}}"/>
      </div>
      <div class="mt-4">
        営業開始時間 <input id="open_time" class="block mt-1 w-full" type="time" name="open_time" value="{{old('open_time')}}"/>
      </div>
      <div class="mt-4">
        営業終了時間 <input id="close_time" class="block mt-1 w-full" type="time" name="close_time" value="{{old('close_time')}}"/>
      </div>

      <div container>
        <table class="table table-borderd">
          <tr>
              <th>月曜日</th>
              <td>
                  <input type="radio" name="monday" value="1" id="flag_mon_open" />
                  <label for="flag_mon_open">営業日</label>
                  <input type="radio" name="monday" value="2" id="flag_mon_close" />
                  <label for="flag_mon_close">休み</label>
              </td>
          </tr>
          <tr>
             <th>火曜日</th>
             <td>
                <input type="radio" name="tuesday" value="1" id="flag_tue_open" />
                <label for="flag_tue_open">営業日</label>
                <input type="radio" name="tuesday" value="2" id="flag_tue_close" />
                <label for="flag_tue_close">休み</label>
             </td>
          </tr>
          <tr>
              <th>水曜日</th>
              <td>
                <input type="radio" name="wednesday" value="1" id="flag_wed_open" />
                <label for="flag_wed_open">営業日</label>
                <input type="radio" name="wednesday" value="2" id="flag_wed_close" />
                <label for="flag_wed_close">休み</label>
              </td>
          </tr>
          <tr>
              <th>木曜日</th>
              <td>
                <input type="radio" name="thursday" value="1" id="flag_thu_open" />
                <label for="flag_thu_open">営業日</label>
                <input type="radio" name="thursday" value="2" id="flag_thu_close" />
                <label for="flag_thu_close">休み</label>
              </td>
          </tr>
          <tr>
              <th>金曜日</th>
              <td>
                <input type="radio" name="friday" value="1" id="flag_fri_open" />
                <label for="flag_fri_open">営業日</label>
                <input type="radio" name="friday" value="2" id="flag_fri_close" />
                <label for="flag_fri_close">休み</label>
              </td>
          </tr>
          <tr>
              <th>土曜日</th>
              <td>
                <input type="radio" name="saturday" value="1" id="flag_sat_open" />
                <label for="flag_sat_open">営業日</label>
                <input type="radio" name="saturday" value="2" id="flag_sat_close" />
                <label for="flag_sat_close">休み</label>
              </td>
          </tr>
          <tr>""
              <th>日曜日</th>
              <td>
                <input type="radio" name="sunday" value="1" id="flag_sun_open" />
                <label for="flag_sun_open">営業日</label>
                <input type="radio" name="sunday" value="2" id="flag_sun_close" />
                <label for="flag_sun_close">休み</label>
              </td>
          </tr>
        </table>
      </div>

      <div>
        最大予約席数 <input id="reserve_limit" class="block mt-1 w-full" type="text" name="reserve_limit" value="{{old('reserve_limit')}}"/>
      </div>
      <div>
        <input type="submit" value="送信"/>
      </div>
    </form>
</body>
</html>
