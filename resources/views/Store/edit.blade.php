@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>編集</h2>
<br>


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
    <label for="name" class="form-label">名前
        <input type="text" class="form-control" name="name" id="name" value="{{old('name', $edit->name)}}">
    </label></div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect1">ジャンル
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
    </label></div>
    <div>
        <label for="address_code">郵便番号
        <input type="text" class="form-control" name="address_code" id="address_code" value="{{old('address_code', $edit->address_code)}}">
    </label></div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">エリア
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
      </label></div>

    <div>
    <label for="address" class="mt-2 form-label">市区町村</label>
        <input type="text" class="form-control" name="address" id="address" value="{{old('address', $edit->address)}}">
    </div>

    <div class="mt-4">
      <label for="open_time" class="form-label">
        営業開始時間 <input id="open_time" class="form-control"  type="time" name="open_time" value="{{old('open_time', $edit->open_time)}}"/>
      </label>
      </div>
      
      <div class="mt-4">
      <label for="close_time" class="form-label">
        営業終了時間 <input id="close_time" class="form-control" type="time" name="close_time" value="{{old('close_time', $edit->close_time)}}}"/>
      </label>
      </div>

      <div class="mt-4">
        <label for="reserve_limit"  class="form-label">
        予約締切時間<input type="time" class="form-control" name="reserve_limit" id="reserve_limit" value="{{old('reserve_limit', $edit->reserve_limit)}}">
        </label>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary btn-lg" value="更新">
      </div>

    @csrf
</form>

</div>
@endsection
