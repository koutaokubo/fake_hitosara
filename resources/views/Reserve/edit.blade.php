@extends('.layout')

@section('content')

<div class = "container">
<div class="text-center">

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @php
        // $store_name = old('store_name');
        // $reserve_date = old($request->reserve_date);
        // $reserve_time = old($request->reserve_time);
        // $menu = old($request->menu_name);
    @endphp
    <form action="{{route('reserve.update', $reserve->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="reserve_date" class="form-label">予約日
                <input type="date" class="form-control" name="reserve_date" value="{{old('reserve_date', $reserve_date)}}">
            </label>
        </div>

        <div>
            <label for="reserve_date" class="form-label">予約時間
                <input type="time" class="form-control" name="reserve_time" value="{{old('reserve_time', $reserve_time)}}">
            </label>
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">メニュー
                <select class="form-control" id="exampleFormControlSelect1" name="menu_id">
                    <option >-</option>
                    @foreach ($menus as $menu)

                <option  value="{{$menu->id}}"
                    @if ($menu->id == old('menu_id', $reserve->menu_id))
                    selected
                    @endif
                    >{{ $menu->name }}</option>
                @endforeach
                </select>
            </label>
        </div>
        <div>
            <input type="hidden" name="store_id" value="{{old('store_id', $store->id)}}">
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary btn-lg" value="更新">
        </div>
        @csrf
        @method('PUT')
    </form>
</div>
</div>
@endsection
