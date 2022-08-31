@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>退会画面</h2>
<br>

@if(Auth::check())
<p><a>本当に退会しますか？</a>
                    <form action="/mypage/{{ Auth::id() }}" method="post" >
                        <input type="submit"  name="delete" value="退会">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                    </form></a></p>
<table class ="table">
    <tr>
        <td>名前</td>
        <td>{{ Auth::user()->name }}さん</td>
    </tr>
    <tr>
        <td>会員ステータス</td>
        <td>
            @if(Auth::user()->role ==0)
                一般
            @elseif (Auth::user()->role ==1)
                店舗管理者
            @else
                開発者
            @endif
        </td>
    </tr>
    <tr>
        <td>メールアドレス</td>
        <td>{{ Auth::user()->email }}</td>
    </tr>
</table>
@else
<br>
<p>ページのセッションが切れています。</p>
@endif
@endsection