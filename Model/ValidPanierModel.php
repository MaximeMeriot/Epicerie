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
       
// Gestion du stock           
public function checkCart() {
        foreach($_SESSION['cart'] as $element){
            $requete = $this->connexion->prepare("SELECT qte_stock FROM produit WHERE id_produit = :id_produit");
        
            $requete->bindParam(':id_produit', $element);
            // $resultat = $this->connexion->query($requete);
            $requete->execute();
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
 
            if ($resultat['qte_stock']<1) {
                return false;
            }

//             echo '<pre>';
//             var_dump($resultat);

        }
        foreach($_SESSION['cart'] as $element){
            $this ->updateStock($element, 1);
        }
        return true;
    }

   
     public function updateStock($id_produit, $qty)
     {
         $requete = $this->connexion->prepare("UPDATE produit SET qte_stock = qte_stock-:qty WHERE id_produit = :id_produit");
        
         $requete->bindParam(':id_produit', $id_produit);
         $requete->bindParam(':qty', $qty);

         $resultat = $requete->execute();

         return $resultat;
     } 
//------------------------------------------------------------------------------------------------------------------------
public function jsonFile(){

    $jsonTab["date"]=date("Y-m-d H:i:s");
    $jsonTab["numero_de_commande"]="EOL-5000";
    $jsonTab["items"]=[
            "Tomates"=>"3",
            "Cornichons"=>"3546",
            "Pâté"=>"1"
    ];

    $jsonFile=json_encode($jsonTab);

    file_put_contents("json/jsonTest.json",$jsonFile);

}
//------------------------------------------------------------------------------------------------------------------------




}


