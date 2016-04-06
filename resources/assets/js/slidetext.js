//partners
var isActive = false;
$(document).ready(function(){

    var width_wrapper = $("#dragMe").width();
    var height_blocks = $("#dragMe").height();


    //Берём текст перевода
    $("body").on('click', '.gettext', function(){
        var data = {};
        data['id'] = $(this).attr('data-expl_id');

        $('#collapse').on('hidden.bs.collapse', function () {
            $(".collapse").collapse('show');
        });


        $.ajax({
            url: "/examplegetone/exampleone/"+data['id'],
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('#token').attr('content')
            },
            success: function(json) {
                var data = JSON.parse(json);
                $(".rus_text").html(data.before);
                $(".eng_text .liquid").html(data.after);


                var height_blocks = $("#dragMe").height();
                $("#rightCont").height(height_blocks);
                $(".leftCont").height(height_blocks);
                $(".wrap-slide-text").height(height_blocks + 40);
                $(".magic-border").height(height_blocks);

            }
        });

    });



    $(".liquid").width(width_wrapper);
    $("#rightCont").height(height_blocks);
    $(".leftCont").height(height_blocks);
    $(".wrap-slide-text").height(height_blocks + 40);
    $(".magic-border").height(height_blocks);


    $(".blockpartn .block").mouseenter(function(){

        if (!isActive && !$(this).hasClass('hovered'))
        {
            $(this).addClass('hovered');
            $(".blockpartn .block").css({"z-index":1});
            $(this).css({"z-index":998});
            TweenMax.to($(this), 0.5, {clip:"rect(110px 960px 260px 0px)"});
            //TweenMax.to($(this).find('.top_shadow'), 0.5, {top:108});
        }
    });
    $(".blockpartn .block").mouseleave(function(){
        if (!isActive && $(this).hasClass('hovered'))
        {
            $(this).removeClass('hovered');
            TweenMax.to($(this), 0.5, {clip:"rect(121px 960px 250px 0px)"});
            //TweenMax.to($(this).find('.top_shadow'), 0.5, {top: 119});
        }
    });

    $(".blockpartn .block").click(function(){
        if (!isActive)
        {

            isActive  = true;
            $(".blockpartn .block").css({"z-index":1});
            $(this).css({"z-index":998});
            $(".pppOverflow").show();
            $(".blockpartn .block").removeClass("hovered");
            if ($(this).addClass('active'));
            TweenMax.to($(this), 0.5, {clip:"rect(0px 960px 370px 0px)"});
            //TweenMax.to($(this).find('.top_shadow'), 0.5, {top: 0});
        }
        else
        {
            collapse();
        }
    });

    $(".pppOverflow").click(function(){
        if (isActive)
        {
            collapse();
        }
    });

    function collapse()
    {
        if (isActive)
        {

            //TweenMax.to($(".blockpartn .block.active .top_shadow"), 0.5, {top:108});
            TweenMax.to($(".blockpartn .block.active"), 0.5, {clip:"rect(110px 960px 260px 0px)", onComplete:
                function()
                {
                    isActive  = false;
                    $(".pppOverflow").hide();
                    $(".blockpartn .block.active").addClass('hovered').removeClass('active');
                }
            });
        }
    }

});



//smartresize
var $event = $.event,
    dispatchMethod = $.event.handle ? 'handle' : 'dispatch',
    resizeTimeout;

$event.special.smartresize = {
    setup: function() {
        $(this).bind( "resize", $event.special.smartresize.handler );
    },
    teardown: function() {
        $(this).unbind( "resize", $event.special.smartresize.handler );
    },
    handler: function( event, execAsap ) {
        // Save the context
        var context = this,
            args = arguments;

        // set correct event type
        event.type = "smartresize";

        if ( resizeTimeout ) { clearTimeout( resizeTimeout ); }
        resizeTimeout = setTimeout(function() {
            $event[ dispatchMethod ].apply( context, args );
        }, execAsap === "execAsap"? 0 : 100 );
    }
};

$.fn.smartresize = function( fn ) {
    return fn ? this.bind( "smartresize", fn ) : this.trigger( "smartresize", ["execAsap"] );
};


// shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame    ||
        window.oRequestAnimationFrame      ||
        window.msRequestAnimationFrame     ||
        function( callback ){
            window.setTimeout(callback, 1000/60);
        };
})();

function calcSlideOffset()
{
    lw = $(window).width();
    pImgW = 1920;//$("#rightCont .liquid").width();
    pOffset = lw/2 - pImgW/2;
    //$("#rightCont .liquid").css("left", pOffset);
    //bg
    /*pOffset = lw/2 - 750;
     $(".bgOverlay").css("left", pOffset);*/
}

$(function() {


    calcSlideOffset();

    var dragging = false,
        x,
        position,
        dragger = $("#dragMe"),
        rightCont = $("#rightCont"),
        leftCont = $("#leftCont"),
        images = $(".images"),
        overlay = $("#overlay"),
        win = $(window),
        imgH = 1,
        imgW = 1,
        imgRatio = imgH/imgW,
        height = leftCont.height(),
        width = leftCont.width(),
        winRatio = parseInt(height)/parseInt(width),
        wRatio = width/imgW,
        hRatio = height/imgH;
    TweenMax.to(rightCont, 1, { width: '100%',  delay:0.3, onComplete: function(){
        TweenMax.to(rightCont, 0.5, { width: '50%',  delay: 0.5, onComplete: function(){
            $(".magic-border").css("left",'50%');
            $(".magic-border .fa").css("opacity","1");
        }});

    } });

    TweenMax.to(dragger, 1, { left: '0',  delay:0.3, onComplete: function(){
        TweenMax.to(dragger, 0.5, { left: '0',  delay: 0.5});
    } });

    win.smartresize(function(){
        width = win.width();
        height = win.height();
        winRatio = parseInt(height)/parseInt(width);
        wRatio = width/imgW,
            hRatio = height/imgH;
        calcSlideOffset();
    });


    $("body").on("mousedown", "#dragMe, .magic-border", function(event){
        dragging = true;
        dragger.addClass("dragging");
    });

    $("body").on("mouseup", function(event){
        dragging = false;
        dragger.removeClass("dragging");
    });

    $(".wrap-slide-text").on("mousemove", function(event){
        var parentOffset = $(this).parent().parent().offset();
        x = event.pageX - parentOffset.left;

        //or $(this).offset(); if you really just want the current element's offset
        //var relX = event.pageX - parentOffset.left;

        if(Math.round(100/(width/x)) > 99)
        {
            position = 100 + "%";
        }
        else
        {
            position = Math.round(100/(width/x)) + "%";
        }

    });



    $(window).on("scroll", function()
    {
        //var offs = $(document).scrollTop();
        //$(".btn").css("top", -1*offs+41);
    });

    (function animloop() {
        requestAnimFrame(animloop);
        if(dragging){

            rightCont.css("width",position);
            $(".magic-border").css("left",position);
            //dragger.css("left",position);
        }
    })();

});

window.onload = (function(){

    if ($.cookie('add_block') != 1) {

        setTimeout(function() {

            $(".add").animate({
                width:250, opacity: 1
            }, 1000, "linear" );
            $.cookie('add_block', 1);
        }, 3000);



        $(".add .close").click(function(){

            $(".add").animate({
                width:0, opacity: 0
            }, 1000, "linear" );
        });

    }


});
