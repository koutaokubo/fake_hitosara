@extends('.layout')

@section('content')

<div class = "container">
@can('system-only')

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
        <td colspan="2">{{ $article->category->name }}</td>
    </tr>
    <tr>
        <th scope="row">お問い合わせ・質問内容</th>
        <td colspan="2">{{ $article->text }}</td>
    </tr>
</tbody>
</table>
    @if($article->category_id == 2 && $send_user->role == 0)
    <form method="post" action="/contacts/{{$article->id}}">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="shop" value="{{ Auth::user()->role}}">
      <input type="hidden" name = "send_user_id" value = {{$article->user_id}}>
      <input type="submit" class="btn btn-primary" value="店舗承認">
      @csrf
    </form>
    @elseif($article->category_id == 2 && $send_user->role != 0)
    <button type="button" class="btn btn-primary" disabled data-bs-toggle="button" autocomplete="off">店舗承認済み</button>
    @endif
</div>
@endforeach
@else
<a>データがありません</a>
@endif

@elsecan('user-higher')
    <div mb-3>
            <h3>ページの期限が切れています。</h3>
    </div>
@endcan
</div>

@endsection
