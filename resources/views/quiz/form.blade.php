<div class="container quiz-form">
    <div class="">
            <h2>Quiz登録</h2>
    </div>
    <div class="">
        @if(count($errors)>0)
            <p>入力に問題があります。再入力してください。</p>
        @endif

        @if($target == 'store')
        <form name="quiz_regist" action="/manage/quiz" method="post" enctype="multipart/form-data">
        @elseif($target == 'update')
        <form name="quiz_regist" action="/manage/quiz/{{ $quiz->id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            @if( $errors->has('file') )
                @foreach( $errors->get('file') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <div class="form-group">
                <label for="name">メインイメージ</label>
                <input type="file" class="form-control" name="file" value="{{ $quiz->main_image }}">
            </div>

            @if( $errors->has('question') )
                @foreach( $errors->get('question') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <div class="form-group">
                <label for="question">問題文</label>
                <input type="text" class="form-control" name="question" value="{{ $quiz->question }}">
            </div>

            @if( $errors->has('category_id') )
                @foreach( $errors->get('category_id') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <div id="category_info">
                @foreach($quiz_categories as $quiz_category)
                <div class="category_input">
                    <div class="form-group">
                        <label for="_category_id">Category</label>
                        <select name="_category_id" class="form-control" value="{{$quiz_category->category_id}}">
                            <option value="">---選択してください</option>
                            @foreach($categories as $category)
                                @if($quiz_category->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <input type="button" value="＋" class="add pluralBtn">
                    <input type="button" value="－" class="del pluralBtn">
                </div>
                @endforeach
            </div>
            <input type="hidden" name="category_id" value="">

            @if( $errors->has('selection') )
                @foreach( $errors->get('selection') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <div id="select_info">
                @foreach($selects as $select)
                <div class="select_input">
                    <div class="form-group">
                        <label for="_selection">選択肢</label>
                        <input type="text" class="form-control" name="_selection" value="{{ $select->selection }}">
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="form-group form-check">
                            @if($select->is_answer == 1)
                            <input class="form-check-input check-box" type="checkbox" name="_is_answer" id="_is_answer" value="1" checked>
                            @else
                            <input class="form-check-input check-box" type="checkbox" name="_is_answer" id="_is_answer" value="1" >
                            @endif
                            <label class="form-check-label" for="is_answer">正解</label>
                        </div>
                    </div>
                    
                    
                    <input type="button" value="＋" class="add pluralBtn">
                    <input type="button" value="－" class="del pluralBtn">
                </div>
                @endforeach
            </div>
            <input type="hidden" name="selection" value="">
            <input type="hidden" name="is_answer" value="">

            @if( $errors->has('answer') )
                @foreach( $errors->get('answer') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <div class="form-group">
                <label for="answer">答え</label>
                <input type="text" class="form-control" name="answer" value="{{ $quiz->answer }}">
            </div>

            @if( $errors->has('explain') )
                @foreach( $errors->get('explain') as $error_msg)
                <p>{{$error_msg}}</p>
                @endforeach
            @endif
            <div class="form-group">
                <label for="explain">解説</label>
                <input type="text" class="form-control" name="explain" value="{{ $quiz->explain }}">
            </div>
            
            <button type="button" class="btn btn-default" onclick="getQuizInfo()">登録</button>
            <a href="/manage/quiz">戻る</a>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", ".add", function() {
    var clone_tag = $(this).parent().clone(true);
    clone_tag.find('input:not([type="button"])').val('').prop('checked', false).prop('selected', false).change();
    clone_tag.insertAfter($(this).parent());
});

$(document).on("click", ".del", function() {
    var target = $(this).parent();
    if (target.parent().children().length > 1) {
        target.remove();
    }
});

$(".check-box").on("click", function(){
        $('.check-box').prop('checked', false);  //  全部のチェックを外す
        $(this).prop('checked', true);  //  押したやつだけチェックつける
});

function getQuizInfo(){
    var category_info_list = document.getElementById("category_info");
    var _category_id = category_info_list.querySelectorAll('select[name="_category_id"]');
    
    var category_id="";
    for(i=0; i<_category_id.length; i++){
        if(category_id.length==0){
            category_id += _category_id[i].value;
        }else{
            category_id += ", " + _category_id[i].value;
        }
    }
   
    document.forms['quiz_regist'].elements['category_id'].value = category_id;
    

    var select_info_list = document.getElementById("select_info");
    var _selection = select_info_list.querySelectorAll('input[name="_selection"]');
    var _is_answer = select_info_list.querySelectorAll('input[name="_is_answer"]');

    var selection = "";
    for(i=0; i<_selection.length; i++){
        if(selection.length==0){
            selection += _selection[i].value;
        }else{
            selection += ", " + _selection[i].value;
        }
    }

    var is_answer = "";
    var answer_flg = false;
    for(i=0; i<_is_answer.length; i++){
        if(is_answer.length==0){
            is_answer += _is_answer[i].checked?"1":"0";
        }else{
            is_answer += ", " ;
            is_answer +=_is_answer[i].checked?"1":"0";
        }

        if(_is_answer[i].checked) answer_flg=true;
    }

    console.log(answer_flg);

    document.forms['quiz_regist'].elements['selection'].value = selection;
    document.forms['quiz_regist'].elements['is_answer'].value = is_answer;

    document.forms['quiz_regist'].submit();
}
</script>