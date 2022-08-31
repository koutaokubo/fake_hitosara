@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>プロフィール</h2>
<br>

@if(Auth::check())
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
    <p><a href="{{ url('/mypage/Auth::id()/edit') }}">プロフィール変更</a></p>
    <p><a href="{{ url('/mypage/delete') }}">退会</a></p>
@else
<br>
<p>ページのセッションが切れています。</p>
@endif
@endsection