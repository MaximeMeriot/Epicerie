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
//------------------------------------------------------------------------------------------------------------------------
    public function validCommande($panier, $idClient){

       $numCommande=$this->getNextNum();
       $date=date("y.m.d");


       //--------Entete commande-------------------------------------------------------------------
       $requete = $this->connexion->prepare("INSERT INTO entete_commande
       VALUES (:num_commande,:date_commande,:id_client)");
   
       $requete->bindParam(':num_commande',$numCommande);
       $requete->bindParam(':date_commande',$date);
       $requete->bindParam(':id_client',$idClient);
   
       $requete->execute();

        //--------Detail commande-------------------------------------------------------------------

        foreach($panier as $value){

            var_dump($panier);
            $etat_commande="Terminée";


            $requete = $this->connexion->prepare("INSERT INTO detail_commande
            VALUES (NULL,:etat_commande,:qte_produit_commande, :num_commande, :id_produit)");

        
            $requete->bindParam(':etat_commande',$etat_commande);
            $requete->bindParam(':qte_produit_commande',$value['qte']);
            $requete->bindParam(':num_commande',$numCommande);
            $requete->bindParam(':id_produit',$idClient);
        

            $requete->execute();

                 

        }
   




    }
//------------------------------------------------------------------------------------------------------------------------
    public function getNextNum(){    
       
       $requete = $this->connexion->prepare('SELECT MAX(num_commande) FROM entete_commande');
       $requete->execute();
       $num = $requete->fetch(PDO::FETCH_ASSOC);
       
       return ($num['MAX(num_commande)']+1);

    }
//------------------------------------------------------------------------------------------------------------------------
       
           





}


