@extends('manage/layout')

@section('link')
@include('manage/link', ['target' => 'store'])
@endsection

@section('content')
@include('/category/form', ['target' => 'store'])
@endsection