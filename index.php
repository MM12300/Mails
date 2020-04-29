<?php
//On importe les fichiers de PHP mailer 
require_once("PHPMailer/Exception.php");
require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/SMTP.php");

// ------------------ Configuration PHP mailer 

//PHP mailer est en PHP orienté Objet
//On appelle les classes Exception et PHPMailer
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//On instancie PHPmailer
$email = new PHPmailer();

//On configure PHPMailer
//On utilise SMTP
$email->isSMTP();

//On définit le server SMTP
$email->Host = 'localhost';

//On définit le port du serveur
$email->Port = 1025;
// ------------------ Fin de la configuration



// On essaie d'envoyer un mail
try{
    //On définit l'expéditeur
    $email->setFrom('contact@demo.fr', 'Benoit');

    //On définit le destinataire 
    $email->addAddress('autre@demo.fr', 'Bruno');

    //On définit le sujet du mail
    $email->Subject = 'Ceci est un titre';

    //On définit que le mail sera envoyé en HTML
    $email->isHTML();

    //On définit le corps du message
    $email->Body = '<h1> Titre du message </h1>
                    <p> Ceci est le contenu du message qui sera envoyé</p>
                    <a href ="">Lien</a>';

    //On peut définir un contenu texte
    $email->AltBody = 'Ceci est le texte en format brut';

    //On envoit le mail
    $email->send();
    
} catch(Exception $e){
    echo $e->getMessage();
}
