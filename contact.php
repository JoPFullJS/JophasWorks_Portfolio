<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:600italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    <link href="css/principale.css" rel="stylesheet">

	<link rel="stylesheet" media="screen and (min-width:1280px)" href="css/xlargescreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:1100px) and (max-width:1280px)" href="css/largescreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:900px) and (max-width:1100px)" href="css/commonscreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:240px) and (max-width:900px)" href="css/xsmallscreen.css" type="text/css" />
<link rel="stylesheet" media="screen and (min-width:240px) and (max-width:600px)" href="css/smallscreen.css" type="text/css" />
	
	

	<link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
	<script src="bootstrap/dist/js/jquery.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="shared/validation.js"></script>
	<script type="text/javascript" src="shared/process.js"></script>
	<title>Jophas Work, contactez moi pour un rendez-vous.</title>
	<script>
		$(document).ready(function() {

			var init = false;

			$(".hamber").click(function(){
			console.log("click");

			if(init == false){

				$(".main-header").show("slow");

				init = true;

			}
			else if(init == true){
				$(".main-header").hide("slow");
				init =false;
			}


			})
			});
	</script>
	
</head>
<body>
<div class="">
	<div class="full-bar">
		<div class="layer-bar">
    
	      <div style="width:100%; height:100px; margin-top:20px;">
					<a class="img_index" href="http://jophasworks.com/index.php">
						<img src="img/jophas_works.png" alt="Jopha's works" title="JophasWorks, des idées pour le web !" style="height:90px; float:left;">
					</a>
				</div>
	      <div style="width:100%; height:45px; margin-bottom:5px;">

	        <div style="text-align:right;">
	          <a class="label1" title="GitHub" alt="GitHub" class="btn" href="https://github.com/JopFred"><img src="img/github_inc.png"/></a>
	          
	          <a class="label1" title="LinkdIn" alt="LinkdIn" class="btn" href="https://www.linkedin.com/in/freddy-jopha-0ab100126"><img src="img/linkdin_inc.png"/></a>
	          <a class="label1" title="Behance" alt="Behance" class="btn" href="https://www.behance.net/jophalupib5b8"><img src="img/behance_inc.svg" height="35"/></a>
	        </div>
	      </div>

	</div>
	</div>
	<div class="main-header">
		<nav class="main-nav">
				<ul>
						<li class="folio bord"><a href="http://jophasworks.com/projets.php">Projets web</a></li>
							<li class="creation bord"><a href="http://jophasworks.com/creations.php">Creations</a></li>
							<li class="dev bord"><a href="http://jophasworks.com/dev.php">Dev.Codes</a></li>
							<li class="certif bord"><a href="http://jophasworks.com/certification.php">Certification</a></li>
							<li class="about bord"><a href="http://jophasworks.com/about.php">Competences</a></li>
			<li class="contact bord redbord"><a href="http://jophasworks.com/contact.php">Contact</a></li>
					</ul>
			</nav>
	</div>
	<div class="categorie">
		<p>Me contacter pour plus d'informations.</p>
		
	</div>


	<div class="content_contact">
		<div class="head_contact">
			<div class="img_dial"><img src="img/dial.png"/></div>
			<div class="apost_1"><img src="img/apostrophe_1.png" /></div>
			<div class="txt_dial"><p>Pour toute demande d'information ou de devis, veuillez remplir le formulaire ci-dessous. Je vous recontacte dans les 24 heurs.</p></div>
			<div class="apost_2"><img src="img/apostrophe_2.png" /></div>
		</div>
		<div style=" margin-top:15px;"><p class="good_form" style="text-align:center;"></p><br /><p class="redir" style="text-align:center;" ></p></div>
		<div class="head_formulaire" style="margin-bottom: 50px;">
			<form id="contact" method="post" action="http://jophasworks.com/shared/process.php" onsubmit="return false;" enctype="multipart/form-data">
			<div class="form">
				<div class="form_left">
					<div>
						<label>Votre nom* :</label><span class="lgtext"></span>
						<input class="adtext"  name="pseudo" />
					</div>
					<div>
						<label>Votre adresse mail* :</label><span class="lgmail"></span>
						<input class="admail"  name="mail" />
					</div>
					<div>
						<label>Votre t&eacute;l&eacute;phone :</label><span>Ex: 0199989796</span>
						<input class="adtel"  name="tel" placeholder="(+33)"/>
					</div>
					<div>
						<label>Votre site web</label>
						<input class="adurl"  name="url" value="http://www." onfocus="if(this.value=='http://www.')this.value='http://www.'; else if(this.value=='')this.value='http://www.';" onblur="if(this.value=='') this.value='http://www.';"/>
					</div>
				</div>
				<div class="form_right">
					<label>Tapez votre message* :</label><span class="lgmes"></span>
					<textarea id="admes" name="message" class="message"  ></textarea>
				</div>
			</div>
				<div class="button_sub"><input class="sub_rn" type="submit" name="envoyer" value="Soumettre" onsubmit="process();" /></div>
			</form>
		</div>
	</div>
		<div style="clear:both; height:20px; background-color:#96c6ca;"></div>
  <div style="text-align:center; padding:20px 0px; background-color:#96c6ca;">
		<a class="label1" title="GitHub" alt="GitHub" class="btn" href="https://github.com/JopFred"><img src="img/github_inc.png"/></a>
		
		<a class="label1" title="LinkdIn" alt="LinkdIn" class="btn" href="https://www.linkedin.com/in/freddy-jopha-0ab100126"><img src="img/linkdin_inc.png"/></a>
		<a class="label1" title="Behance" alt="Behance" class="btn" href="https://www.behance.net/jophalupib5b8"><img src="img/behance_inc.svg" height="35"/></a>
	</div>
</div>
</body>
</html>
