<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>編集</h2>



@if ($errors->any())
<div class="alert alert-danger mt-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/store/{{$store->id}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" value="{{old('name', $edit->name)}}">


    </div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect1">ジャンル</label>
        <select class="form-control" id="exampleFormControlSelect1" name="genre_id">
            <option >-</option>
            @foreach ($genres as $foods)

          <option  value="{{$foods->id}}"
            @if ($foods->id == old('genre_id', $edit->genre_id) )
            selected 
            @endif
            >{{ $foods->food_genre }}</option>
          @endforeach
        </select>
      </div>
    <div>
        <label for="address_code">郵便番号</label>
        <input type="text" name="address_code" id="address_code" value="{{old('address_code', $edit->address_code)}}">
    </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">エリア</label>
        <select class="form-control" id="exampleFormControlSelect1" name="area_id">
            <option >-</option>
            @foreach ($area as $city)


          <option value="{{$city->id}}"
            @if ($city->id == old('area_id', $edit->area_id) )
            selected 
            @endif
            >
            >{{ $city->area_name }}</option>
          @endforeach
        </select>
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
</body>
</html>

