@extends('.layout')

@section('content')

<div class = "container">
@if ($stores != null)

    {{-- @foreach ($stores as $store)
        <p>{{$store->id}}</p>
    @endforeach --}}

<br>
<h2>登録店舗一覧</h2>
<br>
@if ($stores->count() > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">お名前</th>
            <th scope="col">ジャンル</th>
            <th scope="col">郵便番号</th>
            <th scope="col">都道府県</th>
            <th scope="col">住所</th>
            <th scope="col">営業開始時間</th>
            <th scope="col">営業終了時間</th>
            <th scope="col">予約締切時間</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thread>

        @foreach ($stores as $store)
        <!-- 自分の作った店舗のみ・管理者のみ全店表示 -->
        @if (Auth::check() && $store->user_id == Auth::user()->id || @can('system-only'))
            <tr>

                <td>{{ $store->name }}</td>
                <td>{{ $store->genre->food_genre }}</td>
                <td>{{ $store->address_code }}</td>
                <td>{{ $store->area->area_name }}</td>
                <td>{{ $store->address }}</td>
                <td>{{ $store->open_time }}</td>
                <td>{{ $store->close_time }}</td>
                <td>{{ $store->reserve_limit }}</td>
                <td>
                <form action="menu/create/{{$store->id}}" method="GET">
                    <div>
                        <input type="submit" value="メニュー登録">
                    </div>
                </form>
                </td>
                <td>
                <form action="menu/list/{{$store->id}}" method="GET">
                    <div>
                        <input type="submit" value="メニュー一覧">
                    </div>
                </form>
                </td>
                <td>

                    <form action="/store/{{ $store->id }}/edit" method="get">
                        <input type="submit"  name="edit" value="編集">
                        @csrf
                    </form>
                </td>
                <td>

                    <form action="/store/{{ $store->id }}" method="post" >
                        <input type="submit"  name="delete" value="削除">
                        <input type="hidden" name="_method" value="DELETE">

                        @csrf
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>
@else
    <p>登録店舗なし</p>
@endif

<form action="store/create" method="GET">
    <div>
        <input type="submit" value="追加">
    </div>
</form>


@else
    <p>店舗登録がありません</p>
 @endif
</div>
</div>
@endsection
