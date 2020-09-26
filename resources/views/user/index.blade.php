@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">ユーザー一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">名前</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">削除</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>
                    <a href="/manage/user/{{ $user->id }}/edit">{{ $user->id }}</a>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    <form action="/manage/user/{{ $user->id }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div><a href="/manage/user/create" class="btn btn-default">新規作成</a></div>
            <div><a href="/manage/top">戻る</a></div>
        </div>
    </div>
</div>
{{ $users->links() }}
@endsection