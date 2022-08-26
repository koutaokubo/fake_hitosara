@extends('.layout')

@section('content')

<div class = "container">

<form method="post" action="/contacts" name="action" value="confirm">
    <div class="form-group mb-3">
        <label for="exampleFormControlSelect1" class="form-labe" >お問い合わせの種類</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
          @foreach ($category as $title)
          <option value ={{ $title->id }} > {{ $title->name }} </option>
          @endforeach
        </select>

        <label for="exampleFormControlSelect1" class="form-label">ご意見・お問い合わせ内容</label>
        <input id="text" class="form-control" type="text" name="text">
    </div>

@csrf
    <div class = "mb-3">
        <input type="submit" class="btn btn-primary" value="送信">
    </div>
</form>
</div>

@endsection