@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
@include('quiz/form', ['target' => 'store'])
@endsection