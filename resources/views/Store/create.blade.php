<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/store/confirm" name="action" value="confirm">
        @csrf
        <div>
             名前<input id="name" class="block mt-1 w-full" type="text" name="name"/>
        </div>
        <div>
           郵便番号 <input id="address_code" class="block mt-1 w-full" type="text" name="address_code"/>
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
        <select class="form-control" id="exampleFormControlSelect1" name="area_id">
            <option >-</option>
            @foreach ($area as $city)


          <option value="{{$city->id}}">{{ $city->area_name }}</option>
          @endforeach
        </select>
      </div>
       <div>
        都道府県<input id="city" class="block mt-1 w-full" type="text" name="city"/>
   </div>
   <div>
    住所<input id="address" class="block mt-1 w-full" type="text" name="address"/>
</div>
<div class="mt-4">
   営業開始時間 <input id="open_time" class="block mt-1 w-full" type="time" name="open_time"/>
</div>
<div class="mt-4">
   営業終了時間 <input id="close_time" class="block mt-1 w-full" type="time" name="close_time"/>
</div>
<div>
   予約締切時間 <input id="reserve_limit" class="block mt-1 w-full" type="time" name="reserve_limit"/>
</div>


        <div>
            <input type="submit" value="送信"/>
        </div>
    </form>
</body>
</html>
