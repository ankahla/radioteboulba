<!-- Navigation -->
@include("radioteboulba.layouts.header")
<!-- Navigation -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/contact.css') }}">


 <div class="contact-pageheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-caption">
                        <h1 class="contact-title">.استخدم الاستمارة التالية لتُكاتبنا</h1>
                        <p class="contact-text">عزيزي المتابع للإتصال بنا ,الإستفسار ,الإستشهار أو لتقديم مقترحات يمكنك مراسلتنا عن طريق ملـئ الإستمارة التالية</strong>
                        </p>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
                    <div class="contact-form">
                        <h3 class="contact-info-title">راسلنا</h3>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                         <button type="button" class="close" data-dismiss="alert">×</button>
                         <ul>
                          @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                          @endforeach
                         </ul>
                        </div>
                       @endif
                       @if ($message = Session::get('success'))
                       <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                               <strong>{{ $message }}</strong>
                       </div>
                       @endif
                        <div class="row">
                            <form id="contact-us" method="post" action="{{route('radioTeboulba.contactus.send')}}">
                                {{ csrf_field() }}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Name"></label>
                                        <input  id="name" name="name" type="text" placeholder="الإسم" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="email"></label>
                                        <input id="email" name="email" type="text" placeholder="البريد الإلكتروني" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Phone"></label>
                                        <input id="phone" name="phone" type="text" placeholder="الهاتف" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                        {!! app('captcha')->display() !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <textarea class="form-control pdt20" id="textarea"  name="message" rows="4" placeholder="النص"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <button  data-sitekey="{{env('G_RECAPTCHA_SITE_KEY')}}" data-callback='onSubmit' data-action='submit' type="submit" name="send" class="btn btn-primary btn-lg ">إرسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <div id="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51869.55595079604!2d10.939915167881546!3d35.65613495276765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13021798987625e3%3A0x32add206bd5689d3!2z2KzZhdi52YrYqSDYsdik2Ykg2Ygg2LHYp9iv2YrZiCDYt9io2YTYqNip!5e0!3m2!1sen!2stn!4v1577643484032!5m2!1sen!2stn" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-6 col-xs-12 info">
                    <div class="">
                        <h3 class="title-bold">إتصل بنا</h3>

                    </div>
                    <div class="contact-section">
                        <div class="contact-icon"><i class="fa fa-map-marker"></i></div>
                        <div class="contact-info">
                            <p>حي الرياض - نهج قرطبة - طبلبة </p>
                        </div>
                    </div>
                     <div class="contact-section">
                        <div class="contact-icon"><i class="fa fa-phone"></i></div>
                        <div class="contact-info">
                            <p>+216 58 481 126</p>
                        </div>
                    </div>
                     <div class="contact-section">
                        <div class="contact-icon"><i class="fa fa-envelope"></i></div>
                        <div class="contact-info">
                            <p>rouaateboulba@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


     <script>
    /*function initMap() {
        var uluru = {
            lat: 23.094197,
            lng: 72.558148
        };
        var map = new google.maps.Map(document.getElementById('contact-map'), {
            zoom: 14,
            center: uluru,
            scrollwheel: false
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: 'https://easetemplate.com/free-website-templates/life-coach/images/map_marker.png'

        });
    }*/
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZib4Lvp0g1L8eskVBFJ0SEbnENB6cJ-g&callback=initMap">
    </script>
{!! NoCaptcha::renderJs() !!}
