@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>予約入力</h2>
<br>
    <form method="post" action="{{ route('reserve.confirm') }}" name="action" value="confirm">
        @csrf
        <div class="mt-4">
            ご来店予定日 <input class="block mt-1 w-full" type="date" name="date"/>
        </div>
        <div class="mt-4">
            ご来店予定時間 <input class="block mt-1 w-full" type="time" name="time"/>
        </div>
        <div class="mt-4">
          <select class="form-control" name="menu_id">
            <option >-</option>
            @foreach ($menus as $menu)
              <option  value="{{$menu->id}}">{{ $menu->name }}</option>
            @endforeach
        </select>
        </div>
<br>
        <div class="text-center">
            <input type="submit" class="btn-primary" value="送信">
        </div>
        <div>
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <input type="hidden" name="store_id" value="{{$store->id}}">
        </div>
    </form>

    
    </div>
@endsection