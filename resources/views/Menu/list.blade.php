@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>登録メニュー</h2>
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
        @foreach ($menus as $menu)
        <tr>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->charge }}</td>
                <td>{{ $menu->course_time }}</td>
                <td>
                    <form action="/menu/edit/{{ $menu->id }}" method="get">
                        <input type="submit"  name="edit" value="編集">
                        @csrf
                    </form>
                </td>
                <td>
                    <form action="/menu/delete/" method="post">
                        <input type="hidden"  name="id" value="{{ $menu->id }}">
                        <input type="submit"  name="delete" value="削除">
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>メニューがありません</p>
@endif

</div>
@endsection
