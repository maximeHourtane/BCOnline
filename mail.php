<?php

  // FORM CHECK:

  // Recall form has been sent:
  if(isset($_POST['recall'])) {
    // Checking the inputs:
    if(!empty($_POST['name']) && !empty($_POST['phone'])) {
        $name = strip_tags(trim($_POST['name']));
        $phone = strip_tags(trim($_POST['phone'])); 
    }
    else {
        echo "At least one input is missing!";
        exit();
    }
  }
  // Contact form has been sent:
  elseif(isset($_POST['contact'])) {
    // Checking the inputs:
    if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
      $name = strip_tags(trim($_POST['name']));
      $phone = strip_tags(trim($_POST['phone']));
      $msg = strip_tags(trim($_POST['message']));
    }
    // Missing input:
    else {
        echo "At least one input is missing!";
        exit();
    }
  }
  // No form has been sent:
  else {
    echo "No form has been sent!";
    exit();
  }

  // SEND THE MAIL:

  // Adresse de destination :
  $mail_dest = 'zealotux@gmail.com';

  // Filtrage des serveurs de destination:
  if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail_dest)) $br = "\r\n";
  else $br = "\n";

  // Déclaration des messages au format texte et au format HTML :

  if(isset($_POST['recallRequest'])) {
    $sujet = "[{$_SERVER['SERVER_NAME']}] Demande de rappel téléphonique";
    $message_txt = "Une demande de contact téléphonique a été émise via le formulaire du site {$_SERVER['SERVER_NAME']}. Le numéro est le {$phone} au nom de {$name}";
    $message_html = "<html><head></head><body>Bonjour,<br><br> Une demande de contact téléphonique a été émise via le formulaire du site {$_SERVER['SERVER_NAME']}.<br><br><b>Nom :</b> {$name} <br><b>Numéro de téléphone :</b> {$phone}</body></html>";
  }
  else {
    $sujet = "[{$_SERVER['SERVER_NAME']}] Contact de {$name}";
    $message_txt = "Vous avez été contacté via le formulaire du site {$_SERVER['SERVER_NAME']}. Nom du contact : {$name}, numéro de téléphone fourni : {$phone}, contenu du message : {$msg}";
    $message_html = "<html><head></head><body>Bonjour,<br><br> Vous avez été contacté via le formulaire du site {$_SERVER['SERVER_NAME']}.<br><br><b>Nom :</b> {$name} <br><b>Numéro de téléphone :</b> {$phone} <br><br> <b>Contenu du message :</b><br><br> {$msg}</body></html>";
  }
  
  // Boundary :
  $boundary = "-----=".md5(rand());
  $boundary_alt = "-----=".md5(rand());
   
  // Header :
  $header = "From: \"{$_SERVER['SERVER_NAME']}\"<contact@{$_SERVER['SERVER_NAME']}>".$br;
  $header.= "Reply-to: \"{$_SERVER['SERVER_NAME']}\" <contact@{$_SERVER['SERVER_NAME']}>".$br;
  $header.= "MIME-Version: 1.0".$br;
  $header.= "Content-Type: multipart/mixed;".$br." boundary=\"$boundary\"".$br;

  // MESSAGE :
  $message = $br."--".$boundary.$br;
  $message.= "Content-Type: multipart/alternative;".$br." boundary=\"$boundary_alt\"".$br;
  $message.= $br."--".$boundary_alt.$br;

  // Version texte :
  $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$br;
  $message.= "Content-Transfer-Encoding: 8bit".$br;
  $message.= $br.$message_txt.$br;
   
  $message.= $br."--".$boundary_alt.$br;
   
  // Version HTML :
  $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$br;
  $message.= "Content-Transfer-Encoding: 8bit".$br;
  $message.= $br.$message_html.$br;

  // Boundary closure :
  $message.= $br."--".$boundary_alt."--".$br;
   
  $message.= $br."--".$boundary.$br;
   
  // Sending the mail:
  mail($mail_dest, $sujet, $message, $header);

?>