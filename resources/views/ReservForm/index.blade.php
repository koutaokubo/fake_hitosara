@extends('.layout')

@section('content')

<div class="container">
<form class="container-fluid me-2" action="/MessageBoard/index" method="POST">
    <div class="form-group">
        <label for="exampleFormControlSelect1">ジャンル</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>-</option>
          <option>中華</option>
          <option>和食</option>
          <option>イタリアン</option>
          <option>フレンチ</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">エリア</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>-</option>
          <option>東京</option>
          <option>名古屋</option>
          <option>大阪</option>
          <option>福岡</option>
        </select>
      </div>
      <div>
          {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
          <form aciton="route{{store}}"method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name=search value="{{ $search }}">
          <button class="btn btn-outline-success" type="submit">Search</button>
          @if (isset($searchStores))
              @foreach ($searchStores as $store)
                  <a href="#">{{$store->name}}</a>
              @endforeach
          @endif
      </div>
    @csrf
    </div>

</form>

@endsection

