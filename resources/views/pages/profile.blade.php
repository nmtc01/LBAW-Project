@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
  @include('partials.profile')
@endsection