<?php

	//On prend l'identifiant de la page
	$page = $_SERVER['PHP_SELF'];
	$nom = rtrim($page, '.php');
	$id = substr($nom,-9);
	//print_r($id);
	$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM');
   
   $ajout_unit="SELECT nb_vue,id_stat FROM statistiques WHERE id_stat='".$id."'";
   $req_unit =  $pdo->query($ajout_unit);
	
	while($verif_unit = $req_unit->fetch())
	{
		$unit = $verif_unit['nb_vue']+1;
		$maj = "UPDATE statistiques SET nb_vue='".$unit."' WHERE id_stat='".$id."'";
		$req_maj = $pdo->query($maj); 
	}	
	
   //On selectionne de la page
   $video_select = "SELECT a.ID_element,a.ID,a.ID_categorie,a.titre,a.description,a.date,a.fonction,a.icon,b.ID_lien,b.lk_image,c.id_stat,c.nb_vue,d.ID_compteur,d.vt_pos,d.vt_neg,e.ID_societe,e.lk_societe,e.societe,e.lk_logo FROM descriptions AS a,lien AS b,statistiques AS c,compteur AS d,societe AS e WHERE a.ID_element=b.ID_lien AND a.ID_element=c.id_stat AND a.ID_element=d.ID_compteur AND a.ID_element=e.ID_societe AND ID_element IN ('".$id."')";
   //On traite la requete de la categorie
   $req_video = $pdo->query($video_select);
   $verif_video = $req_video->fetch();
   //print_r($verif_video);
   
   $image_select = "SELECT ID_creation,lk_image FROM creation WHERE ID_creation='".$id."'";
   $req_image = $pdo->query($image_select);
   
   //print_r($verif_image);
   
    //-----------------------------------------------------------------------------------------------------
   //Pour les videos par categorie
   $select_theme = "SELECT COUNT(DISTINCT ID) AS theme FROM categories";
   $req_theme = $pdo->query($select_theme);
   $verif_theme = $req_theme->fetch();
   $nb_theme = $verif_theme['theme'];
   $cat_courant = $verif_video['ID_categorie'];
   $id_courant = $verif_video['ID'];
		//  Page suivant  ---------------------------//
		if($cat_courant == $nb_theme)
		{
			$select_count_cat = "SELECT ID_categorie,COUNT(DISTINCT ID) AS id FROM descriptions WHERE ID_categorie='".$nb_theme."' AND ID>'".$id_courant."'";
			$req_count_cat = $pdo->query($select_count_cat);
			$verif_count_cat = $req_count_cat->fetch();
			
			if($verif_count_cat['id'] == 0)
			{
			  $id_cat_courant = 1;
			  
			  $select_cat_sui = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$id_cat_courant."' ORDER BY a.ID ASC LIMIT 1";
			  $req_cat_sui = $pdo->query($select_cat_sui);
			  $verif_cat_sui = $req_cat_sui->fetch();
			   //print_r($verif_cat_sui);
			}
			else
			{
			  $select_cat_sui = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$cat_courant."' AND a.ID>'".$id_courant."' ORDER BY a.ID ASC LIMIT 1";
			  $req_cat_sui = $pdo->query($select_cat_sui);
			  $verif_cat_sui = $req_cat_sui->fetch();
			}
		}
		else
		{
			$select_count_cat = "SELECT ID_categorie,COUNT(DISTINCT ID) AS id FROM descriptions WHERE ID_categorie='".$cat_courant."' AND ID>'".$id_courant."'";
			$req_count_cat = $pdo->query($select_count_cat);
			$verif_count_cat = $req_count_cat->fetch();
			
			if($verif_count_cat['id'] == 0)
			{
			  $id_cat_sui = $cat_courant+1;
			  
			  $select_cat_sui = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$id_cat_sui."' ORDER BY a.ID ASC LIMIT 1";
			  $req_cat_sui = $pdo->query($select_cat_sui);
			  $verif_cat_sui = $req_cat_sui->fetch();
			}
			else
			{
			  $select_cat_sui = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$cat_courant."' AND a.ID>'".$id_courant."' ORDER BY a.ID ASC LIMIT 1";
			  $req_cat_sui = $pdo->query($select_cat_sui);
			  $verif_cat_sui = $req_cat_sui->fetch();
			}
		}
		//print_r($verif_cat_sui);
		//  Page precedente  ------------------------------------------------//
		if($cat_courant == 1)
		{
			$select_count_cat2 = "SELECT ID_categorie,COUNT(DISTINCT ID) AS id FROM descriptions WHERE ID_categorie='1' AND ID<'".$id_courant."'";
			$req_count_cat2 = $pdo->query($select_count_cat2);
			$verif_count_cat2 = $req_count_cat2->fetch();
			
			if($verif_count_cat2['id'] == 0)
			{
				$id_cat_courant2 = $nb_theme;
				
				$select_cat_pre = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$id_cat_courant2."' ORDER BY a.ID DESC LIMIT 1";
			    $req_cat_pre = $pdo->query($select_cat_pre);
				$verif_cat_pre = $req_cat_pre->fetch();
			}
			else
			{
			  $select_cat_pre = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$cat_courant."' AND a.ID<'".$id_courant."' ORDER BY a.ID DESC LIMIT 1";
			  $req_cat_pre = $pdo->query($select_cat_pre);
			  $verif_cat_pre = $req_cat_pre->fetch();
			}
		}
		else
		{
			$select_count_cat2 = "SELECT ID_categorie,COUNT(DISTINCT ID) AS id FROM descriptions WHERE ID_categorie='".$cat_courant."' AND ID<'".$id_courant."'";
			$req_count_cat2 = $pdo->query($select_count_cat2);
			$verif_count_cat2 = $req_count_cat2->fetch();
			
			if($verif_count_cat2['id'] == 0)
			{
			  $id_cat_pre = $cat_courant-1;
			  
			  $select_cat_pre = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$id_cat_pre."' ORDER BY a.ID DESC LIMIT 1";
			  $req_cat_pre = $pdo->query($select_cat_pre);
			  $verif_cat_pre = $req_cat_pre->fetch();
			}
			else
			{
			  $select_cat_pre = "SELECT a.ID,a.ID_element,a.ID_categorie,a.titre,b.ID_lien,b.lk_fichier FROM descriptions AS a,lien AS b WHERE a.ID_element=b.ID_lien AND a.ID_categorie='".$cat_courant."' AND a.ID<'".$id_courant."' ORDER BY a.ID DESC LIMIT 1";
			  $req_cat_pre = $pdo->query($select_cat_pre);
			  $verif_cat_pre = $req_cat_pre->fetch();
			}
		}
		
   //----------------------------------------------------------------------------------------------------------------------------------------//
   
   //----------------------		RATE		-----------------------------------------//
   if($verif_video['vt_pos']>$verif_video['vt_neg']) 
	{
		$res=($verif_video['vt_pos']*100)/($verif_video['vt_pos']+$verif_video['vt_neg']);
		$perct=round($res,4);
		$rate=round($perct,0);
		
		
	} 
	else{
		$res=($verif_video['vt_pos']*100)/($verif_video['vt_pos']+$verif_video['vt_neg']);
		$perct=round($res,4);
		$rate=round($perct,0);
		//echo $perct;
	} 
	
	$select_message = "SELECT ID_page,nom,mail,lk_web,txt_content,date FROM comments WHERE ID_page='".$id."' ORDER BY date DESC";
	$req_select = $pdo->query($select_message);

?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    <link href="../css/principale.css" rel="stylesheet">
	
	<link rel="stylesheet" media="screen and (min-width:1280px)" href="../css/xlargescreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:1100px) and (max-width:1280px)" href="../css/largescreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:900px) and (max-width:1100px)" href="../css/commonscreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:240px) and (max-width:900px)" href="../css/xsmallscreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:320px) and (max-width:600px)" href="../css/smallscreen.css" type="text/css" />
	<link rel="stylesheet" media="screen and (min-width:240px) and (max-width:320px)" href="../css/verysmallscreen.css" type="text/css" /> 
	
	<link href="../css/comments.css" rel="stylesheet">
	<link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
	<script src="../bootstrap/dist/js/jquery.min.js"></script>
	<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../shared/validation.js"></script>
	<script type="text/javascript" src="../shared/process_com.js"></script>
	<meta name="description" lang="fr" content="<?php echo strip_tags($verif_video['description']); ?>" />
	<link rel="canonical" href="<?php echo $verif_video['lk_fichier']; ?>" />
	<title><?php echo $verif_video['titre']; ?></title>
	
	<script>
		$(document).ready(function(){
		$('.image_ground>iframe').css('width','100%');
		
	});
	</script>
</head>
<body>
<div class="">
<div class="full-bar">
	<div class="layer-bar">
    
      <div style="width:100%; height:100px; margin-top:20px;">
				<a class="img_index" href="http://www.jophasworks.com/index.php">
					<img src="../img/jophas_works.png" alt="Jopha's works" title="JophasWorks, des idées pour le web !" style="height:90px; float:left;">
				</a>
			</div>
      <div style="width:100%; height:45px; margin-bottom:5px;">

        <div style="text-align:right;">
          <a class="label1" title="GitHub" alt="GitHub" class="btn" href="https://github.com/JopFred"><img src="../img/github_inc.png"/></a>
          
          <a class="label1" title="LinkdIn" alt="LinkdIn" class="btn" href="https://www.linkedin.com/in/freddy-jopha-0ab100126"><img src="../img/linkdin_inc.png"/></a>
          <a class="label1" title="Behance" alt="Behance" class="btn" href="https://www.behance.net/jophalupib5b8"><img src="../img/behance_inc.svg" height="35"/></a>
        </div>
      </div>

</div>
</div>

<script type="text/javascript" >
  function getvoting(id,type)
	{
      $.ajax({
  	type : 'POST', 
	url : '../shared/voting_sys.php', 
	data : {
		id:id,
		type:type
		},
	success : function(data){ 
			if(data)
			{
				if(type)
				{
					t_up = parseInt(data);
					var t_down = <?php echo $verif_video['vt_neg']; ?>;
					var t_percent = (t_up*100)/(t_up+t_down);
					$(".vote_positif").css("width", t_percent + "%");
					$("#rate_pos").html(t_up);
				}
				else
				{
					t_down = parseInt(data);
					var t_up = <?php echo $verif_video['vt_pos']; ?>;
					var t_percent = (t_up * 100) / (t_up + t_down);
					$(".vote_positif").css("width", t_percent + "%");
					$("#rate_neg").html(t_down);
				}
				$(".pourcentage").html('Merci !');
				/*$(".pourcentage").css("padding-top", "4px");*/
				$(".pourcentage").css("font-size", "1.4em");
			}
			else
			{

				$(".pourcentage").html('D&eacute;j&agrave; votez !');
				$(".vote_text").html('REVENEZ DANS 24 HEURS !');
				/*$(".pourcentage").css("padding-top", "4px");*/
				$(".pourcentage").css("font-size", "1.4em");
			}
	}
      });
    }
</script>

<div class="hamber" style="width:100%; display:none;">
<div style="width:20%; margin:auto;text-align:center; margin-bottom:20px; margin-top:20px; background-color:#C7E4E7; ">
<img src="../img/icon_folio/services/icon/hamburger.svg" title="menu" alt="menu" style="color:#000000; width:35px;" />
<a style="font-family:roboto; color:#e1645e; font-size:2em;" href="#"><p style="display:inline-block; position:relative; top:5px;">MENU</p></a>
</div>
</div>
<div class="main-header">
    	<nav class="main-nav">
        	<ul>
            	<li class="folio bord <?php if($verif_video['ID_categorie'] == 2) echo 'redbord'; ?>"><a href="http://www.jophasworks.com/projets.php">Projets web</a></li>
                <li class="creation bord <?php if($verif_video['ID_categorie'] == 3) echo 'redbord'; ?>"><a href="http://www.jophasworks.com/creations.php">Creations</a></li>
                <li class="dev bord <?php if($verif_video['ID_categorie'] == 1) echo 'redbord'; ?>"><a href="http://www.jophasworks.com/dev.php">Dev.Codes</a></li>
                <li class="certif bord"><a href="http://www.jophasworks.com/certification.php">Certification</a></li>
                <li class="about bord"><a href="http://www.jophasworks.com/about.php">Competences</a></li>
				<li class="contact bord"><a href="http://www.jophasworks.com/contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
	<div class="categorie">
    <p><?php echo $verif_video['titre']; ?></p>
    <div class="getToAction" style="height:50px; text-align:center; margin-top:40px;">

			<a href="<?php echo $verif_cat_pre['lk_fichier']; ?>" title="<?php echo $verif_cat_pre['titre']; ?>" style="padding-left: 20px;padding-right: 20px;line-height: 48px;font-family:roboto;font-size: 1.5em;text-transform:uppercase;font-weight:500;color:#eff9fa;letter-spacing:1px;text-decoration:none;height: 100%;display: inline-block;background-color: #438289;border-radius:4px;border: 2px solid #eff9fa;width: 40%;margin-right: 30px;">
				<span>Pr&eacute;c&egrave;dant</span>
			</a>
            <a href="<?php echo $verif_cat_sui['lk_fichier']; ?>" title="<?php echo $verif_cat_sui['titre']; ?>" style="padding-left: 20px;padding-right: 20px;line-height: 48px;font-family:roboto;font-size: 1.5em;text-transform:uppercase;font-weight:500;color:#eff9fa;letter-spacing:1px;text-decoration:none;height: 100%;display: inline-block;background-color:#e1645e;border-radius:4px;border: 2px solid #eff9fa;width: 40%;">
				<span>Suivant</span>
			</a>


		</div>
    </div>
	
	
	<div style="clear:both; height:20px;"></div>
	
	<div class="content_article">


		<div class="content_topic">

			<div class="content_image">
				<div class="image_margin">
					<div class="image_ground">
					<img src="<?php echo $verif_video['lk_image']; ?>" title="<?php echo $verif_video['titre']; ?>" alt="<?php echo $verif_video['titre']; ?>" style="max-width: 100%; height: auto;" />
					</div>
					<div class="info_type">
						<div class="grafik_type"><p><?php echo $verif_video['fonction']; ?></p></div>
						<div class="logiciels">
							<ul>
							<?php
							$icon=explode(",",$verif_video['icon']);
							$compteur=count($icon);
							for($i=0;$i<$compteur;$i++)
							{
								echo '<li class="arg"><img src="../img/filter/'.$icon[$i].'.png" width="50" /></li>';
							}
							?>
							</ul>
						</div>
					</div>
					<div class="info_description">
						<div class="desk_type"><p>Description du projet</p></div>
					<p><?php echo $verif_video['description']; ?></p>
				</div>
					<div class="img_sup">
					<?php while($verif_image = $req_image->fetch()) { ?>
						<img src="<?php echo $verif_image['lk_image']; ?>" title="<?php echo $verif_video['titre']; ?>" alt="<?php echo $verif_video['titre']; ?>" style="max-width: 100%; height: auto;" />
					<?php } ?>
					</div>

					<div class="vote_sys">
						<div class="titre_satisfaction">
							<p>Satisfait de cette article ?</p>
						</div>
						<div class="vote_visite">
							<p><?php echo $verif_video['nb_vue']; ?> Visites</p>
						</div>
						<div class="pourcentage"><?php echo $rate; ?>%</div>
						<div class="vote_bar">
							<div class="vote_positif" style="width:<?php echo $perct; ?>%;" ></div>
						</div>
						<div class="vote_button">
							<div class="green_vote left"><a id="rate_pos" href="#" onclick="getvoting(<?php echo $verif_video['ID_element']; ?>,1); return false;" ><?php echo $verif_video['vt_pos']; ?></a></div>
							<div class="red_vote right"><a id="rate_neg" href="#" onclick="getvoting(<?php echo $verif_video['ID_element']; ?>,0); return false;" ><?php echo $verif_video['vt_neg']; ?></a></div>
						</div>
						<div class="vote_text">Votez !</div>
					</div>
					<div class="comments">
						<div class="titre_com"><p>Laissez un commentaire...</p></div>
						<div class="loader" style="text-align:center;"></div>
					<div class="post">
					<?php while($verif_com = $req_select->fetch()) { ?>
						<div class="content_post">
							<div class="userinfo">
								<div class="user"><a href="<?php echo $verif_com['lk_web']; ?>"><?php echo $verif_com['nom']; ?></a></div>
								<div class="date"><?php
			$annee=substr($verif_com['date'],0,4);
			$mois=substr($verif_com['date'],5,2);
			$jour=substr($verif_com['date'],8,2);
			$heurs=substr($verif_com['date'],11,8);
			switch($mois)
			{
			 case '01': $calendrier = "Janvier";
			 break;
			 case '02': $calendrier = "Fevrier";
			 break;
			 case '03': $calendrier = "Mars";
			 break;
			 case '04': $calendrier = "Avril";
			 break;
			 case '05': $calendrier = "Mai";
			 break;
			 case '06': $calendrier = "Juin";
			 break;
			 case '07': $calendrier = "Juillet";
			 break;
			 case '08': $calendrier = "Aout";
			 break;
			 case '09': $calendrier = "Septembre";
			 break;
			 case '10': $calendrier = "Octobre";
			 break;
			 case '11': $calendrier = "Novembre";
			 break;
			 case '12': $calendrier = "Decembre";
			 break;
			}
			echo $jour.'  '.$calendrier.'  '.$annee.'  '.$heurs;
			?></div></div>
							<div class="content">
								<div class="message"><p><?php echo $verif_com['txt_content']; ?></p></div>
							</div>
						</div>
					<?php } ?>
					</div>
						<div class="block_com">

				<form id="contact" method="post" action="http://localhost/jophas_word_boot_cdi/shared/process_com.php" onsubmit="return false;" enctype="multipart/form-data">
						<div class="form">

									<input class="" type="hidden"  name="element" value="<?php echo $verif_video['ID_element']; ?>" />

								<div>
									<label>Votre nom* :</label><span class="lgtext"></span>
									<input class="adtext"  name="pseudo" />
								</div>
								<div>
									<label>Votre adresse mail* :</label><span class="lgmail"></span>
									<input class="admail"  name="mail" />
								</div>
								<div>
									<label>Votre site web</label>
									<input class="adurl"  name="url" value="http://www." onfocus="if(this.value=='http://www.')this.value='http://www.'; else if(this.value=='')this.value='http://www.';" onblur="if(this.value=='') this.value='http://www.';"/>
								</div>
								<div>
								<label>Tapez votre message* :</label><span class="lgmes"></span>
								<textarea id="admes" name="message" class="message"  ></textarea>
								</div>

						</div>
					<div class="button_sub"><input class="sub_rn" type="submit" name="envoyer" value="Soumettre" onsubmit="process_com();" /></div>
			</form>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
		<div style="clear:both; height:20px; background-color:#96c6ca;"></div>
  <div style="text-align:center; padding:20px 0px; background-color:#96c6ca;">
		<a class="label1" title="GitHub" alt="GitHub" class="btn" href="https://github.com/JopFred"><img src="../img/github_inc.png"/></a>
		
		<a class="label1" title="LinkdIn" alt="LinkdIn" class="btn" href="https://www.linkedin.com/in/freddy-jopha-0ab100126"><img src="../img/linkdin_inc.png"/></a>
		<a class="label1" title="Behance" alt="Behance" class="btn" href="https://www.behance.net/jophalupib5b8"><img src="../img/behance_inc.svg" height="35"/></a>
	</div>
</div>
</body>
</html>
