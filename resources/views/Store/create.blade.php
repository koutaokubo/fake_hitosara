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
        <div class="form-group">
            <label for="exampleFormControlSelect1">ジャンル</label>
            <select class="form-control" id="exampleFormControlSelect1" name="genre_id" >
                <option >-</option>
                @foreach ($genres as $foods)

              <option  value="{{$foods->id}}"
                @if ($foods->id == old('genre_id') )
            selected 
            @endif
                >{{ $foods->food_genre }}</option>
             
              @endforeach
            </select>
          </div>
        <div>
           郵便番号 <input id="address_code" class="block mt-1 w-full" type="text" name="address_code" value="{{old('address_code')}}"/>
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
    住所<input id="address" class="block mt-1 w-full" type="text" name="address" value="{{old('address')}}"/>
</div>
<div class="mt-4">
   営業開始時間 <input id="open_time" class="block mt-1 w-full" type="time" name="open_time" value="{{old('open_time')}}"/>
</div>
<div class="mt-4">
   営業終了時間 <input id="close_time" class="block mt-1 w-full" type="time" name="close_time" value="{{old('close_time')}}"/>
</div>
<div>
   予約締切時間 <input id="reserve_limit" class="block mt-1 w-full" type="time" name="reserve_limit" value="{{old('reserve_limit')}}"/>
</div>


        <div>
            <input type="submit" value="送信"/>
        </div>
    </form>
</body>
</html>
