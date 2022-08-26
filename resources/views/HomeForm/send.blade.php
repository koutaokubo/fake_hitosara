@extends('.layout')

@section('content')

<div class = "container">
    @if(isset($article))
    <div mb-3>
        <h3>ご意見・質問ありがとうございました。</h3>
        <a>以下の内容で送信されました。</a>
    </div>
    <div m-3>
        <table>
        @foreach ($article as $contact)
        <tr><td>お問い合わせの種類</td>
            <td>{{ $contact->id }}</td></tr>
        <tr><td>ご意見・お問い合わせ内容</td>
            <td>{{ $contact->text }}</td></tr>
        </table>
        @endforeach
    </div>
    @else
    <div mb-3>
        <h3>ページの期限が切れています。</h3>
    </div>
    @endif

</div>

@endsection