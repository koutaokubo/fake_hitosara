<h2>編集</h2>

<form action="/Store/edit/{{$store->id}}" method="POST">
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" value="{{old('name', $store->name)}}">

        {{-- @if ($errors->has('name'))
            <p class="error">*{{ $errors->first('name') }}</p>
        @endif --}}
    </div>
    <div>
        <input type="submit" value="送信">
    </div>

    @csrf
</form>
