@extends('layouts.app')

@section('signup')

<div class="container register">
    <div class="row">

        <div class="col-md-3 register-left my-auto">
            <h1><a href="../index.php">Answerly</a></h1>
            <p>Hope you have a lot of questions ready to be answered!</p>
        </div>

        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="row register-form">

                        <div class="col-md-6 ml-auto">
                                    
                            {{-- code Laravel --}}
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                        
                                <!--<label for="username">Username</label>-->
                                <div class="form-group">
                                    <input id="username" type="username" class="form-control" name="username" placeholder="Username *" value="{{ old('username') }}" required autofocus>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="error">
                                        {{ $errors->first('username') }}
                                    </span>
                                @endif
                            
                                <!--<label for="password" >Password</label>-->
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Passord *" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="error">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif

                                <div class="form-group">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </div>

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

{{-- 
<form method="POST" action="{{ route('login') }}" class="form-group">
     {{ csrf_field() }}

    <label for="username">Username</label>
    <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
    @if ($errors->has('username'))
        <span class="error">
          {{ $errors->first('username') }}
        </span>
    @endif

    <label for="password" >Password</label>
    <input id="password" type="password" class="form-control" name="password" required>
    @if ($errors->has('password'))
        <span class="error">
            {{ $errors->first('password') }}
        </span>
    @endif

    <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    </label>

    <button type="submit">
        Login
    </button>
    <a class="button button-outline" href="{{ route('register') }}">Register</a>
</form>
--}}
    </div>
</div>
@endsection
