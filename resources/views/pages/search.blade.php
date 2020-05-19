@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

@section('side_navs')
  @include('partials.side_navs')
@endsection

@section('content')
  @include('partials.search_questions')
@endsection