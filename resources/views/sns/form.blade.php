<div class="container sns-form">    
    <div class="">
        <h2>SNS登録</h2>
    </div>

    <div class="">
        @if(count($errors)>0)
        <p>入力に問題があります。再入力してください。</p>
        @endif

        @if($target == 'store')
        <form action="/manage/sns" method="post" enctype="multipart/form-data">
        @elseif($target == 'update')
        <form action="/manage/sns/{{ $sns->id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
        @endif
            @if( $errors->has('sns_name') )
                @foreach( $errors->get('sns_name') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="sns_name">SNS名</label>
                <input type="text" class="form-control" name="sns_name" value="{{ $sns->sns_name }}">
            </div>
            
            @if( $errors->has('sns_image') )
                @foreach( $errors->get('sns_image') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <div class="form-group">
                <label for="sns_image">SNS画像</label>
                <input type="file" class="form-control" name="file" value="{{ $sns->sns_image }}">
            </div>
            <div>
                <img src="{{ asset('storage/sns/' . $sns->sns_image) }}" alt="">
            </div>
            <button type="submit" class="btn btn-default">登録</button>
            <a href="/manage/sns">戻る</a>
        </form>
    </div>
    
</div>