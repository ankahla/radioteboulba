@include("radioteboulba.layouts.header")

<div class="main">
    <div class="live-stream-container container pt-50 pb-3">
        <div class="row">
                <div class="col-xs-12 col-md-8 radio-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <!-- <li class="nav-item col-md-4">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="false">قائمة آغاني</a>
                            </li> -->
                            <li class="nav-item col-md-6">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">فيديو مباشر</a>
                            </li>
                            <li class="nav-item col-md-6">
                                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#live-radio" role="tab"
                                    aria-controls="contact" aria-selected="true">المباشر</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="live-radio" role="tabpanel" aria-labelledby="home-tab">
                                <div class="live-radio-section">
                                    <div class="live-radio">
                                        <div class="cam">
                                        </div>
                                        <div class="radio">

                                            <div class="live-img">
                                                <img src="http://127.0.0.1:8000/img/live-thumbnail/matinal.jpg" alt="">
                                            </div>
                                            <div class="live-meta">
                                                <ul>
                                                    <li class="title">صباحك يا طبلبة</li>
                                                    <li class="time">من 08:00 إلي 10:00</li>
                                                    <li class="live-btn"><audio controls="" autoplay="autoplay"><source src="http://130.185.144.199:11545/;stream.mp3" type="audio/mp3"></audio></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="online-playlist-section">
                                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fradioteboulbatnrt%2Fvideos%2F483568142288768%2F&show_text=0&width=560" width="100%" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="live-cam-section">
                                    live cam
                                </div>
                            </div>
                        </div>
                        <form class="msg-live-form" action="/ar/radio/sendMessage" method="post" name="contact_form" id="grid-form" class="grid-form">
                            <h3 class="title mb-5">رسالة إلى استوديو</h3>
                            <div>
                                <input type="text" name="emission_message[name]" placeholder="الاسم واللقب" required="required"
                                    id="emission_message_name">
                            </div>
                            <div>
                                <input type="text" name="emission_message[email]" placeholder="البريد الإلكتروني"
                                    required="required" id="emission_message_email">
                            </div>
                            <div>
                                <textarea rows="4" name="emission_message[message]" placeholder="رسالة"
                                    required="required" id="emission_message_message"></textarea>
                            </div>
                            <div>
                                <input type="hidden" name="emission_message[id]" id="emission_message_id"> <button
                                    id="sendMessage" class="btn" type="button">إرسال</button>
                            </div>
                        </form>
                    </div>
            <div class="col-xs-12  col-md-4">
                <div class="last-short-news mt-4">
                    <div class="fb-page mr-auto" data-href="https://www.facebook.com/radioteboulbatnrt/" data-tabs="timeline"
                        data-width="" data-height="" data-small-header="true" data-adapt-container-width="true"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/radioteboulbatnrt/" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/radioteboulbatnrt/">‎Radio Teboulba-راديو طبلبة‎</a>
                        </blockquote>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>


@include("radioteboulba.layouts.footer")
