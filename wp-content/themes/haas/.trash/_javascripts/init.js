var ajax = template_directory + '/library/ajax/ajax.php';

var resetAboutTab = function(tabid){
    $('.nav-tabs a[href="#'+tabid+'"]').tab('show');
}

$(document).ready(function() {

     setTimeout(function(){  $('#carousel-example-generic').find('.item.active .fadevalue').delay(800).fadeIn(800); }, 3000);
   
    $('#carousel-example-generic').on('slid.bs.carousel', function () {
            $('.fadevalue').hide();
            $(this).find('.item.active .fadevalue').delay(500).fadeIn(800);
    });

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
            }else if(idname == "why-haas"){
                xPos = '50%';
            }

            if($window.scrollTop() < 114 || $window.scrollTop() > 1366){
                resetAboutTab('abt-over');
            }
            
            if(idname == "why-haas"){
              //  yPos = yPos + (-285);
            }
            var coords = xPos + yPos + 'px';

            // move the background
            $scroll.css({
                backgroundPosition: coords
            });
        }); // end window scroll
    }); // end section function


    $('.cross-img').click(function() {
        $('#product-div').fadeIn();
        $('#classic-product').hide();
        $('#advance-product').hide();
    });

    $('#product-classic').click(function() {
        $('#product-div').hide();
        $('#classic-product').fadeIn();
    });

    $('#product-advance').click(function() {
        $('#product-div').hide();
        $('#advance-product').fadeIn();
    });

	
	// SETUP NAVIGATION AND INITIAL SCROLL POSITION
	if( single_page ) {
	    $('html, body').stop().animate({
	        scrollTop: $(initial_scroll_element.attr('href')).offset().top
	    }, 1500, 'easeInOutExpo');

		$('nav').find('a[data_replace]').each(function(){
			$(this).attr('href', $(this).attr('data_replace'));
		})
	}


}); // close out script

/* Create HTML5 element for IE */
document.createElement("section");




function RePosition() {
    if ($(window).width() < 992) {
        $('#about-us .tab-content').insertAfter('#about-us .nav.nav-tabs');
    } else {
        $('#about-us .tab-content').insertBefore('#about-us .nav.nav-tabs');
    }
    if ($(window).width() < 749) {
        $('.resource-block h2.move-head').insertBefore('.resources-tab .tab-content');
    } else {
        $('.resource-block h2.move-head').insertBefore('#resource .resource-block .resources-tab');
    }

}



$(window).resize(function() {
    RePosition();
});
$(window).load(function() {
    RePosition();
});

$(document).ready(function() {
    resizeDiv();
});

window.onresize = function(event) {
    resizeDiv();
}

function resizeDiv() {
    if ($(window).width() > 1600) {
        vpw = $(window).width();
        vph = $(window).height();
        $('#contact').css({
            'height': vph + 'px'
        });
    } else {
        $('#contact').removeAttr('style');
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

    $(window).scroll(function() {
        animate_elems();
    });

    function animate_elems() {
            wintop = $(window).scrollTop(); // calculate distance from top of window

            // loop through each item to check when it animates
            $elems.each(function() {
                $elm = $(this);

                if ($elm.hasClass('animated')) {
                    return true;
                } // if already animated skip to the next item

                topcoords = $elm.offset().top; // element's distance from top of page in pixels

                if (wintop > (topcoords - (winheight * .75))) {
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
    $(".team-member a").on('click',function(){
        $(".team-member").hide();
        $('.green-container' + $(this).attr('href') ).fadeIn();
        return false;
    });
   
    $(".team-cross").on('click',function(){
       $(".green-container").hide();
       $(".team-member").fadeIn();
    });

//crousal working of tab;
    $('#about-tab-mobile li a[data-toggle="tab"]').on('shown.bs.tab', function (e) {   

    var target = $(this).attr('href');

    $(target).css('left','-'+$(window).width()+'px');   
    var left = $(target).offset().left;
    $(target).css({left:left}).animate({"left":"0px"}, "10");
});

    //partners read more
    $('.read-more-lnk').on('click',function(){
        $(this).prev().slideToggle( "slow" );
        $(this).hide();
    });

    //move from green links
$('.move-via-green').on('click',function(){
   var moveVal = $(this).attr('relative');

    $('.nav-tabs a[href="#'+moveVal+'"]').tab('show');

/*    $('#'+moveVal).addClass('active');
    var active_tab = $(this).attr('settrigger');
    $('#'+active_tab).trigger('click'); */
    $("html, body").animate({ scrollTop: $('#resource').offset().top }, 500);
});

//contact form submission
function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };

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

	console.log($(this).serialize())

    if(Is_Valid){
        $.ajax({
           type: "POST",
           url: ajax,
           data: $(this).serialize(), // serializes the form's elements.
           success: function(data)
           {
	           	console.log(data);
                var final_data = $.parseJSON(data);
                $('#success-error-message').text(final_data.msg);
                $('#success-error-message').parent('div.alert').show();
                $("#frm-contact")[0].reset();
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

$(".page-scroll").on('click',function(){
    resetAboutTab('abt-over');
});

$('#sort-varieties').on('change', function(){
	$('.var-sort-list').fadeOut();
	$('.var-sort-list.' + $(this).val() ).fadeIn();
})

 var test = function(){
    var rect = document.getElementById('about-us').getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
    );
}

$('window').on('scroll',function(){
    console.log("hello");
console.log(test());
});

    /*end 12-12-2014*/
});