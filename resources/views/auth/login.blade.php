@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="container register">
    <div class="row">

        <div class="col-md-3 register-left my-auto">
            <h1><a href="{{ url('/') }}">Answerly</a></h1>
            <p>Hope you have a lot of questions ready to be answered!</p>
        </div>

        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel">

                <div class="row register-form">

                        <div class="col-md-6 ml-auto">
                                    
                            {{-- code Laravel --}}
                            @if (session('message'))
                                <div class="alert alert-danger">{{ session('message') }}</div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                        
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Username *" value="{{ old('username') }}" required autofocus>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="error">
                                        {{ $errors->first('username') }}
                                    </span>
                                @endif
                            
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Passord *" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="error">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif

                                <input type="submit" id="login_button" class="btnRegister" value="Login">
                            
                                <div class="align-middle d-flex justify-content-end">
                                    
                                    <a class="button button-outline" href="{{ route('register') }}">Create account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
