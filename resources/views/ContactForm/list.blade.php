@extends('.layout')

@section('content')
<div class = "container">
@can('system-only')
<br>
<h2>ご意見・お問い合わせ一覧</h2>
<br>

    @if ($contacts->count() > 0)
    <table class="table">
    <tr><th>ID</th><th>お名前</th><th>カテゴリ</th><th>送信日時</th><th></th></tr>
    @foreach ($contacts as $contact)
    @if($contact->done == TRUE)
    <tr class="table-active">
    @else
    <tr>
    @endif
    <td>{{ $contact->id }}</td>
    <td>{{ $contact->User->name }}</td>
    <td>
        @if($contact->category_id == 1 )
            ご意見・お問い合わせ
        @elseif( $contact->category_id == 2 )
            店舗登録申請
        @endif
        
    </td>
    <td>{{ $contact->created_at }}</td>
    <td><a href="/contacts/{{$contact->id}}/edit">詳細</a></td>
    </tr>
    @endforeach
    </table>
    @else
    <p>お問い合わせがありません</p>
    @endif
@else
    <div mb-3>
            <h3>ページの期限が切れています。</h3>
    </div>
@endcan
</div>
@endsection

