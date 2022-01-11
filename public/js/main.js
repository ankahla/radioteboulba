function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
            $('.file-upload-btn').removeAttr('disabled');
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});


	/*------------------------
    Main script
	--------------------------*/

$(document).ready(function () {


/////////Articles










    var currentElem = $(".profile-usermenu li.active").attr("id");

    $(".profile-usermenu li").click(function () {
        var elemClass = $(this).attr("id");
        $(this).toggleClass("active");


        $(".profile-usermenu li" + ":not(#" + elemClass + ")").removeClass("active");


        $("." + currentElem).hide();


        $("." + elemClass).show();
        currentElem = $(this).attr("id");

    });

    $('input:radio[name="toggle_option"]').change(function () {

        $(".add-article").toggleClass('hide');
        $(".add-question").toggleClass('hide');

    });



     /* Bookmark
    =====================*/

    $('.bookmark').click(function() {
        $(this).toggleClass('added-to-bookmark');
    });
    /* Bookmark
    =====================*/

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });




    /* User Messaging
    =====================*/


    var conversationId = null;
    var message;
    var receiverId;
    var token;

    /*-- Fetch Conversation messages click event : /messages Page --*/
    $('.msg-user').click(function () {
        $('.user-contact-messages-input input').removeAttr('disabled');
        receiverId = $(this).data("receiver-id");
        $(".user-contact-messages ul").html('');
        $(this).addClass('msg-user-active').siblings().removeClass('msg-user-active');
        conversationId = $(this).attr('id').match(/\d+/);
        token = $(this).data("token");
        $(".user-contact-messages .help-text").hide();
        $(".user-msg-right .user-contact-display").html(
            '<div class="user-contact">'+
            '<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">'+
            '<p>'+$(this).data("receiver-name")+'</p>'+
        '</div>'
        );

        fetchConversationMessages(conversationId, token);
    });
    /*-- Fetch Conversation messages click event : /messages Page --*/


    /*-- Fetch Conversation messages Ajax function--*/
    function fetchConversationMessages(conversationId, token) {
        var data = {
            _token: token,
            id: conversationId
        }
        $.ajax({
            type: "POST",
            url: "/messages/fetch-messages",
            data: data,
            cache: false,
            success: function (result) {
                for (var i = 0; i < result.length; i++) {
                    if (result[i].sender_id == receiverId) {
                        $(".user-contact-messages ul").append(
                            '<li class="msg-replies">' +
                            '<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">' +
                            '<p>' + result[i].content + '</p>' +
                            '</li>'
                        );
                    } else {
                        $(".user-contact-messages ul").append(
                            '<li class="msg-sent">' +
                            '<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">' +
                            '<p>' + result[i].content + '</p>' +
                            '</li>'
                        );
                    }
                }
                $(".user-contact-messages").animate({
                    scrollTop: $(document).height()
                }, "fast");
            }
        });
    }
    /*-- Fetch Conversation messages Ajax function--*/



    /*-- Send message button click event : /messages Page --*/
    $(".msg-submit").click(function () {
        message = $(".user-contact-messages-input input").val();
        sendMessage(receiverId, message, conversationId, token);
    });
    /*-- Send message button click event : /messages Page --*/



    /*-- Send message button click event : /profile/{user} Page --*/
    $('#public-profile-send').click(function () {
        message = $("#public-profile-message").val();
        receiverId = $("#public-profile-message").data("receiver-id");
        token = $("#public-profile-message").data("token")
        sendMessage(receiverId, message, conversationId, token);
        $("#public-profile-message").val('');
        $(".modal-body").append('<div class="alert alert-success mt-2" role="alert"> Message has been sent successfully!</div>');
    });
    /*-- Send message button click event : /profile/{user} Page --*/



    /*-- send Message Ajax function--*/
    function sendMessage(receiverId, message, conversationId, token) {
        var data = {
            "id": receiverId,
            "content": message,
            "conversation_id": conversationId,
            '_token': token
        };

        $.ajax({
            type: "POST",
            url: "/messages/send-message",

            data: data,
            cache: false,
            success: function () {
                newMessage();
            }
        });
    }
    /*-- Send message Ajax function--*/

    /*-- Display sent message function--*/
    function newMessage() {
        message = $(".user-contact-messages-input input").val();
        if ($.trim(message) == '') {
            return false;
        }
        $('<li class="msg-sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.user-contact-messages ul'));
        $('.user-contact-messages-input input').val(null);
        $('.msg-user.msg-user-active .msg-preview').html('<span>You: </span>' + message);
        $(".user-contact-messages").animate({
            scrollTop: $(document).height()
        }, "fast");
    }
    /*-- Display sent message function--*/

    $('.user-contact-messages-input input').keyup(function() {

        var empty = false;
        $('.user-contact-messages-input input').each(function() {
            if ($(this).val().length == 0) {
                empty = true;
            }
        });

        if (empty) {
            $('.msg-submit').attr('disabled','');
        } else {
            $('.msg-submit').removeAttr('disabled');
        }
    });

    /* User Messaging
    =====================*/


    /* Parallax
			============*/

    $('.jarallax').jarallax({
        speed: 0.2
    });

    /* Parallax
    ============*/

    /*------------------------
    Owl Carousel
    --------------------------*/


    var $carousel = $(".js-owl");
    $(".js-owl").owlCarousel({
        items: $carousel.data("items"),
        loop: $carousel.data("loop"),
        margin: $carousel.data("margin"),
        nav: $carousel.data("nav"),
        dots: $carousel.data("dots"),
        autoplay: $carousel.data("autoplay"),
        autoplayTimeout: $carousel.data("autoplay-timeout"),
        navText: ['<i class="fa fa-angle-left fa-2x"></i>', '<i class="fa fa-angle-right fa-2x"></i>'],
        responsiveClass: true,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: $carousel.data("items-mobile-sm")
            },
            // breakpoint from 480 up
            480: {
                items: $carousel.data("items-mobile")
            },
            // breakpoint from 786 up
            786: {
                items: $carousel.data("items-tab")
            },
            // breakpoint from 1023 up
            1023: {
                items: $carousel.data("items-laptop")
            },
            1199: {
                items: $carousel.data("items")
            }
        }

    });

    /*------------------------
    Owl Carousel
    --------------------------*/

    /*------------------------
    Navbar - ProgressBar
	--------------------------*/

    window.onscroll = function () {
        progressIndicator();
        var wScroll = $(window).scrollTop();

        if (wScroll > '60') {
            $('.progress-container').fadeIn(500);
            $('.user-nav').slideUp();
            $('.notification-dropdown .dropdown-content').removeClass('dropdown-open');
            // $('.navbar-collapse').fadeOut(500, function() {
            //     $(this).attr("style", "display: none !important");
            // });

        } else if (wScroll < '60') {
            $('.progress-container').fadeOut(500);
            $('.user-nav').slideDown();
            // $('.navbar-collapse').fadeIn(500);
            // $('.navbar-logo').removeClass('centred-trans');
            // //$('.navbar').removeClass('nav-on-scroll');
            // var curHeight = $('.navbar').height();
            // $('.navbar').height(curHeight).animate({height: '70'}, 1);

        }
    };

    function progressIndicator() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("progressBar").style.width = scrolled + "%";
    }
    /*------------------------
        Navbar - ProgressBar
        --------------------------*/


    /*------------------------
    NavBar - dropdown menu
	--------------------------*/

    // $('.navbar-collapse ul li').click(function () {
    //     $(this).siblings().removeClass('open active');
    //     $(this).toggleClass('open active');
    // })

    /*------------------------
    NavBar - dropdown menu
	--------------------------*/


})



/*------------------------
    Main scripst
	--------------------------*/


$(function () {
    $('#form-tags-1').tagsInput();

    $('#form-tags-2').tagsInput({
        'onAddTag': function (input, value) {
            console.log('tag added', input, value);
        },
        'onRemoveTag': function (input, value) {
            console.log('tag removed', input, value);
        },
        'onChange': function (input, value) {
            console.log('change triggered', input, value);
        }
    });

    $('#form-tags-3').tagsInput({
        'unique': true,
        'minChars': 2,
        'maxChars': 10,
        'limit': 5,
        'validationPattern': new RegExp('^[a-zA-Z]+$')
    });

    $('#form-tags-4').tagsInput({
        'autocomplete': {
            source: [
                'apple',
                'banana',
                'orange',
                'pizza'
            ]
        }
    });
    $('#form-tags-question').tagsInput({
        'autocomplete': {
            source: [
                'apple',
                'banana',
                'orange',
                'pizza'
            ]
        }
    });

    $('#form-tags-5').tagsInput({
        'delimiter': ';'
    });

    $('#form-tags-6').tagsInput({
        'delimiter': [',', ';']
    });
});



/* jQuery Tags Input Revisited Plugin
 *
 * Copyright (c) Krzysztof Rusnarczyk
 * Licensed under the MIT license */

(function ($) {
    var delimiter = [];
    var inputSettings = [];
    var callbacks = [];

    $.fn.addTag = function (value, options) {
        options = jQuery.extend({
            focus: false,
            callback: true
        }, options);

        this.each(function () {
            var id = $(this).attr('id');

            var tagslist = $(this).val().split(_getDelimiter(delimiter[id]));
            if (tagslist[0] === '') tagslist = [];

            value = jQuery.trim(value);

            if ((inputSettings[id].unique && $(this).tagExist(value)) || !_validateTag(value, inputSettings[id], tagslist, delimiter[id])) {
                $('#' + id + '_tag').addClass('error');
                return false;
            }

            $('<span>', {
                class: 'tag'
            }).append(
                $('<span>', {
                    class: 'tag-text'
                }).text(value),
                $('<button>', {
                    class: 'tag-remove'
                }).click(function () {
                    return $('#' + id).removeTag(encodeURI(value));
                })
            ).insertBefore('#' + id + '_addTag');

            tagslist.push(value);

            $('#' + id + '_tag').val('');
            if (options.focus) {
                $('#' + id + '_tag').focus();
            } else {
                $('#' + id + '_tag').blur();
            }

            $.fn.tagsInput.updateTagsField(this, tagslist);

            if (options.callback && callbacks[id] && callbacks[id]['onAddTag']) {
                var f = callbacks[id]['onAddTag'];
                f.call(this, this, value);
            }

            if (callbacks[id] && callbacks[id]['onChange']) {
                var i = tagslist.length;
                var f = callbacks[id]['onChange'];
                f.call(this, this, value);
            }
        });

        return false;
    };

    $.fn.removeTag = function (value) {
        value = decodeURI(value);

        this.each(function () {
            var id = $(this).attr('id');

            var old = $(this).val().split(_getDelimiter(delimiter[id]));

            $('#' + id + '_tagsinput .tag').remove();

            var str = '';
            for (i = 0; i < old.length; ++i) {
                if (old[i] != value) {
                    str = str + _getDelimiter(delimiter[id]) + old[i];
                }
            }

            $.fn.tagsInput.importTags(this, str);

            if (callbacks[id] && callbacks[id]['onRemoveTag']) {
                var f = callbacks[id]['onRemoveTag'];
                f.call(this, this, value);
            }
        });

        return false;
    };

    $.fn.tagExist = function (val) {
        var id = $(this).attr('id');
        var tagslist = $(this).val().split(_getDelimiter(delimiter[id]));
        return (jQuery.inArray(val, tagslist) >= 0);
    };

    $.fn.importTags = function (str) {
        var id = $(this).attr('id');
        $('#' + id + '_tagsinput .tag').remove();
        $.fn.tagsInput.importTags(this, str);
    };

    $.fn.tagsInput = function (options) {
        var settings = jQuery.extend({
            interactive: true,
            placeholder: 'Add a tag',
            minChars: 0,
            maxChars: null,
            limit: null,
            validationPattern: null,
            width: 'auto',
            height: 'auto',
            autocomplete: null,
            hide: true,
            delimiter: ',',
            unique: true,
            removeWithBackspace: true
        }, options);

        var uniqueIdCounter = 0;

        this.each(function () {
            if (typeof $(this).data('tagsinput-init') !== 'undefined') return;

            $(this).data('tagsinput-init', true);

            if (settings.hide) $(this).hide();

            var id = $(this).attr('id');
            if (!id || _getDelimiter(delimiter[$(this).attr('id')])) {
                id = $(this).attr('id', 'tags' + new Date().getTime() + (++uniqueIdCounter)).attr('id');
            }

            var data = jQuery.extend({
                pid: id,
                real_input: '#' + id,
                holder: '#' + id + '_tagsinput',
                input_wrapper: '#' + id + '_addTag',
                fake_input: '#' + id + '_tag'
            }, settings);

            delimiter[id] = data.delimiter;
            inputSettings[id] = {
                minChars: settings.minChars,
                maxChars: settings.maxChars,
                limit: settings.limit,
                validationPattern: settings.validationPattern,
                unique: settings.unique
            };

            if (settings.onAddTag || settings.onRemoveTag || settings.onChange) {
                callbacks[id] = [];
                callbacks[id]['onAddTag'] = settings.onAddTag;
                callbacks[id]['onRemoveTag'] = settings.onRemoveTag;
                callbacks[id]['onChange'] = settings.onChange;
            }

            var markup = $('<div>', {
                id: id + '_tagsinput',
                class: 'tagsinput'
            }).append(
                $('<div>', {
                    id: id + '_addTag'
                }).append(
                    settings.interactive ? $('<input>', {
                        id: id + '_tag',
                        class: 'tag-input',
                        value: '',
                        placeholder: settings.placeholder
                    }) : null
                )
            );

            $(markup).insertAfter(this);

            $(data.holder).css('width', settings.width);
            $(data.holder).css('min-height', settings.height);
            $(data.holder).css('height', settings.height);

            if ($(data.real_input).val() !== '') {
                $.fn.tagsInput.importTags($(data.real_input), $(data.real_input).val());
            }

            // Stop here if interactive option is not chosen
            if (!settings.interactive) return;

            $(data.fake_input).val('');
            $(data.fake_input).data('pasted', false);

            $(data.fake_input).on('focus', data, function (event) {
                $(data.holder).addClass('focus');

                if ($(this).val() === '') {
                    $(this).removeClass('error');
                }
            });

            $(data.fake_input).on('blur', data, function (event) {
                $(data.holder).removeClass('focus');
            });

            if (settings.autocomplete !== null && jQuery.ui.autocomplete !== undefined) {
                $(data.fake_input).autocomplete(settings.autocomplete);
                $(data.fake_input).on('autocompleteselect', data, function (event, ui) {
                    $(event.data.real_input).addTag(ui.item.value, {
                        focus: true,
                        unique: settings.unique
                    });

                    return false;
                });

                $(data.fake_input).on('keypress', data, function (event) {
                    if (_checkDelimiter(event)) {
                        $(this).autocomplete("close");
                    }
                });
            } else {
                $(data.fake_input).on('blur', data, function (event) {
                    $(event.data.real_input).addTag($(event.data.fake_input).val(), {
                        focus: true,
                        unique: settings.unique
                    });

                    return false;
                });
            }

            // If a user types a delimiter create a new tag
            $(data.fake_input).on('keypress', data, function (event) {
                if (_checkDelimiter(event)) {
                    event.preventDefault();

                    $(event.data.real_input).addTag($(event.data.fake_input).val(), {
                        focus: true,
                        unique: settings.unique
                    });

                    return false;
                }
            });

            $(data.fake_input).on('paste', function () {
                $(this).data('pasted', true);
            });

            // If a user pastes the text check if it shouldn't be splitted into tags
            $(data.fake_input).on('input', data, function (event) {
                if (!$(this).data('pasted')) return;

                $(this).data('pasted', false);

                var value = $(event.data.fake_input).val();

                value = value.replace(/\n/g, '');
                value = value.replace(/\s/g, '');

                var tags = _splitIntoTags(event.data.delimiter, value);

                if (tags.length > 1) {
                    for (var i = 0; i < tags.length; ++i) {
                        $(event.data.real_input).addTag(tags[i], {
                            focus: true,
                            unique: settings.unique
                        });
                    }

                    return false;
                }
            });

            // Deletes last tag on backspace
            data.removeWithBackspace && $(data.fake_input).on('keydown', function (event) {
                if (event.keyCode == 8 && $(this).val() === '') {
                    event.preventDefault();
                    var lastTag = $(this).closest('.tagsinput').find('.tag:last > span').text();
                    var id = $(this).attr('id').replace(/_tag$/, '');
                    $('#' + id).removeTag(encodeURI(lastTag));
                    $(this).trigger('focus');
                }
            });

            // Removes the error class when user changes the value of the fake input
            $(data.fake_input).keydown(function (event) {
                // enter, alt, shift, esc, ctrl and arrows keys are ignored
                if (jQuery.inArray(event.keyCode, [13, 37, 38, 39, 40, 27, 16, 17, 18, 225]) === -1) {
                    $(this).removeClass('error');
                }
            });
        });

        return this;
    };

    $.fn.tagsInput.updateTagsField = function (obj, tagslist) {
        var id = $(obj).attr('id');
        $(obj).val(tagslist.join(_getDelimiter(delimiter[id])));
    };

    $.fn.tagsInput.importTags = function (obj, val) {
        $(obj).val('');

        var id = $(obj).attr('id');
        var tags = _splitIntoTags(delimiter[id], val);

        for (i = 0; i < tags.length; ++i) {
            $(obj).addTag(tags[i], {
                focus: false,
                callback: false
            });
        }

        if (callbacks[id] && callbacks[id]['onChange']) {
            var f = callbacks[id]['onChange'];
            f.call(obj, obj, tags);
        }
    };

    var _getDelimiter = function (delimiter) {
        if (typeof delimiter === 'undefined') {
            return delimiter;
        } else if (typeof delimiter === 'string') {
            return delimiter;
        } else {
            return delimiter[0];
        }
    };

    var _validateTag = function (value, inputSettings, tagslist, delimiter) {
        var result = true;

        if (value === '') result = false;
        if (value.length < inputSettings.minChars) result = false;
        if (inputSettings.maxChars !== null && value.length > inputSettings.maxChars) result = false;
        if (inputSettings.limit !== null && tagslist.length >= inputSettings.limit) result = false;
        if (inputSettings.validationPattern !== null && !inputSettings.validationPattern.test(value)) result = false;

        if (typeof delimiter === 'string') {
            if (value.indexOf(delimiter) > -1) result = false;
        } else {
            $.each(delimiter, function (index, _delimiter) {
                if (value.indexOf(_delimiter) > -1) result = false;
                return false;
            });
        }

        return result;
    };

    var _checkDelimiter = function (event) {
        var found = false;

        if (event.which === 13) {
            return true;
        }

        if (typeof event.data.delimiter === 'string') {
            if (event.which === event.data.delimiter.charCodeAt(0)) {
                found = true;
            }
        } else {
            $.each(event.data.delimiter, function (index, delimiter) {
                if (event.which === delimiter.charCodeAt(0)) {
                    found = true;
                }
            });
        }

        return found;
    };

    var _splitIntoTags = function (delimiter, value) {
        if (value === '') return [];

        if (typeof delimiter === 'string') {
            return value.split(delimiter);
        } else {
            var tmpDelimiter = '∞';
            var text = value;

            $.each(delimiter, function (index, _delimiter) {
                text = text.split(_delimiter).join(tmpDelimiter);
            });

            return text.split(tmpDelimiter);
        }

        return [];
    };
})(jQuery);






