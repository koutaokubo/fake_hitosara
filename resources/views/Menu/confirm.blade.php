@extends('.layout')

@section('content')

<div class = "container">
<br>
<h2>登録内容確認</h2>
<br>

<div class="mb-3 row">
        <label>コース名：</label>
        <div class="col-sm-10">
        {{$request->name}}
        </div>
</div>

<div class="mb-3 row">
        <label>料金:</label>
        <div class="col-sm-10">
        {{$request->charge}}
        </div>
</div>

<div class="mb-3 row">
        <label>時間:</label>
        <div class="col-sm-10">
        {{$request->course_time}}
        </div>
</div>

<div class="mb-3 row">
        <label>店名:</label>
        <div class="col-sm-10">
        {{$request->store_name}}
        </div>
</div>

<form action="/menu" method="POST">

    <input type="hidden" name="name" value="{{$request->name}}">
    <input type="hidden" name="charge" value="{{$request->charge}}">
    <input type="hidden" name="course_time" value="{{$request->course_time}}">
    <input type="hidden" name="store_id" value="{{$request->store_id}}">
    <div class="text-center">

        <button class="btn btn-outline-primary btn-lg" type="submit" name="back">
            <i class="fa-solid fa-caret-left"></i>
            戻る
        </button>
        <button class="btn btn-primary btn-lg" type="submit" name="send">
            送信
            <i class="fa-solid fa-caret-right"></i>
        </button>
    </div>
    @csrf
</form>
</div>
@endsection
