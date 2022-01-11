@include("layouts.header")

<div class="register ">
    <div class="row">
        <div class="col-md-3 register-left">

            <img src="{{URL::asset('/img/logo.png')}}" alt="" />
            <h3>Welcome</h3>
            <p>Create your acticles, ask questions right now!</p>
            <input type="button" id="login-btn" class="btn btn-primary" value="Login">
        </div>
        <div class="col-md-9 register-right">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Create You Acccount</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control"
                                    placeholder="Your Phone *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option class="hidden" selected disabled>Please select your Sequrity Question</option>
                                    <option>What is your Birthdate?</option>
                                    <option>What is Your old Phone Number</option>
                                    <option>What is your Pet Name?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your Answer *" value="" />
                            </div>
                            <input type="submit" class="btnRegister" value="Register" />
                        </div>
                    </div>
                    <div class="row login-form hide">
                        <div class="col-md-5 mx-auto">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" value="" />
                            </div>
                            <div class="form-group">
                            <input type="submit" class="btnRegister btnLogin" value="Login" />
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>


@include("layouts.footer")
