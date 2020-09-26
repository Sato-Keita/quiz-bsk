@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">Quiz一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">メインイメージ</th>
                    <th class="text-center">質問</th>
                    <th class="text-center">削除</th>
                </tr>

                @foreach($quizzes as $quiz)
                <tr>
                    <td>
                    <a href="/manage/quiz/{{ $quiz->id }}/edit">{{ $quiz->id }}</a>
                    </td>
                    <td>{{ $quiz->main_image }}</td>
                    <td>{{ $quiz->question }}</td>
                    <td>
                    <form action="/manage/quiz/{{ $quiz->id }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div><a href="/manage/quiz/create" class="btn btn-default">新規作成</a></div>
            <div><a href="/manage/top">戻る</a></div>
        </div>
    </div>
</div>
{{ $quizzes->links() }}
@endsection