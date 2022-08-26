@extends('.layout')

@section('content')

@if ($contacts != null)
@foreach ($contacts as $article)
<div class="m-5">

<br>
<table class="table">
    <tbody>
      <tr>
        <th scope="row">お問い合わせid</th>
        <td>{{ $article->id }}</td>
      </tr>
      <tr>
        <th scope="row">状態</th>
        @if($article->done==True)
        <td>対応済</td>
        @elseif ($article->done==False)
        <td class="text-success">未対応</td>
        @endif
      </tr>
      <tr>
        <th scope="row">お問い合わせジャンル</th>
        @foreach ($category as $title)
        @if($article->category_id == $title->id)
        <td colspan="2">{{ $title->name }}</td>
        @endif
        @endforeach
    </tr>
    <tr>
        <th scope="row">お問い合わせ・質問内容</th>
        <td colspan="2">{{ $article->text }}</td>
    </tr>
</tbody>
</table>
@foreach ($category as $title)
    @if($article->category_id == $title->id && $article->category_id == 2 && $user->role == 0)
    <form method="post" action="/contacts/{{$article->id}}">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="shop" value="{{$user->role}}">
      <input type="hidden" name = "send_user_id" value = {{$article->user_id}}>
      <input type="submit" class="btn btn-primary" value="店舗承認">
      @csrf
    </form>
    @elseif($article->category_id == $title->id && $article->category_id == 2 && $user->role != 0)
    <button type="button" class="btn btn-primary" disabled data-bs-toggle="button" autocomplete="off">店舗承認済み</button>
    @endif
@endforeach
</div>
@endforeach
@else
<a>データがありません</a>
@endif

@endsection
