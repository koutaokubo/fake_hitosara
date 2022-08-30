@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>ご意見・お問い合わせフォーム</h2>
<br>
    @if(isset($contacts))
    <div mb-3>
        <h3>ご意見・お問い合わせ、ありがとうございました</h3>
        <p>以下の内容で送信されました。</p>
    </div>
    <div m-3>
        @foreach ($contacts as $contact)
        <div class="row">
        <label>お問い合わせの種類：</label>
            <div class="col-sm-10">
            @foreach ($categories as $item)
            {{$item->name}}
            @endforeach
            </div>
        </div>

        <div class="row">
        <label>ご意見・お問い合わせ内容</label>
            <div class="col-sm-10 border">
            {{ $contact->text }}
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div mb-3>
        <h3>ページの期限が切れています。</h3>
    </div>
    @endif

</div>

@endsection