@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
<div class="container">
    <a class="btn" href="/manage/user">User一覧</a>
    <a class="btn" href="/manage/sns">SNS一覧</a>
    <a class="btn" href="/manage/category">Category一覧</a>
    <a class="btn" href="/manage/quiz">Quiz一覧</a>
</div>
@endsection