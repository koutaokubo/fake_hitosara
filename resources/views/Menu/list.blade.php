@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>登録店舗一覧</h2>
<br>

@if ($menus != null)
    <table class="table">
        <tr>
            <th>メニュー名</th>
            <th>値段</th>
            <th>コース時間</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->charge }}</td>
                <td>{{ $menu->course_time }}</td>
                <td>
                    {{-- 各お問い合わせデータごとに、削除ボタンを追加 --}}
                    {{-- 「削除」というデータの内容変更を伴う操作なので、form からPOST メソッドを使う --}}
                    {{-- action先URLにIDを含めて、削除するデータを特定できるようにしておく --}}
                    <form action="/menu/edit/{{ $menu->id }}" method="get">
                        <input type="submit"  name="edit" value="編集">
                        @csrf
                </td>
                <td>
                    {{-- 各お問い合わせデータごとに、削除ボタンを追加 --}}
                    {{-- 「削除」というデータの内容変更を伴う操作なので、form からPOST メソッドを使う --}}
                    {{-- action先URLにIDを含めて、削除するデータを特定できるようにしておく --}}
                    <form action="/menu/delete/{{ $menu->id }}" method="post">
                        <input type="submit"  name="delete" value="削除">
                        @csrf
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>メニューがありません</p>
@endif

</div>
@endsection
