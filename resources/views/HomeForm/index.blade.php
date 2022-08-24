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
          {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name=search value="{{ $search }}">
          {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
          @if ($Search_store)
            @foreach ($Search_store as $item)
              <p>{{$item->name}}</p>
            @endforeach
          @endif
          <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
    @csrf
    </div>

</form>

@endsection

