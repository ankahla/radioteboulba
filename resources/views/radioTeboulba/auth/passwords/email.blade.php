@include("layouts.header")

<div class="form-page ">
    <div class="row">
        
        <div class=" m-auto col-md-9 form-container">


            <div class="row form">
                <div class="m-auto col-md-6 form-brd ">



                    <h3 class="form-heading">{{ __('Reset Password') }}</h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 ">
                               <input type="submit" class="btnRegister" value="{{ __('Send Password Reset Link') }}">
                               
                            </div>
                        </div>

                        
                    </form>

                </div>
            </div>





        </div>
    </div>

</div>


@include("layouts.footer")
