<?php 
if(isset($_POST['envoyer']))
	{
		if(isset($_FILES['illus']) && $_FILES['illus']['error'] == 0)
		{
			if(isset($_POST['idimg']))
			{
			
					$identifiant = $_POST['idimg'];
					
					
					$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM'); 
					
					
					
						$id1 = substr(uniqid(rand(), true),-3);
						$id2 = substr(uniqid(rand(), true),-3);
						$id3 = substr(uniqid(rand(), true),-3);
						$id_video = $id1.$id2.$id3;
						
						
					  $dossier_image = "creations/img/";
					   //--------------------------//
						   $racine = $_SERVER['DOCUMENT_ROOT']."/";
						   $jopha_w = "http://jophasworks.com/";
					   //----------------------------//
					   
					   
					   
					   
					   
					   //--------------- Initialisation et extension image ---------------//
					   $image = basename($_FILES['illus']['name']);
					   $taille_maxi = 20000000;
					   $taille = filesize($_FILES['illus']['tmp_name']);
					   $extensions_valides = array('jpg' , 'jpeg' , 'gif' , 'png');
							//1. strrchr renvoie l'extension avec le point (� . �).
							//2. substr(chaine,1) ignore le premier caract�re de chaine.
							//3. strtolower met l'extension en minuscules.
						$extension_image = strtolower(  substr(  strrchr($image, '.')  ,1)  );
						
						
						$fichier_image_illus = $racine.$dossier_image.$id_video.'-illus.'.$extension_image;
						$lk_image_illus = $jopha_w.$dossier_image.$id_video.'-illus.'.$extension_image;
						
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
							 move_uploaded_file($_FILES['illus']['tmp_name'], $fichier_image_illus);
						}
						if(function_exists('move_uploaded_file'))
						{ 
							$description = "INSERT INTO creation SET ID_creation='".$identifiant."',lk_image='".$lk_image_illus."'";
							$verif_descrption = $pdo->query($description);
							
							$reusit = "copie du fichier effectue avec success !";
							
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
	<div class="categorie"><p>Me contacter pour plus d'information.</p></div>
	<div class="titre_techno" id="ajax"><p><span class="glyphicon glyphicon-chevron-right"></span>Laisser votre message.</p></div>
	
		<div class="content_contact">
		
		<div class="head_formulaire">
			<form id="contact" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<div class="champ">
				<div class="form_left">
					<div>
						<label>Entrez l'identifiant :</label><span class="lgmes"></span>
						<input class="titre"  name="idimg" />
					</div>
					<div>
						<label>Image illustration :</label><span>	Image en .png</span>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
						<input  class="" type="file" name="illus"  />
					</div>
				</div>
				
			</div>
				<div class="button_sub"><input class="sub_rn" type="submit" name="envoyer" value="Soumettre" /></div>
			</form>
		</div>
	</div>
	

</body>
</html>