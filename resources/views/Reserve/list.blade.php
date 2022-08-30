@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>登録店舗一覧</h2>
<br>

@if ($stores->count() > 0)
    <table border="1">
        <tr>
            <th>ID</th>
            <th>お名前</th>
            <th>送信日時</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($stores as $store)
            <tr>

                <td>{{ $store->name }}</td>
                <td>{{ $store->address_code }}</td>
                <td>{{ $store->city }}</td>
                <td>{{ $store->address }}</td>
                <td>{{ $store->open_time }}</td>
                <td>{{ $store->close_time }}</td>
                <td>{{ $store->reverse_limit }}</td>
                <td>
                    {{-- 各お問い合わせデータごとに、削除ボタンを追加 --}}
                    {{-- 「削除」というデータの内容変更を伴う操作なので、form からPOST メソッドを使う --}}
                    {{-- action先URLにIDを含めて、削除するデータを特定できるようにしておく --}}
                    <form action="/store/edit/{{ $store->id }}" method="get">
                        <input type="submit"  name="edit" value="編集">
                        @csrf
                </td>
                <td>
                    {{-- 各お問い合わせデータごとに、削除ボタンを追加 --}}
                    {{-- 「削除」というデータの内容変更を伴う操作なので、form からPOST メソッドを使う --}}
                    {{-- action先URLにIDを含めて、削除するデータを特定できるようにしておく --}}
                    <form action="/store/delete/{{ $store->id }}" method="post">
                        <input type="submit"  name="delete" value="削除">
                        @csrf
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>店舗がありません</p>
@endif

</div>
@endsection
