<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>FAKE HITOSARA</title>
        <style>body {padding: 10px;}</style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- bootstrap.css を読み込みする -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet">
    </head>


<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <nav class="navbar navbar-icon-top navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="/home">FAKE HITOSARA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/home">
              <i class="fa fa-home"></i>
              ホーム
              <span class="sr-only">(current)</span>
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              お店をさがす
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-envelope-o">
                <span class="badge badge-warning">11</span>
              </i>
              予約の確認
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contacts/create">
              <i class="fa fa-envelope-o">
              </i>
              お問い合わせ
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ">
        @if (isset($user))
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-envelope-o">
              </i>
              {{$user->name}}さん
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">プロフィール</a>
                <a class="dropdown-item" href="#">お気に入り店舗</a>
                @if ($user != null && $user->owner ==True)
                <a class="dropdown-item" href="#">
                    店舗情報登録</a>
                @endif
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">ログアウト</a>
            </div>
          </li>
        @elseif (isset($user) == null)
            <li class="nav-item">
            <a class="nav-link" href="#">
                ログイン
            </a>
            </li>
        @endif
        </ul>
      </div>
    </nav>

    <hr>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
