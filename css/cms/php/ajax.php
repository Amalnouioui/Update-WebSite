<?php
 
if (isset($_POST['btEnvoi'])) {
    $email = $_POST['mail'];
    $sujet = $_POST['obj'];
    $message = $_POST['msg'];
 
    if (!empty($email) && !empty($sujet) && !empty($message)) {
        htmlentities($email);
        strip_tags($email);
        htmlentities($sujet);
        strip_tags($sujet);
        htmlentities($message);
        strip_tags($message);
     
        $headers = "MIME-Version: 1.0 \n";
        $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
        $headers .= "From: $email \n";
        $headers .= "Disposition-Notification-To: $email \n";
        $headers .= "X-Priority: 1 \n";
        $headers .= "X-MSMail-Priority: High \n";
     
        mail('mejri4wajdi@gmail.com', $sujet, $message, $headers); 
    }
}
 
?>