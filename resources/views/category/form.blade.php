<div class="container sns-form">

    <div class="">
        <h2>Category登録</h2>
    </div>

    <div class="">
        @if(count($errors)>0)
        <p>入力に問題があります。再入力してください。</p>
        @endif

        @if($target == 'store')
        <form action="/manage/category" method="post">
        @elseif($target == 'update')
        <form action="/manage/category/{{ $category->id }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @endif
            @if( $errors->has('category_name') )
                @foreach( $errors->get('category_name') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="sns_name">Category名</label>
                <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
            </div>
            <button type="submit" class="btn btn-default">登録</button>
            <a href="/manage/category">戻る</a>
        </form>
    </div>
    
</div>