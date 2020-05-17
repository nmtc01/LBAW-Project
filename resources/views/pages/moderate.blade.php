@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/modmin.css') }}">
@endsection

<div class="container moderate">

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a href="" data-target="#reports" data-toggle="tab" class="nav-link active">Reports</a>
      </li>
      <li class="nav-item">
        <a href="" data-target="#reported-users" data-toggle="tab" class="nav-link">Reported Users</a>
      </li>
      <li class="nav-item">
        <a href="" data-target="#promote" data-toggle="tab" class="nav-link">Promote</a>
      </li>
    </ul>

    
    {{-- draw reported tables --}}
    <div class="tab-content py-4">

        {{-- draw_reported_tab_mod(1, $ids[0], $titles1, $reports1, true); --}}
        @section('content')
            @include('partials.reports')
            @include('partials.reported_users')
            @include('partials.promote')
        @endsection

        

            
    </div>
    {{-- end draw reported tables --}}


</div>

