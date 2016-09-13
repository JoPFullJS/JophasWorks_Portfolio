$(document).ready( function(e) {
	
	$(function process_com()
	{
		$("#contact").submit(function(event)
		{
			var i = 0;
			$("input").each(function(){
				i++;
				if($(this).val() == "" || $(this).val() == "http://www.")
				{
					$(this).removeAttr("value");
					$(this).attr("placeholder","Veuillez remplir ce champ !");
				}
				else
				{
					$("textarea.message").each(function(){
					if($(this).val() == "")
					{
						$(this).attr("placeholder","Veuillez remplir ce champ !");
					}
					else
					{
						if(i == 3)
						{
							
							$.ajax({
								type : "POST",
								url: $("#contact").attr("action"),
								data: $("#contact").serialize(),
								beforeSend : function() { // traitements JS &agrave; faire AVANT l'envoi
								$(".loader").html('<img src="http://jophasworks.com/img/loading.gif" alt="loader" height="60" />');
								},
								success : function(data) {
									
									$(".content_post:first").before($(data).fadeIn(1600));
									$('.sub_rn').attr('disabled','disabled');
									$('.sub_rn').css("background-color", "#B8B7B7");
									$(".content_post:first").css("background-color","#ececec");
									
										$(function(){
											var durrest = 5;
											$(function compte(){
													var rebour = durrest + ' secondes avant refraichissement...';
													$(".loader").text(rebour);
													durrest--;
													setTimeout(compte, 1000);
													
													if(durrest == 0)
													{
														location.reload();
													}
											});
									
										});
								},
								error: function() {
									$(".new_post").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
								}
								});
						}
					}
					});
				}
			});
			
			
		});
	});
	
});