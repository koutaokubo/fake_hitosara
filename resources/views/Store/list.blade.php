<h2>登録店舗一覧</h2>

@if ($stores->count() > 0)
    <table border="1">
        <tr>
            <th>ID</th>
            <th>お名前</th>
            <th>送信日時</th>
            <th>編集</th>
            <th>削除</th>
        </tr>

        @foreach ($stores as $store)
            <tr>

                <td>{{ $store->name }}</td>
                <td>{{ $store->address_code }}</td>
                <td>{{ $store->area_id }}</td>
                <td>{{ $store->genre_id }}</td>
                <td>{{ $store->city }}</td>
                <td>{{ $store->address }}</td>
                <td>{{ $store->open_time }}</td>
                <td>{{ $store->close_time }}</td>
                <td>{{ $store->reverse_limit }}</td>
                <td>

                    <form action="/Store/edit/{{ $store->id }}" method="get">
                        <input type="submit"  name="edit" value="編集">
                        @csrf
                </td>
                <td>

                    <form action="/Store/delete/{{ $store->id }}" method="post">
                        <input type="submit"  name="delete" value="削除">
                        @csrf
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>登録店舗なし</p>
@endif
