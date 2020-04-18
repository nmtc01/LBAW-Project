<body>

    <div class="col-md-3 register-left my-auto">
        <h1><a href="../index.php">Answerly</a></h1>
        <p>Hope you have a lot of questions ready to be answered!</p>
    </div>

    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

               <div class="row register-form">

                    @if ($type == "Register") 
                        {{-- //draw_form_register_left();--}}
                    @endif
                    <div class="col-md-6 ml-auto">
                        {{--
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password *" value="" />
                        </div>
                        --}}
                    @if ($type == "Register")
                        {{-- //draw_form_register_right(); --}}
                    @endif
                    </div>
                </div>
               
                <div class="col-md-6 ml-auto">
                    <input type="submit" class="btnRegister" value={{ucfirst($type)}} />
                    <div class="align-middle d-flex justify-content-end">
                        @if ($type == 'Register')
                        <a href="../pages/login.php">Sign In</a>
                        @else
                        <a class="d-flex justify-content-end" href="../pages/register.php">Create account</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>    