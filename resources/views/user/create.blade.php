@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
@include('user/form', ['target' => 'store'])
@endsection