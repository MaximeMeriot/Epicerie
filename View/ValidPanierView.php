<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'View/PHPMailer-master/src/PHPMailer.php';
require 'View/PHPMailer-master/src/SMTP.php';
require 'View/PHPMailer-master/src/Exception.php';

class ValidPanierView extends MotherView
{
    public function displayValid()
    {
        // $this->page .= '<h3 class="text-center">Votre commande est validée, un email vous a été envoyé</h3>';
        
        $this->page .= '
        <div class="card col-md-12 col-sm-6 text-center my-5  bg-light">
            <div class="card-body">
                <h3 class="card-title text-center">Votre commande est validée, <br /> un email vous a été envoyé</h3>
            </div>
        </div><br />';

        $this->display();
    }

    public function sendMail()
    {
        $mail = new PHPMailer();

        $prenom = $_SESSION['prenom'];
        $nom = $_SESSION['nom'];
        $societe = $_SESSION['societe'];
        $email = $_SESSION['email'];

        // echo '<pre>';
        // var_dump($_SESSION);
        // var_dump($prenom);
        // var_dump($nom);
        // var_dump($societe);
        // var_dump($email);

        try {
            $mail->setFrom("marjo@lacan.me");
            // $mail->FromName = $nom . " " . $prenom;
            $mail->Subject = 'Validation de votre commande';
            $mail->MsgHTML("Bonjour ". " " . $prenom . " " .  $nom ." de l'entreprise ".  $societe .", votre commande est enregistrée");
            $mail->CharSet = 'UTF-8';
           

            $mail->AddAddress($email, "marjo@lacan.net");
        
            //------------ Configuration du serveur d'e-mail de test OVH
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'ssl0.ovh.net'; // Specify main and backup SMTP servers
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'test@lacan.me'; // SMTP username
            $mail->Password = 'stvcqjvd72'; // SMTP password
            //------------ Fin
        
            // 4. envoi du mail
        
            $res = $mail->Send();
            // echo "Résultat de l'envoi : ";
            // var_dump($res);
            // echo "<br>";
        } catch (Exception $e) {
            echo 'Message non envoyé';
            echo 'Erreur: ' . $mail->ErrorInfo;
        }
    }
}