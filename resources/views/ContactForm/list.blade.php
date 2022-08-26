@extends('.layout')

@section('content')
<div class = "container">
@can('system-only')

    @if ($contacts->count() > 0)
    <table>
    <tr><th>ID</th><th>お名前</th><th>送信日時</th></tr>
    @foreach ($contacts as $contact)
    <tr>
    <td>{{ $contact->id }}</td>
    <td>{{ $contact->user_id }}</td>
    <td>{{ $contact->category_id }}</td>
    <td>{{ $contact->created_at }}</td>
    <td><a href="/contacts/{{$contact->id}}/edit">詳細</a></td>
    </tr>
    @endforeach
    </table>
    @else
    <p>お問い合わせがありません</p>
    @endif
@elsecan('user-higher')
    <div mb-3>
            <h3>ページの期限が切れています。</h3>
    </div>
@endcan
</div>
@endsection
