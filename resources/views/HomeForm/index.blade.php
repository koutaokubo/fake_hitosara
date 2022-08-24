@extends('.layout')

@section('content')

<div class="container">
<form class="container-fluid me-2" action="/home" method="get">
    <div class="form-group">
        <label for="exampleFormControlSelect1">ジャンル</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>-</option>
          @foreach ($genres as $foods)
          <option>{{ $foods->food_genre }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">エリア</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>-</option>
          @foreach ($area as $city)
          <option>{{ $city->area_name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <table>
            <td>
                {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name=search value="{{ $search }}">
            </td>
            <td>
                {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
                <button class="btn btn-outline-success" type="submit">Search</button>
            </td>
        </table>
        @if ($Search_store)
        @foreach ($Search_store as $item)
        <p>検索結果</p>
        <table>
          <tr>
            <td>{{$item->name}}</td>
            <td>
                <input class="btn btn-outline-success" type="button" value="詳細" name="detail">
            </td>
            <td>
              <input class="btn btn-outline-success" type="button" value="予約" name="reserve">
            </td>
          </tr>
        </table>
        @endforeach
        @endif
      </div>
    @csrf
    </div>

</form>

@endsection

