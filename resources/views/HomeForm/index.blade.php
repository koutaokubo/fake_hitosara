@extends('.layout')

@section('content')

<div class="container">
<form class="container-fluid me-2" action="/home" method="get">
    <div class="form-group">
        <label for="exampleFormControlSelect1">ジャンル</label>
        <select class="form-control" id="exampleFormControlSelect1" name="genre">
          <option>-</option>
          @foreach ($genres as $foods)
          <option value = {{$foods->id}}>{{ $foods->food_genre }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">エリア</label>
        <select class="form-control" id="exampleFormControlSelect1" name="area">
          <option>-</option>
          @foreach ($area as $city)
          <option value = {{$city->id}}>{{ $city->area_name }}</option>
          @endforeach
        </select>
      </div>
      <div>
          {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name=search value="{{ $search }}">
          {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
            @foreach ($search_stores as $store)
              <p>{{$store->name}}</p>
            @endforeach
          <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
    @csrf
    </div>

</form>

@endsection

