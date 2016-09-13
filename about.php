<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
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
	<script type="text/javascript" src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.9.0/dist/progressbar.js"></script>
	<script type="text/javascript" src="shared/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="shared/jquery-scrollto.js"></script>

	<title>Jophas Work, developpeur web.</title>
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
	<div class="hamber" style="width:100%; display:none;">
<div style="width:20%; margin:auto;text-align:center; margin-bottom:20px; margin-top:20px; background-color:#C7E4E7; ">
<img src="img/icon_folio/services/icon/hamburger.svg" style="color:#000000; width:35px;" />
<a style="font-family:roboto; color:#e1645e; font-size:2em;" href="#"><p style="display:inline-block; position:relative; top:5px;">MENU</p></a>
</div>
</div>

	<div class="main-header">
		<nav class="main-nav">
				<ul>
						<li class="folio bord"><a href="http://jophasworks.com/projets.php">Projets web</a></li>
							<li class="creation bord"><a href="http://jophasworks.com/creations.php">Creations</a></li>
							<li class="dev bord"><a href="http://jophasworks.com/dev.php">Dev.Codes</a></li>
							<li class="certif bord"><a href="http://jophasworks.com/certification.php">Certification</a></li>
							<li class="about bord redbord"><a href="http://jophasworks.com/about.php">Competences</a></li>
			<li class="contact bord"><a href="http://jophasworks.com/contact.php">Contact</a></li>
					</ul>
			</nav>
	</div>
	<div class="categorie">
		<p>A Propos</p>

		<div class="getToAction" style="height:50px; text-align:center;">

			<a href="https://drive.google.com/file/d/0B-h1w_O9Ak36N1plUmhKNDBYbEk/view?usp=sharing" target="_blank" style="padding-left: 48px; padding-right: 48px; line-height: 48px; font-family:roboto; font-size:2em; text-transform:uppercase; font-weight:500; color:#eff9fa; letter-spacing:1px; text-decoration:none; height: 100%; position: relative; display: inline-block; margin-top:20px; background-color:#e1645e; border-radius:4px; border: 2px solid #eff9fa;">
				<span>Mes motivations et Mon<span style="font-size:2.2em; color:#3a8188;">C.V</span></span>
			</a>


		</div>

	</div>
	<div class="content_list_about">
		<div class="fiche_identite">
			<div class="context_about">
				<div class="photo">
					<div class="img_photo"><img src="img/avatar.jpg" /></div>
				</div>
				<div class="denomination">
					<h1>FREDDY JOPHA</h1>
					<h2>Développeur Full Stack JS</h2>
					<p>
						Adresse email:&nbsp;<strong>jophalupi@gmail.com</strong><br/>
						Age:&nbsp;<strong>30&nbsp;ans</strong><br/>
					</p>
				</div>
			</div>

		</div>

		<div class="exp_pro">
			<div class="context_about">
				<div class="titre_exp"><p>Experiences Professionnelles</p></div>
				<div class="content_exp">
					<h4>2016</h4>
					<h3>R&eacute;alisation d&acute;une IHM en AngularJS et d&acute;un webService RESTfull en Java EE 8 pour un projet maven de gestion de cave à vin.</h3>
					<p>Application Angular / nodeJS / Java EE de gestion d&acute;une cave &agrave; vin.</p>
						<ul class="list_ext">
							<li>Methode de travail SRCUM</li>
							<li>Construction d’un diagramme UML</li>
							<li>Mise à niveau pour Java EE 8</li>
                            <li>Configuration environnement <strong>pom.xml</strong> et applicatif <strong>WEB-INF</strong></li>
                            <li>Utilisation des composants CDI</li>
                            <li>IHM en <strong>angular 2.0</strong> et utilisation service REST <strong>$http</strong></li>
						</ul>
                    <h4>2015</h4>
					<h3>Cr&eacute;ation de mon Portfolio dans le cadre d'une embauche.</h3>
					<p>Site personnel pour promouvoir mes comp&eacute;tences</p>
						<ul class="list_ext">
							<li>Int&eacute;gration HTML5 / CSS3 / jQuery</li>
							<li>Design Web</li>
							<li>Animation Jquery</li>
						</ul>
					<h4>2014</h4>
					<h3>Cr&eacute;ation du site "ezin-echanges.com" - Freelance (Web Design / Intr&eacute;gration / D&eacute;veloppement)</h3>
					<p>Site pour une entreprise en restauration</p>
						<ul class="list_ext">
							<li>Int&eacute;gration HTML5 / CSS3 / jQuery</li>
							<li>Design Web</li>
						</ul>
					<h4>2013</h4>
					<h3>Plateforme de divertisement - Freelance (Web Design / Intr&eacute;gration / D&eacute;veloppement)</h3>
					<p>Projet personnel</p>
						<ul class="list_ext">
							<li>Int&eacute;gration HTML5 / CSS3 / jQuery</li>
							<li>D&eacute;veloppement web PHP / MySQL</li>
						</ul>
				</div>

			</div>
		</div>
	<div class="fiche_contact">
		<div class="context_about">
			<div class="text_contact"><p>Me contactez !</p></div>
			<div class="content_contact">
			<div class="head_contact">
				<div class="img_dial"><img src="img/dial.png"/></div>
				<div class="apost_1"><img src="img/apostrophe_1.png" /></div>
				<div class="txt_dial"><p>Pour toute demande d'information ou de devis, veuillez remplir le formulaire ci-dessous. Je vous recontacte dans les 24 heurs.</p></div>
				<div class="apost_2"><img src="img/apostrophe_2.png" /></div>
			</div>
			<div class="head_formulaire">
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

		</div>
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
