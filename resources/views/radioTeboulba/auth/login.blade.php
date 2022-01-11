@include("layouts.header")

<div class="form-page ">
    <div class="row">

        <div class="col-md-9 form-container m-auto">

           
                
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif




                <div class="row form">
                    <div class="col-md-5 mx-auto form-brd">
                        <h3 class="form-heading">Login</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" placeholder="Username" value="{{ old('email') }}" required autofocus />
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    placeholder="Password" name="password" required />
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group ml-2">
                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                
                            </div>

                            <div class="form-group  mb-0">
                                
                                     <input type="submit" class="btnRegister" value="Login">
                                    

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link " href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                
                            </div>
                        </form>
                    </div>

                </div>

        </div>
    </div>

</div>


@include("layouts.footer")
