<?php 
if(isset($_POST['envoyer']))
	{
		if(isset($_FILES['list']) && $_FILES['list']['error'] == 0)
		{
			if(isset($_POST['categorie']) && $_POST['categorie'] == 1 || isset($_POST['categorie']) && $_POST['categorie'] == 2 )
			{
				$count_titre = strlen($_POST['titre']);
				$count_description = strlen($_POST['description']);
				if($count_titre <= 70 && $count_description <= 200)
				{
					$titre = $_POST['titre'];
					$techno = $_POST['techno'];
					$description = $_POST['description'];
					$categorie = $_POST['categorie'];
					$fonction = $_POST['fonction'];
					$dossier_web = $_POST['dossier'];
					
					$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM'); 
					
				    $titre = htmlspecialchars($_POST['titre']);
				    $requete1 = "SELECT COUNT(DISTINCT titre) AS titre FROM  descriptions  WHERE  titre LIKE '%".$titre."%'";
				    $sql =  $pdo->query($requete1);
				    $titre_video = $sql->fetch();
					
					if($titre_video['titre'] == 0)
				    {
						$id1 = substr(uniqid(rand(), true),-3);
						$id2 = substr(uniqid(rand(), true),-3);
						$id3 = substr(uniqid(rand(), true),-3);
						$id_video = $id1.$id2.$id3;
						
						$normalizeChars = array(
									'�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'AE', '�'=>'C',
									'�'=>'E', '�'=>'E', '�'=>'E', '�'=>'E', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'Eth',
									'�'=>'N', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O',
									'�'=>'U', '�'=>'U', '�'=>'U', '�'=>'U', '�'=>'Y',
						   
									'�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'ae', '�'=>'c',
									'�'=>'e', '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'eth',
									'�'=>'n', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o',
									'�'=>'u', '�'=>'u', '�'=>'u', '�'=>'u', '�'=>'y',
								   
									'�'=>'sz', '�'=>'thorn', '�'=>'y'
								); 
						
					   $fichier = strtr($_POST['titre'],$normalizeChars);
					   $nom_fichier = strtolower(preg_replace('/([^.a-z0-9]+)/i', '-', $fichier));
					   $nom = rtrim($nom_fichier, '-');
					   
					   $fichier_dossier = strtr($_POST['dossier'],$normalizeChars);
					   $nom_fichier_dossier = strtolower(preg_replace('/([^.a-z0-9]+)/i', '-', $fichier_dossier));
					   $dossier_app = rtrim($nom_fichier_dossier, '-');
					   
					   $extension = ".php";
					   $extension_txt = ".txt";
					   //--------------------------//
						   $racine = $_SERVER['DOCUMENT_ROOT']."/";
						   $jopha_w = "http://jophasworks.com/";
					   //----------------------------//
					   $default = "default/default_projet_dev.php";
					   $default_demo = "default/default_demo.txt";
					   $default_redir = "default/default_redir.php";
					   $default_accueil = "default/default_accueil.php";
					   //-------------------------------//
					   $dossier_demo ="demos/";
					   $dossier_redir ="redir/";
					   $dossier_app = "app/";
					   //--------------------------------//
					   mkdir($racine.$dossier_app.$dossier_web.'/');
					   //--------------------------------//
					   if($_POST['categorie'] == 1)
					   {
						   $dossier_image = "dev/img/";
						   $dossier = "dev/";
						   
						   $fichier_default = $racine.$default;
						   $fichier_dest = $racine.$dossier.$nom.'-'.$id_video.$extension;
						   $lk_fichier = $jopha_w.$dossier.$nom.'-'.$id_video.$extension;
						   //---------------------------------------------------------//
						   $fichier_default_site = $racine.$default_redir;
						   $fichier_dest_demo_site = $racine.$dossier_redir.$nom.'-'.$id_video.$extension;
						   $lk_fichier_demo_site = $jopha_w.$dossier_redir.$nom.'-'.$id_video.$extension;
						   
						   $fichier_app = $racine.$default_accueil;
						   $fichier_dest_app = $racine.$dossier_app.$dossier_web.'/'.'accueil'.$extension;
						   $lk_fichier_dest_app = $jopha_w.$dossier_app.$dossier_web.'/'.'accueil'.$extension;
						   
					   }
					   else if($_POST['categorie'] == 2)
					   {
						   $dossier_image = "projets/img/";
						   $dossier = "projets/";
						   
						   $fichier_default = $racine.$default;
						   $fichier_dest = $racine.$dossier.$nom.'-'.$id_video.$extension;
						   $lk_fichier = $jopha_w.$dossier.$nom.'-'.$id_video.$extension;
						   //-----------------------------------------------------------------//
						   $fichier_default_site = $racine.$default_redir;
						   $fichier_dest_demo_site = $racine.$dossier_redir.$nom.'-'.$id_video.$extension;
						   $lk_fichier_demo_site = $jopha_w.$dossier_redir.$nom.'-'.$id_video.$extension;
						   
						   $fichier_app = $racine.$default_accueil;
						   $fichier_dest_app = $racine.$dossier_app.$dossier_web.'/'.'accueil'.$extension;
						   $lk_fichier_dest_app = $jopha_w.$dossier_app.$dossier_web.'/'.'accueil'.$extension;
						   
						   
					   }
					   
					   $fichier_default_txt = $racine.$default_demo;
					   $fichier_dest_demo = $racine.$dossier_demo.$nom.'-'.$id_video.$extension_txt;
					   $lk_fichier_demo = $jopha_w.$dossier_demo.$nom.'-'.$id_video.$extension_txt;
					   
					   //--------------- Initialisation et extension image ---------------//
					   $image = basename($_FILES['list']['name']);
					   $taille_maxi = 20000000;
					   $taille = filesize($_FILES['list']['tmp_name']);
					   $extensions_valides = array('jpg' , 'jpeg' , 'gif' , 'png');
							//1. strrchr renvoie l'extension avec le point (� . �).
							//2. substr(chaine,1) ignore le premier caract�re de chaine.
							//3. strtolower met l'extension en minuscules.
						$extension_image = strtolower(  substr(  strrchr($image, '.')  ,1)  );
						
						$fichier_image_liste = $racine.$dossier_image.$nom.'-'.$id_video.'-list.'.$extension_image;
						$lk_image_list = $jopha_w.$dossier_image.$nom.'-'.$id_video.'-list.'.$extension_image;
						
						$fichier_image_illus = $racine.$dossier_image.$nom.'-'.$id_video.'-illus.'.$extension_image;
						$lk_image_illus = $jopha_w.$dossier_image.$nom.'-'.$id_video.'-illus.'.$extension_image;
						
						if (in_array($extension_image,$extensions_valides) ) 
						{
							$dommage = "Extension correcte";
						}
						if($taille>$taille_maxi)
						{
							$erreur = 'Le fichier est trop gros...';
						}
						if(isset($dommage) && !isset($erreur) ) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
						{
							 move_uploaded_file($_FILES['list']['tmp_name'], $fichier_image_liste);
							 move_uploaded_file($_FILES['illus']['tmp_name'], $fichier_image_illus);
						}
						if(function_exists('move_uploaded_file'))
						{ 
							$description = 'INSERT INTO descriptions SET ID_element="'.$id_video.'",ID_categorie="'.$categorie.'",titre="'.$titre.'",fonction="'.$fonction.'",description="'.$description.'",icon="'.$techno.'"';
							$verif_descrption = $pdo->query($description);
							
							$lien = "INSERT INTO lien SET ID_lien='".$id_video."',lk_fichier='".$lk_fichier."',lk_demo='".$lk_fichier_app."',lk_code='".$lk_fichier_demo."',lk_image='".$lk_image_illus."',lk_list='".$lk_image_list."'";
							$verif_lien = $pdo->query($lien);
							
							$compteur = "INSERT INTO compteur SET ID_compteur='".$id_video."'";
							$verif_compteur = $pdo->query($compteur);
							
							$stat = "INSERT INTO statistiques SET id_stat='".$id_video."'";
							$verif_stat = $pdo->query($stat);
							
							$societe = "INSERT INTO societe SET ID_societe='".$id_video."'";
							$verif_societe = $pdo->query($societe);
							
							$app = "INSERT INTO app SET ID_app='".$id_video."',lk_dossier='".$lk_fichier_dest_app."'";
							$verif_app = $pdo->query($app);
							
							if(isset($verif_descrption))
								{
									copy($fichier_default,$fichier_dest);
									copy($fichier_default_txt,$fichier_dest_demo);
									copy($fichier_default_site,$fichier_dest_demo_site);
									copy($fichier_app,$fichier_dest_app);
									
									
									$reusit = "copie du fichier effectue avec success !";
									
								}
						}
						
						
				    }
				}
			}
			else if(isset($_POST['categorie']) && $_POST['categorie'] == 3)
			{
				$count_titre = strlen($_POST['titre']);
				$count_description = strlen($_POST['description']);
				if($count_titre <= 70 && $count_description <= 200)
				{
					$titre = $_POST['titre'];
					$techno = $_POST['techno'];
					$description = $_POST['description'];
					$categorie = $_POST['categorie'];
					$fonction = $_POST['fonction'];
					
					
					$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM'); 
					
				    $titre = htmlspecialchars($_POST['titre']);
				    $requete1 = "SELECT COUNT(DISTINCT titre) AS titre FROM  descriptions  WHERE  titre LIKE '%".$titre."%'";
				    $sql =  $pdo->query($requete1);
				    $titre_video = $sql->fetch();
					
					if($titre_video['titre'] == 0)
				    {
						$id1 = substr(uniqid(rand(), true),-3);
						$id2 = substr(uniqid(rand(), true),-3);
						$id3 = substr(uniqid(rand(), true),-3);
						$id_video = $id1.$id2.$id3;
						
						$normalizeChars = array(
									'�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'AE', '�'=>'C',
									'�'=>'E', '�'=>'E', '�'=>'E', '�'=>'E', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'Eth',
									'�'=>'N', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O',
									'�'=>'U', '�'=>'U', '�'=>'U', '�'=>'U', '�'=>'Y',
						   
									'�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'ae', '�'=>'c',
									'�'=>'e', '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'eth',
									'�'=>'n', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o',
									'�'=>'u', '�'=>'u', '�'=>'u', '�'=>'u', '�'=>'y',
								   
									'�'=>'sz', '�'=>'thorn', '�'=>'y'
								); 
						
					   $fichier = strtr($_POST['titre'],$normalizeChars);
					   $nom_fichier = strtolower(preg_replace('/([^.a-z0-9]+)/i', '-', $fichier));
					   $nom = rtrim($nom_fichier, '-');
					   
					   $extension = ".php";
					   //--------------------------//
						   $racine = $_SERVER['DOCUMENT_ROOT']."/";
						   $jopha_w = "http://jophasworks.com/";
					   //----------------------------//
					   $default = "default/default_creation.php";
					  
					   $dossier_image = "creations/img/";
					   $dossier = "creations/";
					   
					   $fichier_default = $racine.$default;
					   $fichier_dest = $racine.$dossier.$nom.'-'.$id_video.$extension;
					   $lk_fichier = $jopha_w.$dossier.$nom.'-'.$id_video.$extension;
					   //---------------------------------------------------------//
					  
					   
					   //$fichier_default_txt = $racine.$default_demo;
					   //$fichier_dest_demo = $racine.$dossier_demo.$nom.'-'.$id_video.$extension_txt;
					   //$lk_fichier_demo = $jopha_w.$dossier_demo.$nom.'-'.$id_video.$extension;
					   
					   //--------------- Initialisation et extension image ---------------//
					   $image = basename($_FILES['list']['name']);
					   $taille_maxi = 20000000;
					   $taille = filesize($_FILES['list']['tmp_name']);
					   $extensions_valides = array('jpg' , 'jpeg' , 'gif' , 'png');
							//1. strrchr renvoie l'extension avec le point (� . �).
							//2. substr(chaine,1) ignore le premier caract�re de chaine.
							//3. strtolower met l'extension en minuscules.
						$extension_image = strtolower(  substr(  strrchr($image, '.')  ,1)  );
						
						$fichier_image_liste = $racine.$dossier_image.$nom.'-'.$id_video.'-list.'.$extension_image;
						$lk_image_list = $jopha_w.$dossier_image.$nom.'-'.$id_video.'-list.'.$extension_image;
						
						$fichier_image_illus = $racine.$dossier_image.$nom.'-'.$id_video.'-illus.'.$extension_image;
						$lk_image_illus = $jopha_w.$dossier_image.$nom.'-'.$id_video.'-illus.'.$extension_image;
						
						if (in_array($extension_image,$extensions_valides) ) 
						{
							$dommage = "Extension correcte";
						}
						if($taille>$taille_maxi)
						{
							$erreur = 'Le fichier est trop gros...';
						}
						if(isset($dommage) && !isset($erreur) ) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
						{
							 move_uploaded_file($_FILES['list']['tmp_name'], $fichier_image_liste);
							 move_uploaded_file($_FILES['illus']['tmp_name'], $fichier_image_illus);
						}
						if(function_exists('move_uploaded_file'))
						{ 
							$description = "INSERT INTO descriptions SET ID_element='".$id_video."',ID_categorie='".$categorie."',titre='".$titre."',fonction='".$fonction."',description='".$description."',icon='".$techno."'";
							$verif_descrption = $pdo->query($description);
							
							$lien = "INSERT INTO lien SET ID_lien='".$id_video."',lk_fichier='".$lk_fichier."',lk_image='".$lk_image_illus."',lk_list='".$lk_image_list."'";
							$verif_lien = $pdo->query($lien);
							
							$compteur = "INSERT INTO compteur SET ID_compteur='".$id_video."'";
							$verif_compteur = $pdo->query($compteur);
							
							$stat = "INSERT INTO statistiques SET id_stat='".$id_video."'";
							$verif_stat = $pdo->query($stat);
							
							$societe = "INSERT INTO societe SET ID_societe='".$id_video."'";
							$verif_societe = $pdo->query($societe);
							
							if(isset($verif_descrption))
								{
									copy($fichier_default,$fichier_dest);
									$reusit = "copie du fichier effectue avec success !";
									
								}
						}
						
						
				    }
				}
			}
		}
	}
		

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
	<script type="text/javascript" src="../shared/validation.js"></script>
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
	<div class="categorie"><p>Me contacter pour plus d'information.</p></div>
	<div class="titre_techno" id="ajax"><p><span class="glyphicon glyphicon-chevron-right"></span>Laisser votre message.</p></div>
	
		<div class="content_contact">
		
		<div class="head_formulaire">
			<form id="contact" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data">
			<div class="champ">
				<div class="form_left">
					<div>
						<label>Titre :</label><span class="lgmes"></span>
						<input class="titre"  name="titre" />
					</div>
					<div>
						<label>Technologie utilise :</label>
						<input class=""  name="techno" placeholder="5 Technologies max."/>
					</div>
					<div>
						<label>Type creation</label>
						<input class=""  name="fonction" placeholder="Ex: Identite / logotype" />
					</div>
					<div>
						<label>Description :</label><span class="lgmes_1"></span>
						<input class="desk"  name="description" />
					</div>
					<div>
						<label>Categorie :</label>
						<input class=""  name="categorie" placeholder="1 : Aplication || 2 : Projets || 3 : Creations"/>
					</div>
					<div>
						<label>Nom dossier redirection : (Projet et appli.)</label><span class="lgmes_1"></span>
						<input class="desk"  name="dossier" />
					</div>
					<div>
						<label>Image list :</label><span>	Image en .png</span>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
						<input  class="" type="file" name="list"  />
					</div>
					<div>
						<label>Image illustration :</label><span>	Image en .png</span>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
						<input  class="" type="file" name="illus"  />
					</div>
				</div>
				
			</div>
				<div class="button_sub"><input class="sub_rn" type="submit" name="envoyer" value="Soumettre"  /></div>
			</form>
		</div>
	</div>
	

</body>
</html>