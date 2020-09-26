@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
@include('sns/form', ['target' => 'store'])
@endsection