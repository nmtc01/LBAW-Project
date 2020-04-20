@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/question.css') }}">
@endsection

@section('content')
    @include('partials.question')
@endsection