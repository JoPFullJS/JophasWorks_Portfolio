<?php

	$page = $_SERVER['PHP_SELF'];
	$nom = rtrim($page, '.php');
	$id = substr($nom,-9);
	
$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM');

$ajout_unit="SELECT ID_app,lk_dossier FROM app WHERE ID_app='".$id."'";
$req_unit =  $pdo->query($ajout_unit);
$redir = $req_unit->fetch();

?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:600italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    <link href="../css/principale.css" rel="stylesheet">
	<link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
	<script src="../bootstrap/dist/js/jquery.min.js"></script>
	<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//localhost/jophasworks/shared/validation.js"></script>
	<title>Jophas Work, developpeur web.</title>
	
</head>
<body>
<div class="">
<div class="full-bar">
	<div class="layer-bar">
    
    	<div class="partage"><a class="label1" title="Partage de code !" class="btn" rel="popover" href="/"><img src="../img/partager.png"/></a></div>
        <div class="search"><a class="label2" id="jdk" title="Que cherchez vous !" class="btn" rel="popover" href="#oModal"><img src="../img/loupe.png"/></a></div>
 <div id="oModal" class="oModal">
	<div class="modal_close"><a href="#fermer" title="Fermer la fen�tre" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></div>
	<form autofocus="autofocus" class="layout-inner" id="search-form" action="/" role="search">
    

      <label for="search" class="search-label">QUE CHERCHER VOUS ?...</label>

      <input autofocus="autofocus"  class="search" type="search" name="s" >
	  
      <div class="modal-hint">Appuyer "Entrer" pour valider.</div>
    </form>
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
                <li class="logo"><a href="http://jophasworks.com/index.php"></a></li>
                <li class="certif bord"><a href="http://jophasworks.com/certification.php">Certification</a></li>
                <li class="about bord"><a href="http://jophasworks.com/about.php">Competences</a></li>
				<li class="contact bord redbord"><a href="http://jophasworks.com/contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
	<div class="categorie"><p>Page temporaire.</p></div>
	<div class="titre_techno" id="ajax"><p><span class="glyphicon glyphicon-chevron-right"></span>Page temporaire.</p></div>
	
		<div class="content_contact">
		<script>
		$(function(){
				var durrest = 5;
				$(function compte(){
						var rebour = durrest + ' secondes avant redirection...';
						$(".redir").text(rebour);
						durrest--;
						setTimeout(compte, 1000);
						
						if(durrest == 0)
						{
							var url = <?php echo "'".$redir['lk_dossier']."'"; ?>;    
							$(location).attr('href',url);
						}
				});
		
			});
		</script>
		<div><p class="redir" style="font-size:24px;"></p></div>
		
		
	</div>
	

</body>
</html>