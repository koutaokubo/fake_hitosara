@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>プロフィール変更</h2>
<br>

@if(Auth::check())
    <form action="/mypage/{{ Auth::id() }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <div>

    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    <label for="name" class="form-label">名前
        <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
    </label></div>
    
    <div>
        <label for="email">メールアドレス
        <input type="text" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
    </label></div>

    <div class="mt-4">
      <label for="password" class="form-label">現在のパスワード
        <input id="password" class="form-control"  type="password" name="password" value="">
      </label>
      </div>
      
      <div class="mt-4">
      <label for="new_password" class="form-label">新しいパスワード
        <input id="new_password" class="form-control"  type="password" name="new_password" value="">
      </label>
      </div>

      <div class="mt-4">
      <label for="confirm_password" class="form-label">確認用パスワード(新しいパスワードをもう一度入力してください)
        <input id="confirm_password" class="form-control"  type="password" name="confirm_password" value="">
      </label>
      </div>

    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary btn-lg" value="更新">
      </div>

    @csrf
</form>
@else
<br>
<p>ページのセッションが切れています。</p>
@endif
@endsection