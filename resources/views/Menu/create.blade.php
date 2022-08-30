<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/menu/confirm" name="action" >
        @csrf
        <div>
             コース名:<input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}"/>
        </div>
        <div>
           料金:<input id="charge" class="block mt-1 w-full" type="text" name="charge" value="{{old('charge')}}"/>
       </div>
       <div>
        時間:<input id="course_time" class="block mt-1 w-full" type="time" name="course_time" value="{{old('course_time')}}"/>
      </div>
      <div class="form-group">店名:
        <label for="exampleFormControlSelect1"></label>
        <select class="form-control" id="exampleFormControlSelect1" name="store_id">
            <option >-</option>
            @foreach ($stores as $store)

          <option  value="{{$store->id}}">{{ $store->name }}</option>
          @endforeach
        </select>
      </div>
      <div>

        <input type="submit" value="送信"/>

      </div>

    </form>
</body>
</html>
