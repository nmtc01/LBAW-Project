@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/modmin.css') }}">
@endsection

@section('content')
<div class="container moderate">

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a href="" data-target="#reports" data-toggle="tab" class="nav-link active">Reports</a>
      </li>
      <li class="nav-item">
        <a href="" data-target="#reported-users" data-toggle="tab" class="nav-link">Reported Users</a>
      </li>
      @if(Auth::user()->getUserCurrentRole() == 'administrator')
      <li class="nav-item">
        <a href="" data-target="#promote" data-toggle="tab" class="nav-link">Promote</a>
      </li>
      @endif
    </ul>

    <div class="tab-content py-4">
            @include('partials.reports')
            @include('partials.reported_users')
            @if(Auth::user()->getUserCurrentRole() == 'administrator')
            @include('partials.promote')   
            @endif
    </div>

</div>
@endsection

