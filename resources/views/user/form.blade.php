<div class="container user-form">
    <div class="">
            <h2>ユーザー登録</h2>
    </div>
    <div class="">
        @if($target == 'store')
        <form name="user_regist" action="/manage/user" method="post">
        @elseif($target == 'update')
        <form name="user_regist" action="/manage/user/{{ $user->id }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="price">メールアドレス</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="author">パスワード</label>
                <input type="text" class="form-control" name="password" value="{{ $user->password }}">
            </div>
            <div class="form-group">
                <label for="page_show">サイト表示・非表示</label>
                <div class="form-check">
                  @if($user->page_show == 0)
                  <input class="form-check-input" type="radio" name="page_show" id="page_show_option_1" value="1">
                  @else
                  <input class="form-check-input" type="radio" name="page_show" id="page_show_option_1" value="1" checked>
                  @endif
                  <label class="form-check-label" for="page_show_option_1">表示</label>
                </div>
                <div class="form-check">
                  @if($user->page_show == 0)
                  <input class="form-check-input" type="radio" name="page_show" id="page_show_option_2" value="0" checked>
                  @else
                  <input class="form-check-input" type="radio" name="page_show" id="page_show_option_2" value="0" >
                  @endif
                  <label class="form-check-label" for="page_show_option_2">非表示</label>
                </div>
            </div>

            
            <div id="sns_info">
                @foreach($userSns_list as $userSns)
                <div class="sns_input">
                    <div class="form-group">
                        <label for="_sns_id">SNS</label>
                        <select name="_sns_id" class="form-control" value="{{$userSns->sns_id}}">
                            <option value="">---選択してください</option>
                            @foreach($sns_list as $sns)
                                @if($userSns->sns_id == $sns->id)
                                <option value="{{ $sns->id }}" selected>{{ $sns->sns_name }}</option>
                                @else
                                <option value="{{ $sns->id }}">{{ $sns->sns_name }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label>SNS url</label>
                        <input type="text" class="form-control" name="_sns_url" value="{{ $userSns->sns_url }}">
                    </div>
                    <input type="button" value="＋" class="add pluralBtn">
                    <input type="button" value="－" class="del pluralBtn">
                </div>
                @endforeach
            </div>
            
            <input type="hidden" name="sns_id" value="">
            <input type="hidden" name="sns_url" value="">
            <button type="button" class="btn btn-default" onclick="getSnsInfo()">登録</button>
            <a href="/manage/user">戻る</a>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", ".add", function() {
    var clone_tag = $(this).parent().clone(true)
    clone_tag.find('input:not([type="button"]), select').val('').prop('checked', false).change();
    clone_tag.insertAfter($(this).parent());
});

$(document).on("click", ".del", function() {
    var target = $(this).parent();
    if (target.parent().children().length > 1) {
        target.remove();
    }
});

function getSnsInfo(){
    var sns_info_list = document.getElementById("sns_info");
    var _sns_id = sns_info_list.querySelectorAll('select[name="_sns_id"]');
    var _sns_url = sns_info_list.querySelectorAll('input[name="_sns_url"]');
    console.log(_sns_id);
    console.log(_sns_url);

    var sns_id="";
    for(i=0; i<_sns_id.length; i++){
        if(sns_id.length==0){
            sns_id += _sns_id[i].value;
        }else{
            sns_id += ", " + _sns_id[i].value;
        }
    }

    var sns_url="";
    for(i=0; i<_sns_url.length; i++){
        if(sns_url.length==0){
            sns_url += _sns_url[i].value;
        }else{
            sns_url += ", " + _sns_url[i].value;
        }
    }

    document.forms['user_regist'].elements['sns_id'].value = sns_id;
    document.forms['user_regist'].elements['sns_url'].value = sns_url;

    document.forms['user_regist'].submit();
}
</script>