<?php

$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM');

   //On selectionnetous les element par vues
   $select_list = "SELECT a.ID_element,COUNT(a.ID) AS cp,a.ID_categorie,a.titre,a.fonction,a.date,b.ID_lien,b.lk_list,b.lk_fichier,c.id_stat,c.nb_vue,d.ID_compteur,d.vt_pos,d.vt_neg,e.ID_page,COUNT(e.txt_content) AS nb_com FROM descriptions AS a,lien AS b,statistiques AS c,compteur AS d,comments AS e WHERE a.ID_element=b.ID_lien AND a.ID_element=c.id_stat AND a.ID_element=d.ID_compteur AND a.ID_element=e.ID_page AND a.ID_categorie=1 GROUP BY e.ID_page ORDER BY a.date DESC";
   //On traite la requete de la categorie
   $req_select = $pdo->query($select_list);
   //$verif_select = $req_select->fetch();
   //print_r($verif_select);

?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:600italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    <link href="css/principale.css" rel="stylesheet">

	<link rel="stylesheet" media="screen and (min-width:1280px)" href="css/xlargescreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:1100px) and (max-width:1280px)" href="css/largescreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:900px) and (max-width:1100px)" href="css/commonscreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:240px) and (max-width:900px)" href="css/xsmallscreen.css" type="text/css" />
<link rel="stylesheet" media="screen and (min-width:240px) and (max-width:600px)" href="css/smallscreen.css" type="text/css" />



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<META NAME="ROBOTS" content="none,noarchive">
	<link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<script src="bootstrap/dist/js/jquery.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="shared/box_responsive.js"></script>
	<title>Jophas Work, developpeur web.</title>


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
              <li class="dev bord redbord"><a href="http://jophasworks.com/dev.php">Dev.Codes</a></li>
              <li class="certif bord"><a href="http://jophasworks.com/certification.php">Certification</a></li>
              <li class="about bord"><a href="http://jophasworks.com/about.php">Competences</a></li>
      <li class="contact bord"><a href="http://jophasworks.com/contact.php">Contact</a></li>
          </ul>
      </nav>
  </div>
	<div class="categorie"><p>Mes développement de composants </p></div>



	<div class="content_list" id="main" >

		<?php while($verif_select = $req_select->fetch()) { ?>


			<div class="projet_list dev_list crea_list">
			  <div class="titre_detaille">
				<div class="titre_box"><p class="title"><a href="<?php echo $verif_select['lk_fichier']; ?>"><?php echo htmlentities($verif_select['titre']); ?></a></p></div>
			  </div>
			  <div class="app_date">
				<div class="date_box"><p class="date">
				<?php
				$date = $verif_select['date'];
				$date2 = substr($date,0,10);
				$jour = date('d', strtotime($date2));
				$njour = date('w', strtotime($date2));
				$year = date('Y', strtotime($date2));
				$nmois = date('m', strtotime($date2));

				switch ($njour) {
						case 1:
						$semaine = "Lun.";
						break;
						case 2:
						$semaine = "Mar.";
						break;
						case 3:
						$semaine = "Mer.";
						break;
						case 4:
						$semaine = "Jeu.";
						break;
						case 5:
						$semaine = "Ven.";
						break;
						case 6:
						$semaine = "Sam.";
						break;
						case 0:
						$semaine = "Dim.";
						break;
				}

				switch ($nmois) {
						case 1:
						$mois = "Jan.";
						break;
						case 2:
						$mois = "F&eacute;v.";
						break;
						case 3:
						$mois = "Mar.";
						break;
						case 4:
						$mois = "Avr.";
						break;
						case 5:
						$mois = "Mai.";
						break;
						case 6:
						$mois = "Juin";
						break;
						case 7:
						$mois = "Juil.";
						break;
						case 8:
						$mois = "Aou.";
						break;
						case 9:
						$mois = "Sept.";
						break;
						case 10:
						$mois = "Oct.";
						break;
						case 11:
						$mois = "Nov.";
						break;
						case 12:
						$mois = "Dec.";
						break;
				}
				echo $semaine." ".$jour."  ".$mois;
				?>
				</p></div>
				<div class="app_box"><p class="app"><?php echo $verif_select['vt_pos']; ?>&nbsp;Lks</p></div>
			  </div>
			  <div class="photo_list"><article class="img_box"><img src="<?php echo $verif_select['lk_list']; ?>" class="imaged" /><a class="fonction" href="<?php echo $verif_select['lk_fichier']; ?>">
				  <ul>
					<li>Fonctionnalit&eacute;s de l'application</li>
					<?php
						$fonction=explode("-",$verif_select['fonction']);
						$compteur=count($fonction);
						for($i=0;$i<$compteur;$i++)
						{
							echo "<li>".$fonction[$i]."</li>";
						}
					?>
				  </ul>
			  </a></article></div>
			  <div class="rating">
				<div class="vue_box"><p><?php echo $verif_select['nb_vue']; ?>&nbsp;Vues</p></div>
				<div class="com_box"><p><?php echo $verif_select['nb_com']; ?>&nbsp;Coms</p></div>
			  </div>
			</div>

		<?php } ?>


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
