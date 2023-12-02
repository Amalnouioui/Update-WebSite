<?php
$nom = $_POST["nom"];
$Prenom = $_POST["Prenom"];
$naissance = $_POST["naissance"];
$Federation = $_POST["Federation"];
$Id = $_POST["Id"];
$titre = $_POST["titre"];
$elo = $_POST["elo"];
$email = $_POST["email"];
$vol = $_POST["vol"];
$arrive = $_POST["arrive"];
$Compagnie = $_POST["Compagnie"];

$de_nom = "ITS"; 
			$de_mail = "its.commercial@topnet.tn"; 		
			$vers_nom = 'TICA';
			$vers_mail = 'houssem.badr@gmail.com'; 
			$subject = 'Contact (www.tica.tn)'; 
			
			$message = "Nom:" .$nom ."<br>";
			$message .= "Prenom:" .$Prenom ."<br>";
			$message .= "Date de naissance:" .$naissance ."<br>";
			$message .= "La Federation:" .$Federation ."<br>";v
			$message .= "Le Id:" .$Id ."<br>";
			$message .= "Le titre:" .$titre ."<br>";
			$message .= "elo:" .$elo ."<br>";
			$message .= "Le email:" .$email ."<br>";
			$message .= "Le vol:" .$vol ."<br>";
			$message .= "L'arriver:" .$arrive ."<br>";
			$message .= "La Compagnie:" .$Compagnie ."<br>";
			
			$head = "From: $de_nom <$de_mail>\n";
			$head .= "MIME-Version: 1.0\n";
			$head .= "Return-Path: <$de_mail>\n";
			$head .= "Content-Type: text/html; charset=utf-8\n";
			$head .= "X-Sender: <www.tica.tn>\n";
			$head .= "X-Mailer: PHP\n";
			$head .= "X-auth-smtp-user: $de_mail\n";
			$head .= "X-abuse-contact: $de_mail";
			
			mail($vers_mail, $subject, $message, $head);
			
			/*echo $message;*/
			
                                ?>
                                <script type="text/javascript">
                                    window.location = "index.html";
                                    alert('Votre demande de devis est recue avec succes.\nNos agents vous contacteront.');
                                </script> 



?>