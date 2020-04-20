@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<section id="about">
        <h1>Error 404</h1>
        <p>We are sorry.</p>
        <p>The page you are looking for cannot be found.</p>
        <p>Please go back to our home page or try to find what you are looking for by using our search bar.</p>
</section>
@endsection