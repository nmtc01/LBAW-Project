@extends('layouts.app')

{{--@section('signup')--}}

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


<div class="container register">
  <div class="row">
  
    <div class="col-md-3 register-left my-auto">
        <h1><a href="">Answerly</a></h1>
        <p>Hope you have a lot of questions ready to be answered!</p>
    </div>

    <div class="col-md-9 register-right">

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

              <div class="row register-form">

                  <div class="col-md-6">
              
                    <!-- <label for="name">Name</label>-->
                    <div class="form-group">
                      <input id="first_name" class="form-control" placeholder="First Name *" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
                      @if ($errors->has('first_name'))
                        <span class="error">
                            {{ $errors->first('first_name') }}
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <input id="last_name" class="form-control" placeholder="Last Name *" type="text" name="last_name" value="{{ old('last_name') }}" required autofocus>
                      @if ($errors->has('last_name'))
                        <span class="error">
                            {{ $errors->first('last_name') }}
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <input id="email" class="form-control" placeholder="Your Email *" type="text" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                        <span class="error">
                            {{ $errors->first('email') }}
                        </span>
                      @endif
                    </div>


                    <div class="form-group">
                      <div class="maxl">
                          <label class="radio inline">
                              <input type="radio" name="gender" value="male" checked>
                              <span> Male </span>
                          </label>
                          <label class="radio inline">
                              <input type="radio" name="gender" value="female">
                              <span>Female </span>
                          </label>
                      </div>
                    </div>

                  </div>


                    
                    {{-- 
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                      <span class="error">
                          {{ $errors->first('email') }}
                      </span>
                    @endif
                    --}}
                
                  <!--<label for="password">Password</label>-->
                  <div class="col-md-6 ml-auto">

                    <div class="form-group">
                      <input id="username" class="form-control" placeholder="Username *" type="text" name="username" value="{{ old('username') }}" required autofocus>
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
                      <textarea class="form-control" placeholder="Description *" value="" rows="5"></textarea>
                    </div>

                    

                  </div>



              </div>

                  
                      
                    {{-- 
                    <button type="submit">
                      Register
                    </button>
                    <a class="button button-outline" href="{{ route('login') }}">Login</a>
                    --}}

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






{{-- 
<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    @if ($errors->has('name'))
      <span class="error">
          {{ $errors->first('name') }}
      </span>
    @endif

    <label for="email">E-Mail Address</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    @if ($errors->has('email'))
      <span class="error">
          {{ $errors->first('email') }}
      </span>
    @endif

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required>
    @if ($errors->has('password'))
      <span class="error">
          {{ $errors->first('password') }}
      </span>
    @endif

    <label for="password-confirm">Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation" required>

    <button type="submit">
      Register
    </button>
    <a class="button button-outline" href="{{ route('login') }}">Login</a>
</form>
--}}
{{--@endsection--}}
