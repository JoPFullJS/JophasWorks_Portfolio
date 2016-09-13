$(document).ready( function(e) {

 
 $('.admail').keyup(function() {
  
    if(!$(".admail").val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
             $('.sub_rn').attr('disabled','disabled');
			 $('.admail').css("border", "1px solid #C51B1D");
			 $('.admail').css("color", "#B8B7B7");
			 $('.sub_rn').css("background-color", "#B8B7B7");
			 $('.admail').css("background", "url(http://jophasworks.com/img/no.png) no-repeat right");
        }
	else{
		$('.sub_rn').removeAttr('disabled');
		$('.admail').css("border", "1px solid #26C51B");
	    $('.admail').css("color", "#50BAEE");
		$('.sub_rn').css("background-color", "#50baee");
		$('.admail').css("background", "url(http://jophasworks.com/img/yes.png) no-repeat right");
	}
	
	var nombreCaractere = $(this).val().length;
    var nombreCaractere = 40 - nombreCaractere;
    
    var nombreMots = jQuery.trim($(this).val()).length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }	
    
    var msg = '(' + nombreMots + ' Carac. utilisé(s) | ' + nombreCaractere + ' Carac. restant(s))';
    $('.lgmail').text(msg);
    if (nombreCaractere < 0) 
	{ 
		$('.lgmail').addClass("mauvais"); 
		$('.lgmail').removeClass("bon");
		$('.sub_rn').attr('disabled','disabled');
		$('.sub_rn').css("background-color", "#B8B7B7");
	}
	else 
	{ 
		$('.lgmail').addClass("bon");
		$('.lgmail').removeClass("mauvais");
		
		
		
	}
    
  });
  $('.adtel').keyup(function() {
  
    if(!$(".adtel").val().match(/^(\+33\.|0)[0-9]{9}$/)){
             $('.sub_rn').attr('disabled','disabled');
			 $('.adtel').css("border", "1px solid #C51B1D");
			 $('.adtel').css("color", "#B8B7B7");
			 $('.sub_rn').css("background-color", "#B8B7B7");
			 $('.adtel').css("background", "url(http://jophasworks.com/img/no.png) no-repeat right");
        }
	else{
		$('.sub_rn').removeAttr('disabled');
		$('.adtel').css("border", "1px solid #26C51B");
	    $('.adtel').css("color", "#50BAEE");
		$('.sub_rn').css("background-color", "#50baee");
		$('.adtel').css("background", "url(http://jophasworks.com/img/yes.png) no-repeat right");
	}
    
  });
  $('.adurl').keyup(function() {
  
    if(!$(".adurl").val().match(/^(http:\/\/www\.|https:\/\/www\.|ftp:\/\/www.|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/)){
             $('.sub_rn').attr('disabled','disabled');
			 $('.adurl').css("border", "1px solid #C51B1D");
			 $('.adurl').css("color", "#B8B7B7");
			 $('.sub_rn').css("background-color", "#B8B7B7");
			 $('.adurl').css("background", "url(http://jophasworks.com/img/no.png) no-repeat right");
        }
	else{
		$('.sub_rn').removeAttr('disabled');
		$('.adurl').css("border", "1px solid #26C51B");
	    $('.adurl').css("color", "#50BAEE");
		$('.sub_rn').css("background-color", "#50baee");
		$('.adurl').css("background", "url(http://jophasworks.com/img/yes.png) no-repeat right");
	}
    
  });
  $('.adtext').keyup(function() {
	  
	if(!$(".adtext").val().match(/^([a-zA-Z0-9]){3,10}$/)){
             $('.sub_rn').attr('disabled','disabled');
			 $('.adtext').css("border", "1px solid #C51B1D");
			 $('.adtext').css("color", "#B8B7B7");
			 $('.sub_rn').css("background-color", "#B8B7B7");
			 $('.adtext').css("background", "url(http://jophasworks.com/img/no.png) no-repeat right");
        }
	else{
		$('.sub_rn').removeAttr('disabled');
		$('.adtext').css("border", "1px solid #26C51B");
	    $('.adtext').css("color", "#50BAEE");
		$('.sub_rn').css("background-color", "#50baee");
		$('.adtext').css("background", "url(http://jophasworks.com/img/yes.png) no-repeat right");
	}
  
    var nombreCaractere = $(this).val().length;
    var nombreCaractere = 10 - nombreCaractere;
    
    var nombreMots = jQuery.trim($(this).val()).length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }	
    
    var msg = '(' + nombreMots + ' Carac. utilis&eacute;(s) | ' + nombreCaractere + ' Carac. restant(s))';
    $('.lgtext').text(msg);
    if (nombreCaractere < 0) 
	{ 
		$('.lgtext').addClass("mauvais"); 
		$('.lgtext').removeClass("bon");
	}
	else 
	{ 
		$('.lgtext').addClass("bon");
		$('.lgtext').removeClass("mauvais");
		
		
	}
    
  }); 
  
  $('#admes').keyup(function() {
  
    var nombreCaractere = $(this).val().length;
    var nombreCaractere = 500 - nombreCaractere;
    
    var nombreMots = jQuery.trim($(this).val()).length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }	
    
    var msg = '(' + nombreMots + ' Carac. utilis&eacute;(s) | ' + nombreCaractere + ' Carac. restant(s))';
    $('.lgmes').text(msg);
    if (nombreCaractere < 0 || nombreCaractere > 490) 
	{ 
		$('.lgmes').addClass("mauvais"); 
		$('.lgmes').removeClass("bon");
		 $('.sub_rn').attr('disabled','disabled');
		 $('.sub_rn').css("background-color", "#B8B7B7");
	}
	else 
	{ 
		$('.lgmes').addClass("bon");
		$('.lgmes').removeClass("mauvais");
		$('.sub_rn').removeAttr('disabled');
		$('.sub_rn').css("background-color", "#50baee");
		
		
	}
    
  }); 
  
  $('.titre').keyup(function() {
  
    var nombreCaractere = $(this).val().length;
    var nombreCaractere = 70 - nombreCaractere;
    
    var nombreMots = jQuery.trim($(this).val()).length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }	
    
    var msg = '(' + nombreMots + ' Carac. utilis&eacute;(s) | ' + nombreCaractere + ' Carac. restant(s))';
    $('.lgmes').text(msg);
    if (nombreCaractere < 0) 
	{ 
		$('.lgmes').addClass("mauvais"); 
		$('.lgmes').removeClass("bon");
		 
	}
	else 
	{ 
		$('.lgmes').addClass("bon");
		$('.lgmes').removeClass("mauvais");
		
	}
    
  }); 
  
  $('.desk').keyup(function() {
  
    var nombreCaractere = $(this).val().length;
    var nombreCaractere = 200 - nombreCaractere;
    
    var nombreMots = jQuery.trim($(this).val()).length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }	
    
    var msg = '(' + nombreMots + ' Carac. utilis&eacute;(s) | ' + nombreCaractere + ' Carac. restant(s))';
    $('.lgmes_1').text(msg);
    if (nombreCaractere < 0) 
	{ 
		$('.lgmes_1').addClass("mauvais"); 
		$('.lgmes_1').removeClass("bon");
		 
	}
	else 
	{ 
		$('.lgmes_1').addClass("bon");
		$('.lgmes_1').removeClass("mauvais");
		
	}
    
  }); 
    
});
