@include("layouts.header")

<div class="form-page ">
    <div class="row">
        <div class="col-md-3 form-page-left">

            <div class=" logo-text">
                <span>I</span><i class="fa fa-heart"></i><span>World</span>
            </div>
            <h3>Welcome</h3>
            <p>Create your acticles, ask questions right now!</p>
            <div class="link-btn">
                <a href="/login">Login</a>
            </div>
        </div>
        <div class="col-md-9 form-container">

            
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row form">
                    <div class="m-auto col-md-6 form-brd">
                    <h3 class="col-md-12 form-heading">Create You Acccount</h3>
                    
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Name *" value="{{ old('name') }}"
                                required autofocus />

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <input id="username" name="username" type="text" class="form-control" placeholder="Username *"
                                value="{{ old('username') }}" required />
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" placeholder="Password *" value=""
                                name="password" required />
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password *"
                                value="" name="password_confirmation" required />
                        </div>

                    
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" placeholder="Your Email *" name="email"
                                value="{{ old('email') }}" required />
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                        </div>
                        <input type="submit" class="btnRegister" value="Register" />
                   
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


@include("layouts.footer")
