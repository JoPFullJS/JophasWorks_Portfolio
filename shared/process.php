
<?php

	if(isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["url"]) && isset($_POST["message"]))
	{
		$pseudo = stripslashes(strip_tags($_POST["pseudo"]));
		$mail = stripslashes(strip_tags($_POST["mail"]));
		$tel = stripslashes(strip_tags($_POST["tel"]));
		$url = stripslashes(strip_tags($_POST["url"]));
		$message = stripslashes(strip_tags($_POST["message"]));
		$pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM');
		    $id1 = substr(uniqid(rand(), true),-3);
			$id2 = substr(uniqid(rand(), true),-3);
			$id3 = substr(uniqid(rand(), true),-3);
			$id_contact = $id1.$id2.$id3;
		if(isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["url"]) && isset($_POST["message"])){
			$ajout_message="INSERT INTO contact SET ID_contact='".$id_contact."',pseudo='".$pseudo."',mail='".$mail."',tel='".$tel."',url='".$url."',message='".$message."'";
			$req_message =  $pdo->query( $ajout_message );
		}
		// PREPARATION DES DONNEES
		$ip           = $_SERVER["REMOTE_ADDR"];
		$hostname     = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		$destinataire = "jophalupi@gmail.com";
		$objet        = $pseudo." ,Vous a envoy&eacute; un message";
		$contenu      = "Nom de l'exp&eacute;diteur : " . $pseudo . "\r\n";
		$contenu     .= $message . "\r\n\n";
		$contenu     .= "Adresse IP de l'exp&eacute;diteur : " . $ip . "\r\n";
		$contenu     .= "DLSAM : " . $hostname;

		$headers  = "From: " . $mail . " \r\n"; // ici l'expediteur du mail
		$headers .= "Content-Type: text/plain; charset=\"ISO-8859-1\"; DelSp=\"Yes\"; format=flowed /r/n";
		$headers .= "Content-Disposition: inline \r\n";
		$headers .= "Content-Transfer-Encoding: 7bit \r\n";
		$headers .= "MIME-Version: 1.0";
		
		if ( (empty($pseudo)) && (empty($objet)) && (empty($mail)) && (!filter_var($mail, FILTER_VALIDATE_EMAIL)) && (empty($message)) ) {
			echo 'echec :( <br /><a href="contact.html">Retour au formulaire</a>';
		} else {
			// ENCAPSULATION DES DONNEES 
			//mail($destinataire, $objet, utf8_decode($contenu), $headers);
			mail($destinataire, $objet, $contenu, $headers);
			echo "Votre message &agrave; &eacute;t&eacute; envoyer avec succ&egrave;s.<br/>Un mail de confirmation &agrave; &eacute;t&eacute; envoy&eacute; a l'adresse mail mentionner.";
		}
		
		
	}
	else
	{
		echo "<a href='../contact.php'>Retour au formulaire</a>";
	}


?>