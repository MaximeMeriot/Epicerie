<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';

class ValidPanierModel extends MotherModel
{
    public function sendMail()
    {
        $mail = new PHPMailer();

        $prenom = $_SESSION['prenom'];
        $nom = $_SESSION['nom'];
        $societe = $_SESSION['societe'];
        $email = $_SESSION['email'];

        $message = "Bonjour ". " " . $prenom . " " .  $nom ." de l'entreprise ".  $societe .", votre commande est enregistrée";


        try {
            $mail->From = "marjo@lacan.me";
            $mail->FromName = "EOL";
            $mail->MsgHTML($message);
            $mail->isHTML(true);
            $mail->Subject = "Validation de votre commande";
            $mail->Body = $message;
            $mail->AddAddress($email, $nom, $prenom);
            $res = $mail->Send();

            // echo "Résultat de l'envoi : ";
            // var_dump($res);
            // var_dump($email);

        } catch (Exception $e) {
            echo 'Message non envoyé';
            echo 'Erreur: ' . $mail->ErrorInfo;
        }
    }
}


