@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">SNS一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">SNS名</th>
                    <th class="text-center">SNS画像</th>
                    <th class="text-center">削除</th>
                </tr>
                @foreach($sns_list as $sns)
                <tr>
                    <td>
                    <a href="/manage/sns/{{ $sns->id }}/edit">{{ $sns->id }}</a>
                    </td>
                    <td>{{ $sns->sns_name }}</td>
                    <td>{{ $sns->sns_image }}</td>
                    <td>
                    <form action="/manage/sns/{{ $sns->id }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div><a href="/manage/sns/create" class="btn btn-default">新規作成</a></div>
            <div><a href="/manage/top">戻る</a></div>
        </div>
    </div>
</div>
{{ $sns_list->links() }}
@endsection