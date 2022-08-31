@extends('.layout')

@section('content')

<div class = "container">
<div class="text-center">
@if ($stores != null)
    @if (Auth::check())
        {{-- @foreach ($reserves as $reserve)
            <p>{{$reserve->id}} {{ Auth::user()->name }}</p>
        @endforeach
        @foreach ($stores as $store)
            <a href="{{ route('store.detail', ['store_id' => $store->id, 'area_id' => $store->area_id]) }}">{{$store->name}}</a>
        @endforeach --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">お名前</th>
                    <th scope="col">お店</th>
                </tr>
            </thead>
        
            @for ($i = 0; $i < count($reserves); $i++)
                <tr>
                    <td>{{ $reserves[$i]->id }}</td>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ $stores[$i]->name }}</td>
                    <td>
                        <form action="{{route('reserve.edit', $reserves[$i])}}" method="get">
                            <input type="submit"  name="edit" value="編集">
                            @csrf
                        </form>
                    </td>
                    <td>
                        <form action="{{route('reserve.delete', $reserves[$i]->id)}}" method="post">
                            <input type="submit"  name="delete" value="削除">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endfor
        </table>
        {{-- @for ($i = 0; $i < count($reserves); $i++)
            <p>{{$reserves[$i]->id}}
                {{Auth::user()->name }}
                <a href="{{ route('store.detail', ['store_id' => $stores[$i]->id, 'area_id' => $stores[$i]->area_id]) }}">{{$stores[$i]->name}}</a>
            </p>
        @endfor --}}
    @endif
@else
    <br>
        <p>予約はありません</p>
    <br>
<a href="/home" class="btn btn-primary" role="button" data-bs-toggle="button">予約する</a>

@endif
</div>
</div>
@endsection