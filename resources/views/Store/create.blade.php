@extends('.layout')

@section('content')

<div class = "container">
  <br>
  <h2>新規店舗作成</h2>
  <br>
    @if ($errors->any())
    <div class="alert alert-danger mt-">
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
          <label for="name" class="form-label">名前
            <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}"/>
          </label>
        </div>

       <div class="form-group mt-2">
        <label for="exampleFormControlSelect1">ジャンル
        <select class="form-control" id="exampleFormControlSelect1" name="genre_id">
        </label>
            <option >-</option>
            @foreach ($genres as $foods)

          <option  value="{{$foods->id}}">{{ $foods->food_genre }}</option>
          @endforeach
        </select>
      </div>

      <div>
          <label for="address_code" class="mt-2 form-label">郵便番号
          <input id="address_code" class="form-control" type="text" name="address_code" value="{{old('address_code')}}"/>
          </label>
       </div>
       
      <div class="form-group mt-2">
        <label for="exampleFormControlSelect1">エリア
        <select class="form-control" id="exampleFormControlSelect1" name="area_id" value="{{old('area_id')}}">
        </label>
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
      <label for="address" class="mt-2 form-label">市区町村</label>
        <input id="address" class="form-control" type="text" name="address" value="{{old('address')}}"/>
      </div>
      <div>
        <label for="city" class="mt-2 form-label">以降の住所</label>
        <input id="city" class="form-control" type="text" name="city" value="{{old('city')}}"/>
      </div>
      <div class="mt-4">
      <label for="open_time" class="form-label">
        営業開始時間 <input id="open_time" class="form-control"  type="time" name="open_time" value="{{old('open_time')}}"/>
      </label>
      </div>
      <div class="mt-4">
      <label for="close_time" class="form-label">
        営業終了時間 <input id="close_time" class="form-control" type="time" name="close_time" value="{{old('close_time')}}"/>
      </label>
      </div>

      <div container>
        <label class="mt-2">営業日</label>
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
          <tr>
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
      <label for="reserve_limit" class="mt-2 form-label">最大予約席数
         <input id="reserve_limit" class="form-control" type="text" name="reserve_limit" value="{{old('reserve_limit')}}"/>
         </label>
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-outline-primary btn-lg" value="次へ">
      </div>
    </form>

    </div>
@endsection
