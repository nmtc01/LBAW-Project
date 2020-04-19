@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
  @include('partials.home_questions')
@endsection