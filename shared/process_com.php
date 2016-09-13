
<?php

	if(isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST["element"]) && isset($_POST["url"]) && isset($_POST["message"]))
	{
		$pseudo = stripslashes(strip_tags($_POST["pseudo"]));
		$mail = stripslashes(strip_tags($_POST["mail"]));
		$element = $_POST["element"];
		$url = stripslashes(strip_tags($_POST["url"]));
		$message = stripslashes(strip_tags($_POST["message"]));
		
		$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM');
		
		    
		
			$ajout_message='INSERT INTO comments SET ID_page="'.$element.'",nom="'.$pseudo.'",mail="'.$mail.'",lk_web="'.$url.'",txt_content="'.$message.'"';
			$req_message = $pdo->query( $ajout_message );
		
			$select_message = "SELECT ID_page,nom,mail,lk_web,txt_content,date FROM comments WHERE ID_page='".$element."' ORDER BY date DESC LIMIT 1";
			$req_select = $pdo->query($select_message);
			$verif_video = $req_select->fetch();
			
			
			$annee=substr($verif_video['date'],0,4);
			$mois=substr($verif_video['date'],5,2);
			$jour=substr($verif_video['date'],8,2);
			$heurs=substr($verif_video['date'],11,8);
			switch($mois)
			{
			 case 01: $calendrier = "Janvier";
			 break;
			 case 02: $calendrier = "Fevrier";
			 break;
			 case 03: $calendrier = "Mars";
			 break;
			 case 04: $calendrier = "Avril";
			 break;
			 case 05: $calendrier = "Mai";
			 break;
			 case 06: $calendrier = "Juin";
			 break;
			 case 07: $calendrier = "Juillet";
			 break;
			 case 08: $calendrier = "Aout";
			 break;
			 case 09: $calendrier = "Septembre";
			 break;
			 case 10: $calendrier = "Octobre";
			 break;
			 case 11: $calendrier = "Novembre";
			 break;
			 case 12: $calendrier = "Decembre";
			 break;
			}
			
			
			
			echo '<div class="content_post">
							<div class="userinfo">
								<div class="user"><a href="'.$url.'">'.$pseudo.'</a></div>
								<div class="date">'.$jour.'  '.$calendrier.'  '.$annee.'  '.$heurs.'</div></div>
							<div class="content">
								<div class="message"><p>'.$message.'</p></div>
							</div>
						</div>';
	}
	else
	{
		echo "<a href='../contact.php'>Retour au formulaire</a>";
	}


?>