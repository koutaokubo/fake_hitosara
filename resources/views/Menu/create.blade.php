@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>コースメニュー作成</h2>
<br>
    <form method="post" action="/menu/confirm" name="action" >
        @csrf
        <div>
          <label for="store_id" class="form-label">店名
            {{old('store_name', $stores->name)}}
            <input id="store_name" class="form-control" type="hidden" name="store_name" value="{{old('store_name', $stores->name)}}">
            <input id="store_id" class="form-control" type="hidden" name="store_id" value="{{old('store_id', $stores->id)}}"/>
          </label>
        </div>
        <div>
          <label for="name" class="form-label">コース名
            <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}"/>
          </label>
        </div>

        <div>
          <label for="charge" class="form-label">料金
            <input id="charge" class="form-control" type="text" name="charge" value="{{old('charge')}}"/>
          </label>
        </div>

        <div>
          <label for="course_time" class="form-label">時間
            <input id="course_time" class="form-control" type="time" name="course_time" value="{{old('course_time')}}"/>
          </label>
        </div>

      <div class="text-center">
        <input type="submit" class="btn btn-primary btn-lg" value="送信">
      </div>

    </form>
</div>
@endsection
