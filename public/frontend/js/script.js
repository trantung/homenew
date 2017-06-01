jQuery(document).ready(function ($) {

    var jssor_1_options = {
        $AutoPlay: false,
        $SlideDuration: 800,
        $SlideEasing: $Jease$.$OutQuint,
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
        },
        $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
        }
    };

    if ($('#main-slider').length > 0) {
        var jssor_1_slider = new $JssorSlider$("main-slider", jssor_1_options);
        /*responsive code begin*/
        /*you can remove responsive code if you don't want the slider scales while window resizing*/
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 1920);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        /*responsive code end*/
    }

    $('.bselect').selectpicker({
        style: 'btn-default'
    });

    $('.co-scroll').perfectScrollbar();

    $('.pen-tab a').on('shown.bs.tab', function (e) {
        console.log($($(e.target).attr('href')).find('.co-scroll'));
        $($(e.target).attr('href')).find('.co-scroll').perfectScrollbar();
    });


    var subli =  $('.sub-menu ul');
    for(var i = 0; i <=subli.length; i++){
        if($(">li",$(subli[i])).length == 1){
            $(">li",$(subli[i])).css("border-radius",'10px');
        }
    }



});

$(document).ready(function(){
    $("#lof_go_top, .toptop,.lendau").click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, '300');
    });
    $(window).scroll(function(){var scroll=$(window).scrollTop();if(scroll>300){$("#lof_go_top").fadeIn();}else{$("#lof_go_top").fadeOut();}});


    $('.multi1').slick({
        dots: true,
        infinite: true,
        //autoplay: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    dots: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    dots: false
                }
            }
        ]
    });

    $('.multi3').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.multi4').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        //variableWidth: true,
        //centerMode: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.gv12_multi1').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        //variableWidth: true,
        //centerMode: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.gv12_mobile').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 3,
        //variableWidth: true,
        //centerMode: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    dots: false,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    slidesToScroll: 1
                }
            }
        ]
    });
    var nav = $('.menu_mobile');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 170) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
    $('.menu_mobile').click(function(){
        $(this).toggleClass("button2");
        $(this).next().toggleClass("mobile");
        //$('.button_mobile').slideToggle();
    });


    var maxHeight = -1;

    $('#programs .row>div .pr-mid, #intro .in-body').each(function() {
        maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
    });

    $('#programs .row>div .pr-mid, #intro .in-body').each(function() {
        $(this).height(maxHeight);
    });

    var w_width = $(window).outerWidth() - 17;
    if(w_width < 1199){
        $('.thpt_menu .main-menu>li .main-menu-item a').click(function(e){
        });
        $('.thpt_menu .main-menu>li.active .main-menu-item a').click(function(e){
            e.preventDefault();
            $('.thpt_menu .sub-menu').toggle();
            $(this).parent().find('.divspan').toggle();
        });
        $('.thcs_allpage .menu-relative ul>li>a').click(function(e){
        });
    }


    //$($(".btn-group.bootstrap-select.choose-teacher select")).change(function(){
    //    if($(".btn-group.bootstrap-select.choose-teacher select").val() != ""){
    //        $(this).parent().find('.error').remove(".error");
    //        console.log(4);
    //    }else{
    //        console.log(3);
    //        $(this).parent().append("<div class='error'>Không được bỏ trống</div>");
    //    }
    //    //, .btn-group.bootstrap-select.choose-subject:nth-child(2) select,.btn-group.bootstrap-select.choose-subject:nth-child(3) select
    //    //|| $(".btn-group.bootstrap-select.choose-subject:nth-child(2) select").val() != "" || $(".btn-group.bootstrap-select.choose-subject:nth-child(3) select").val() != ""
    //});

    //$($(".btn-group.bootstrap-select.choose-subject:nth-child(2) select")).change(function(){
    //    if($(".btn-group.bootstrap-select.choose-subject:nth-child(2) select").val() != ""){
    //        $(this).parent().find('.error').remove(".error");
    //        console.log(4);
    //    }else{
    //        console.log(3);
    //        $(this).parent().append("<div class='error'>Không được bỏ trống</div>");
    //    }
    //    //, .btn-group.bootstrap-select.choose-subject:nth-child(2) select,.btn-group.bootstrap-select.choose-subject:nth-child(3) select
    //    //|| $(".btn-group.bootstrap-select.choose-subject:nth-child(2) select").val() != "" || $(".btn-group.bootstrap-select.choose-subject:nth-child(3) select").val() != ""
    //});
    //
    //
    //
    //$($(".btn-group.bootstrap-select.choose-subject:nth-child(3) select")).change(function(){
    //    if($(".btn-group.bootstrap-select.choose-subject:nth-child(3) select").val() != ""){
    //        $(this).parent().find('.error').remove(".error");
    //        console.log(4);
    //    }else{
    //        console.log(3);
    //        $(this).parent().append("<div class='error'>Không được bỏ trống</div>");
    //    }
    //    //, .btn-group.bootstrap-select.choose-subject:nth-child(2) select,.btn-group.bootstrap-select.choose-subject:nth-child(3) select
    //    //|| $(".btn-group.bootstrap-select.choose-subject:nth-child(2) select").val() != "" || $(".btn-group.bootstrap-select.choose-subject:nth-child(3) select").val() != ""
    //});


    //$('.chooclassc').click(function(e){
    //    if($(".btn-group.bootstrap-select.choose-teacher select").val() == "" || $(".btn-group.bootstrap-select.choose-subject:nth-child(2) select").val() == "" || $(".btn-group.bootstrap-select.choose-subject:nth-child(3) select").val() == "" ){
    //        e.preventDefault();
    //        if($('.btn-group.bootstrap-select *',$(this).parent()).hasClass('error')){
    //            console.log(1);
    //            //return true;
    //        }else{
    //            console.log(2);
    //            $('.btn-group.bootstrap-select',$(this).parent()).append("<div class='error'>Không được bỏ trống</div>");
    //        }
    //    }else{
    //        $('.btn-group.bootstrap-select option').prop('selected', function() {
    //            return this.defaultSelected;
    //        });
    //    }
    //
    //});

    //$( ".cc-select .btn-group.bootstrap-select select" ).each(function( index ) {
    //    //console.log( index + ": " + $( this ).text() );
    //    if($(this).val() == ""){
    //        $('.chooclassc2',$(this).parent()).on("click", function(e){
    //            e.preventDefault();
    //        });
    //    }
    //});
    //$('.chooclassc2').click(function(e){
    //
    //
    //
    //    if($(".btn-group.bootstrap-select.choose-teacher select").val() == "" || $(".btn-group.bootstrap-select.choose-subject:nth-child(2) select").val() == "" || $(".btn-group.bootstrap-select.choose-subject:nth-child(3) select").val() == "" ){
    //        e.preventDefault();
    //        if($('.btn-group.bootstrap-select *',$(this).parent()).hasClass('error')){
    //            console.log(1);
    //            //return true;
    //        }else{
    //            console.log(2);
    //            $('.btn-group.bootstrap-select',$(this).parent()).append("<div class='error'>Không được bỏ trống</div>");
    //        }
    //    }else{
    //        $('.btn-group.bootstrap-select option').prop('selected', function() {
    //            return this.defaultSelected;
    //        });
    //    }
    //
    //});
});
function validateRegCourse(classname){
    console.log(classname);
    if($(classname).val() != ""){
        $(classname).parent().find('.error').remove(".error");
        console.log(4);
    }else{
        console.log(3);
        $(classname).parent().append("<div class='error'>Không được bỏ trống</div>");
    }
}