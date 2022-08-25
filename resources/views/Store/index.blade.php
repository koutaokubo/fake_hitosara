<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @foreach ($stores as $store)
        <p>{{$store->id}}</p>
    @endforeach --}}

<h2>登録店舗一覧</h2>

@if ($stores->count() > 0)
    <table border="1">
        <tr>
            <th>お名前</th>
            <th>郵便番号</th>
            <th>エリア</th>
            <th>ジャンル</th>
            <th>都道府県</th>
            <th>住所</th>
            <th>営業開始時間</th>
            <th>営業終了時間</th>
            <th>予約締切時間</th>
        </tr>


        @foreach ($stores as $store)
            <tr>

                <td>{{ $store->name }}</td>
                <td>{{ $store->address_code }}</td>
                <td>{{ $store->area->area_name }}</td>
                <td>{{ $store->genre->food_genre }}</td>
                <td>{{ $store->city }}</td>
                <td>{{ $store->address }}</td>
                <td>{{ $store->open_time }}</td>
                <td>{{ $store->close_time }}</td>
                <td>{{ $store->reserve_limit }}</td>
                <td>

                    <form action="/store/{{ $store->id }}/edit" method="get">
                        <input type="submit"  name="edit" value="編集">
                        @csrf
                    </form>
                </td>
                <td>

                    <form action="/store/{{ $store->id }}" method="post"  >
                        <input type="submit"  name="delete" value="削除">
                        <input type="hidden" name="_method" value="DELETE">

                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>登録店舗なし</p>
@endif

<form action="store/create" method="GET">
    <div>
        <input type="submit" value="作成">
    </div>
</form>
</body>
</html>
