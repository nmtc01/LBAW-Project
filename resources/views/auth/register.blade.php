@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="container register">
  <div class="row">
  
    <div class="col-md-3 register-left my-auto">
        <h1><a href="">Answerly</a></h1>
        <p>Hope you have a lot of questions ready to be answered!</p>
    </div>

    <div class="col-md-9 register-right">

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel">

              <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

              <div class="row register-form">

                  <div class="col-md-6">
              
                    <div class="form-group">
                      <input id="first_name" class="form-control" placeholder="First Name *" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
                      @if ($errors->has('first_name'))
                        <span class="error">
                            {{ $errors->first('first_name') }}
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <input id="last_name" class="form-control" placeholder="Last Name *" type="text" name="last_name" value="{{ old('last_name') }}" required>
                      @if ($errors->has('last_name'))
                        <span class="error">
                            {{ $errors->first('last_name') }}
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <input id="email" class="form-control" placeholder="Your Email *" type="text" name="email" value="{{ old('email') }}" required>
                      @if ($errors->has('email'))
                        <span class="error">
                            {{ $errors->first('email') }}
                        </span>
                      @endif
                    </div>

                  </div>
                  <div class="col-md-6 ml-auto">

                    <div class="form-group">
                      <input id="username" class="form-control" placeholder="Username *" type="text" name="username" value="{{ old('username') }}" required>
                      @if ($errors->has('username'))
                        <span class="error">
                            {{ $errors->first('username') }}
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <input id="password" type="password" class="form-control" placeholder="Password *" name="password" required>
                      @if ($errors->has('password'))
                        <span class="error">
                            {{ $errors->first('password') }}
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password *" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                      <textarea class="form-control" placeholder="Description" name="bio" rows="5"></textarea>
                      @if ($errors->has('bio'))
                        <span class="error">
                            {{ $errors->first('bio') }}
                        </span>
                      @endif
                    </div>
                  </div>
              </div>
              <div class="col-md-6 ml-auto">   
                <input type="submit" id="register_button" class="btnRegister" value="Register" />
                
                <div class="align-middle d-flex justify-content-end">
                  <a class="d-flex justify-content-end" href="{{ route('login') }}">Sign In</a>
                </div>

              </div>
              </form>      
            </div>
        </div>
    </div> 
  </div>
</div>
@endsection
