


var ajax = template_directory + '/library/ajax/ajax.php';


var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
    // At least Safari 3+: "[object HTMLElementConstructor]"
var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6


var resetAboutTab = function(tabid){
    $('.nav-tabs a[href="#'+tabid+'"]').tab('show');
}

$(document).ready(function() {



/*
  $('#carousel-example-generic').find('.item.active .fadevalue').delay(2000).fadeIn(800);
  $('#carousel-example-generic-mobile').find('.item.active .fadevalue-mobile').delay(500).fadeIn(800);
  $('#carousel-example-generic-web').find('.item.active .fadevalue-ipad').delay(500).fadeIn(800);

    $('#carousel-example-generic').on('slide.bs.carousel', function () {
        $('.fadevalue').delay(200).fadeOut();
    });
    $('#carousel-example-generic').on('slid.bs.carousel', function () {
        $(this).find('.item.active .fadevalue').delay(500).fadeIn(800);
    }); 
*/
    //mobile view slider
    $('#carousel-example-generic-mobile').on('slid.bs.carousel', function () {
        //$('.fadevalue-mobile').delay(200).fadeOut();
         $('.fadevalue-mobile').hide();
    });
    $('#carousel-example-generic-mobile').on('slid.bs.carousel', function () {
        //$(this).find('.item.active .fadevalue-mobile').delay(500).fadeIn(800);
        $(this).find('.item.active .fadevalue-mobile').fadeIn(1500);
    });

    //mobile view slider part 2
    $('#carousel-example-generic-web').on('slid.bs.carousel', function () {
         //$('.fadevalue-ipad').delay(200).fadeOut();
         $('.fadevalue-ipad').hide();
    });
    $('#carousel-example-generic-web').on('slid.bs.carousel', function () {
         //$(this).find('.item.active .fadevalue-ipad').delay(500).fadeIn(800);
         $('.fadevalue-ipad').hide();
         $(this).find('.item.active .fadevalue-ipad').fadeIn(1500);
    });


/* $('#carousel-example-generic').carousel({
        interval : 7000,
        
    });*/
    $('#carousel-example-generic').carousel(false);


	$('.brewer[key="' + $('#carousel-example-generic').find('.item.active').attr('key') + '"]').delay(2000).fadeIn(800);
	
    $('#carousel-example-generic').on('slide.bs.carousel', function () {
        //$('.brewer').delay(200).fadeOut();
        $('.brewer').hide();
    });
    $('#carousel-example-generic').on('slid.bs.carousel', function () {
        $('.brewer').hide();
        $('.brewer[key="' + $('#carousel-example-generic').find('.item.active').attr('key') + '"]').fadeIn(1000);
    }); 










    //end of mobile view slider

    // cache the window object
    $window = $(window);

    $('section[data-type="background"]').each(function() {
        // declare the variable to affect the defined data-type
        var $scroll = $(this);

        $(window).scroll(function() {
            // HTML5 proves useful for helping with creating JS functions!
            // also, negative value because we're scrolling upwards                            
            var yPos = -($window.scrollTop() / $scroll.data('speed'));
            //console.log(yPos);
            // background position
            var xPos = '58%';
            var idname = $scroll.data('identity');
            if(idname == "about"){
                xPos = '51%';
                yPos = yPos + (+220);
            }else if(idname == "why-haas"){
                xPos = '50%';
                yPos = yPos + (-668);
                if($(window).width() < 1025 && $(window).width() > 771 ){
                 yPos = yPos + (-361);
             }
             if($(window).width() < 770 && $(window).width() > 485 ){
              yPos = yPos + (251);
          }
          if($(window).width() < 325 ){
            yPos = yPos + (-200);
        }
    }else if(idname == "partner") {

        yPos = yPos + (-441);
        if($(window).width() <= 768){
            yPos = yPos + 1200;
            xPos = '8%';
        } 
    }


    if(idname == "about" && $(window).width() < 400){
        xPos = '100%';
    }



    if($window.scrollTop() < 114 || $window.scrollTop() > 1450){
        if($(window).width() > 490 ){
            resetAboutTab('abt-over');    
        }

    }
    if($window.scrollTop() > 2394 || $window.scrollTop() < 114){
        if($(window).width() <= 490){
            resetAboutTab('abt-over');    
        }
    }

    if(idname == "variety" && $(window).width() < 992 && $(window).width() > 760){
        yPos = yPos + (-447);
    }
    var coords = xPos + yPos + 'px';

            // move the background
            $scroll.css({
                backgroundPosition: coords
            });
        }); // end window scroll
    }); // end section function


$('.cross-img').click(function() {
    parent.$("#classic-product").bPopup().close();
    parent.$("#advance-product").bPopup().close();
    
    /*$('#product-div').fadeIn();
    $('#classic-product').hide();
    $('#advance-product').hide();*/
});

$('.product-classic').click(function() {
    //$('#product-div').hide();
    //$('#classic-product').fadeIn();
    $('#classic-product').bPopup({
        easing: 'linear', //uses jQuery easing plugin
        speed: 800,
        transition: 'slideDown'
    });
});

$('.product-advance').click(function() {
    /*$('#product-div').hide();
    $('#advance-product').fadeIn();*/
    $('#advance-product').bPopup({
        easing: 'linear', //uses jQuery easing plugin
        speed: 800,
        transition: 'slideDown'
    });
});

	// SETUP NAVIGATION AND INITIAL SCROLL POSITION
	if( single_page ) {

		$('nav').find('a[data_replace]').each(function(){
			var replace = $(this).attr('data_replace');
			var link = $(this).attr('href');
			$(this).attr( 'href', replace ).attr( 'link', link );
		})

       if( initial_scroll_element ) {
          if( $( initial_scroll_element ).length > 0 ) {
             elem = $( initial_scroll_element ).attr('href')
             $('html, body').stop().animate({
                 scrollTop: $( elem ).offset().top			        
             }, 1500, 'easeInOutExpo');
         }
     }

 }


}); // close out script

/* Create HTML5 element for IE */
document.createElement("section");

function RePosition() {

    if ($(window).width() < 1050) {
       // $('#about-us .tab-content').insertAfter('#about-us .nav.nav-tabs');
    } else {
        //$('#about-us .tab-content').insertBefore('#about-us .nav.nav-tabs');
    }

    if($(window).width() < 490 ){
        $('.nav').css('min-height','70px')
    }
    if ($(window).width() < 749) {

 /*$('#about-menu-nav').click(function() {
            $('ul#about-tab-mobile').toggle();
            $(this).toggleClass('open');
        });
  $('#resource-menu-nav').click(function() {
            $('ul#resource-mob-tab').toggle();
            $(this).toggleClass('open');
        });
  $('#about-tab-mobile li').click(function() {
            $('#about-tab-mobile').hide();
            $('#about-menu-nav').toggleClass('open');
        });
    $('#resource-mob-tab li').click(function() {
            $('#resource-mob-tab').hide();
            $('#resource-menu-nav').toggleClass('open');
    });

        //means Mobile phone for 320*480
       /* $('#carousel-example-generic').hide();
       $('#carousel-example-generic1').show();*/
       
       $('.resource-block h2').insertBefore('.resources-tab .tab-content');

   } else {
    $('.resource-block h2').insertBefore('#resource .resource-block .resources-tab');
}

if($(window).width() < 749){
    $('#abt-tb-pic').insertAfter('#abt-over .row .col-md-5 h3');
    $('#abt-tb-pic').removeClass('col-md-7');

    $("#abt-fnf-image").insertAfter('#abt-fnf .row .col-md-5 h3');
    $('#abt-fnf-image').removeClass('col-md-7');

    $( ".image-history" ).each(function( index ) {
        var parent = $(this).parent(".row-padding").children().first().children('h3');
        $(this).insertAfter(parent);
    });





}else{
    $("#abt-tb-pic").insertAfter("#abt-over .row .col-md-5");
    $('#abt-tb-pic').addClass('col-md-7');

    $("#abt-fnf-image").insertAfter("#abt-fnf .row .col-md-5");
    $('#abt-fnf-image').addClass('col-md-7');

    $( ".image-history" ).each(function( index ) {
        var destination = $(this).parent(".col-md-6").parent(".row-padding").children().last();
        $(this).insertAfter(destination);
    });

}

}



$(window).resize(function() {
    RePosition();
    sliderSettings()
});
$(window).load(function() {
    RePosition();
    sliderSettings()
});

$(document).ready(function() {
    resizeDiv();
    sliderSettings()
});

window.onresize = function(event) {
    resizeDiv();
}

function resizeDiv() {
    var wwidth = $(window).width();
    if ( wwidth > 1600) {
        vpw = $(window).width();
        vph = $(window).height();
        $('#contact').css({
            'height': vph + 'px'
        });
    } else {
        $('#contact').removeAttr('style');
    }
}

function sliderSettings(){
     var wwidth = $(window).width();
      if(wwidth > 1024){
        $('#carousel-example-generic').show();
        $('.mobile-banner').hide();
        $('.wide-sev-banner').hide();
    }else if(wwidth > 640 && wwidth <= 1024 ){
            $('.mobile-banner').hide();
            $('#carousel-example-generic').hide();
            $('.wide-sev-banner').show();
            if(wwidth < 748){
               $('.navbar-header header').show();
           }else{
             $('.navbar-header header').hide();
           }
    }else if(wwidth <= 640){
        $('#carousel-example-generic').hide();
        $('.wide-sev-banner').hide();
        $('.navbar-header header').show();
        $('.mobile-banner').show();
    }

    if(isChrome){
        $('.item .parent-fade').css('position','static');
        $('small.fadevalue').css('left','16%');
        if(wwidth <= 1024){
            $('.fadevalue-ipad').css('left','7%');
        }
    }
}

equalheight = function(container) {

    var currentTallest = 0,
    currentRowStart = 0,
    rowDivs = new Array(),
    $el,
    topPosition = 0;
    $(container).each(function() {

        $el = $(this);
        $($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });

    if($(window).width() <= 1024 && $(window).width() > 640){
        $('#left-arrow-all').attr('href','#carousel-example-generic-web');
        $('#left-arrow-all').addClass('l-setting');
        $('#right-arrow-all').attr('href','#carousel-example-generic-web');
        $('#right-arrow-all').addClass('r-setting');

    }else if($(window).width() >= 1024){
        $('#left-arrow-all').attr('href','#carousel-example-generic');
        $('#right-arrow-all').attr('href','#carousel-example-generic');
    }else if($(window).width() <= 640){
         $('#left-arrow-all').attr('href','#carousel-example-generic-mobile');
         $('#right-arrow-all').attr('href','#carousel-example-generic-mobile');
    }
}

$(window).load(function() {
    equalheight('.pro-box');
});


$(window).resize(function() {
    equalheight('.pro-box');
});

$(function() {
    var $elems = $('.animateblock');
    var winheight = $(window).height();
    var fullheight = $(document).height();
    if($(window).width() < 992){
      $elems.each(function() {
        $temp = $(this);
               // $temp.addClass('animated');
           });
  }

  $(window).scroll(function() {
    animate_elems();
});

  function animate_elems() {

            wintop = $(window).scrollTop(); // calculate distance from top of window

            // loop through each item to check when it animates

            $elems.each(function() {
                $elm = $(this);
                topcoords = $elm.offset().top; // element's distance from top of page in pixels

                var portion = .75;
                

                var difference = topcoords - (winheight * portion);
                if((difference - wintop) > 500 && (difference - wintop) < 1000 ){
                    //$elm.removeClass("animated");
                }


                if ($elm.hasClass('animated')) {
                    return true;
                } // if already animated skip to the next item


                if (wintop > difference) {
                    // animate when top of the window is 3/4 above the element
                    $elm.addClass('animated');
                }
            });
        } // end animate_elems()
    });

$(document).ready(function(){
    /*11-12-2014*/
//slider inno
//$('.bxslider-inno').bxslider();

// Team Member Section Pop Up
/*
$(".team-member").on('click',function(){
	
    $(".team-member").hide();
    $('.green-container').html("");
    var data = $(this).children('div.green-container1').html();	
    $('.green-container').html(data).fadeIn();
    
    return false;
});
*/

$(".team-member a").on('click',function(){
	//     $(".team-member").hide();
	var window_width = $(window).width();
	var otheroffset = $('#nav-height').outerHeight();
	//if(window_width < 749){
	
	var box_width = $('#about-tab-mobile').is(':visible') ? $('#about-tab-mobile').css('width') : $('#about-menu-nav.sec-title').css('width');
	console.log($('#about-tab-mobile').css('width'));
	console.log($('#about-menu-nav.sec-title').css('width'))
	console.log('selected: ' + box_width);
	$('.green-container-wrap').css('width', box_width);
	$('#abt-meet .divisions, #abt-meet .bx-wrapper').hide();
	
	$('html, body').animate({
		scrollTop: $("#about-menu-nav").offset().top - otheroffset
	}, 800);
	
	
	$('.green-container' + $(this).attr('href') ).fadeIn();
	
/*
	var dataHref = $(this).attr('href')
	$('.green-container' + dataHref ).fadeIn( 'slow', function(){
		$('.tabpanel#abt-meet').addClass('testing').css({
			'min-height': $('.green-container' + dataHref ).css('height') + ' !important'
		});
	});
*/
	
	return false;
});

$(".team-cross").on('click',function(){
	$(".green-container").hide();
	$('#abt-meet .divisions, #abt-meet .bx-wrapper').show();
	return false;
});


/*
$("body").on('click','.team-cross',function(){
 $(".green-container").hide();
 $(".green-container").html("");
 $(".team-member").show();
});
*/

//crousal working of tab;
$('#about-tab-mobile li a[data-toggle="tab"]').on('shown.bs.tab', function (e) {   

    var target = $(this).attr('href');

    $(target).css('left','-'+$(window).width()+'px');   
    var left = $(target).offset().left;
    $(target).css({left:left}).animate({"left":"0px"}, "10");
});

    //partners read more
    $('.read-more-lnk').on('click',function(){
        if($(window).width() <= 480 ){
            $(this).prev().slideToggle( "slow" );
            $(this).hide();
        }else{

            var html = $(this).parent('.col-md-4').next('.read-full-text').html();
            $('.finaldata').html('');
            $('.finaldata').html(html).hide();
            $('.finaldata').slideDown("slow");

            $('.summer-text').hide();
            $('.read-more-lnk').hide();
        }
    });
    $('body').on('click','.close-icon',function(){
        $('.finaldata').html('');
        $('.summer-text').show();
        $('.read-more-lnk').show();
    });

    //move from green links
    $('.move-via-green').on('click',function(){
       var moveVal = $(this).attr('relative');
       $('.nav-tabs a[href="#'+moveVal+'"]').tab('show');
       $("html, body").animate({ scrollTop: $('.nav-tabs a[href="#'+moveVal+'"]').parents('section').offset().top }, 500,'easeOutExpo');
    });

//contact form submission
function ValidateEmail(email) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
};

/*
$("#frm-contact").on('submit',function(){
    var Is_Valid = true;

    if($('#frm-name').val() == ""){
        Is_Valid = false;
        $("#frm-name").addClass('error');
    }else{
        $("#frm-name").removeClass('error');
    }

    if($('#frm-email').val() == ""){
        Is_Valid = false;
        $('#frm-email').addClass('error');
    }else if(!ValidateEmail($("#frm-email").val())){
        Is_Valid = false;
        $('#frm-email').addClass('error');
    }else{
        $('#frm-email').removeClass('error');
    }

    if($('#frm-website').val() == ""){
        Is_Valid = false;
        $('#frm-website').addClass('error');
    }else{
        $('#frm-website').removeClass('error');
    }

    if($('#frm-subject').val() == ""){
        Is_Valid = false;
        $('#frm-subject').addClass('error');
    }else{
        $('#frm-subject').removeClass('error');
    }

    if(Is_Valid){
        $.ajax({
         type: "POST",
         url: 'frmcontact.php',
               data: $(this).serialize(), // serializes the form's elements.
               success: function(data)
               {
                var final_data = $.parseJSON(data);
                $('#success-error-message').text(final_data.msg);
                $('#success-error-message').parent('div.alert').show();
                $("#frm-contact")[0].reset();
                
            }
        });
    }
    return false;
});
*/


$("#frm-contact").on('submit',function(){
    var Is_Valid = true;

    if($('#frm-name').val() == ""){
        Is_Valid = false;
        $("#frm-name").addClass('error');
    }else{
        $("#frm-name").removeClass('error');
    }
    if($('#frm-last-name').val() == ""){
        Is_Valid = false;
        $("#frm-last-name").addClass('error');
    }else{
        $("#frm-last-name").removeClass('error');
    }

    if($('#frm-email').val() == ""){
        Is_Valid = false;
        $('#frm-email').addClass('error');
    }else if(!ValidateEmail($("#frm-email").val())){
        Is_Valid = false;
        $('#frm-email').addClass('error');
    }else{
        $('#frm-email').removeClass('error');
    }

    if($('#frm-website').val() == ""){
        Is_Valid = false;
        $('#frm-website').addClass('error');
    }else{
        $('#frm-website').removeClass('error');
    }

    if($('#frm-subject').val() == ""){
        Is_Valid = false;
        $('#frm-subject').addClass('error');
    }else{
        $('#frm-subject').removeClass('error');
    }


    if(Is_Valid){
        $.ajax({
         type: "POST",
         url: ajax,
           data: $(this).serialize(), // serializes the form's elements.
           success: function(data)
           {
               var final_data = $.parseJSON(data);
               $('#success-error-message').text(final_data.msg);
               $('#success-error-message').parent('div.alert').show();
               $("#frm-contact")[0].reset();
              
               $('#frm-subject').find('select option:eq(0)').prop('selected', true);
                $('#selectsubject').text('Select your subject');
           }
       });
    }

    return false;
});


/*end 11-12-2014*/

/*12-12-2014*/

$('.common-class').hover(
 function() {
     $(this).find('img').show();
 }, function() {
    $(this).find('img').hide();
}
);

$(".page-scroll").on('click touch',function(){
    resetAboutTab('abt-over');
});

var test = function(){
    var rect = document.getElementById('about-us').getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
        );
}


/*end 12-12-2014*/

 /*$('#nav-toggle').sidr({
        name: 'sidr-existing-content',
        source: '#navbar',
        side: 'right',
        speed: 200
    }); */

                                        /*$('body').on('click',function(){
                                            $('#nav-toggle').trigger('click');
                                        });*/
$('#nav-toggle').on('click touch',function(){
    var $this =$(this)
    $(this).toggleClass("active");
    
    if($(this).hasClass("active")){
     /* $('nav').addClass('resize');*/
        //$this.addClass('resize-btn');
        /* $('.brand-logo img').addClass('resize-img');*/
    }else{
     /* $('nav').removeClass('resize');*/
        //$this.removeClass('resize-btn');
        /*$('.brand-logo img').removeClass('resize-img');*/
    }
});
//$('#abt-history').css('min-height','570px');
$('.carousel-control').on('mouseover',function(){
	$(this).children().css('display','inline');
	
});

$('.carousel-control').on('mouseout',function(){
    $(this).children().css('display','none');

});






});


/*Placeholder on IE*/
$('[placeholder]').focus(
function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
        }
    }).blur(function() {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
        }
    }).blur().parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        })
    });

/*place*/
