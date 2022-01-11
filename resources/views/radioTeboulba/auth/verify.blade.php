@include("layouts.header")

<div class="form-page ">
    <div class="row">
        
        <div class=" m-auto col-md-9 form-container">


            <div class="row form">
                <div class="m-auto col-md-6 form-brd ">



                    <h3 class="form-heading">{{ __('Verify Your Email Address') }}</h3>

                    <div class="verify-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{
                            __('click here to request another') }}</a>.
                    </div>

                </div>
            </div>





        </div>
    </div>

</div>


@include("layouts.footer")
