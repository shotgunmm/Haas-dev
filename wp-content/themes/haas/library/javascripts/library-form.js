jQuery(document).ready(function(){
	jQuery('.s-form').submit(function(ev){
  		ev.preventDefault();
  		var y = 0;
		var first = jQuery('#first').val();
		var last = jQuery('#last').val();
		var email = jQuery('#email').val();
		var company = jQuery('#company').val();
		var path = jQuery(location).attr('hostname');
		var protocol = jQuery(location).attr('protocol');
		var mail = protocol+'//'+path+'/wp-content/themes/haas/library/partials/mail.php';
		var pdfpath = protocol+'//'+path+'/wp-content/themes/haas/library/partials/pdfDownload.php?pdf='+jQuery('#pdfpath').attr('class');
		//alert(pdfpath);
		jQuery.ajax({
		  type: "POST",
		  url: mail,
		  data: {first: first,last: last,email: email,company: company},
		  success: function(data){ 
		  		//var y = 1;
		   		jQuery.fileDownload(pdfpath)
            	.done(function () { location.reload(); })
            	.fail(function () { alert('File download failed!'); });
		    
		    return false;
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
		     alert("some error");return false;
		  }
		});
		
			setTimeout(function(){ location.reload(); }, 5000);
				
	}); 	 	
});

//action="http://haas.shotgunflat8.com/wp-content/themes/haas/mail.php"