$(document).ready( function(e) {

	$(function process()
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
						if(i == 5)
						{

							$.ajax({
								type : "POST",
								url: $("#contact").attr("action"),
								data: $("#contact").serialize(),
								beforeSend : function() { // traitements JS à faire AVANT l'envoi
								$(".good_form").html('<img src="http://jophasworks.com/img/loading.gif" alt="loader" height="60" />');
								},
								success : function(data) {
									$(".good_form").html(data);
									$('.sub_rn').attr('disabled','disabled');
									$('.sub_rn').css("background-color", "#B8B7B7");

										$(function(){
											var durrest = 10;
											$(function compte(){
													var rebour = durrest + ' secondes avant refraichissement...';
													$(".redir").text(rebour);
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
									$(".good_form").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
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
