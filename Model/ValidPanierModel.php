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
        $message = "Bonjour, votre commande est enregistrée";

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
    public function validCommande($panier, $idClient)
    {
        $numCommande = $this->getNextNum();
        $date = date("y.m.d");
        //--------Entete commande-------------------------------------------------------------------
        $requete = $this->connexion->prepare("INSERT INTO entete_commande
       VALUES (:num_commande,:date_commande,:id_client)");

        $requete->bindParam(':num_commande', $numCommande);
        $requete->bindParam(':date_commande', $date);
        $requete->bindParam(':id_client', $idClient);

        $requete->execute(); 

        //------Detail commande------------------------------------------------------------------------
            foreach($panier as $value){
            $etat_commande="Terminée";
            $quantite = $_SESSION['produit'.$value['id_produit']];


            $requete = $this->connexion->prepare("INSERT INTO detail_commande
            VALUES (NULL,:etat_commande,:qte_prdt_commande, :num_commande, :id_produit)");

        
            $requete->bindParam(':etat_commande',$etat_commande);
            $requete->bindParam(':qte_prdt_commande',$quantite);
            $requete->bindParam(':num_commande',$numCommande);
            $requete->bindParam(':id_produit',$value['id_produit']);
        

            $requete->execute();                 

        }
    }
//------------------------------------------------------------------------------------------------------------------------
    public function getNextNum(){    
       
       $requete = $this->connexion->prepare('SELECT MAX(num_commande) FROM entete_commande');
       $requete->execute();
       $num = $requete->fetch(PDO::FETCH_ASSOC);

       $_SESSION['num_commande']=$num['MAX(num_commande)']+1;
       
       return ($num['MAX(num_commande)']+1);

    }
//------------------------------------------------------------------------------------------------------------------------
       
// Gestion du stock           
    public function checkCart()
    {
        $retour = true;

        foreach ($_SESSION as $key => $value) {

            if (strpos($key, 'produit') !== false) {
                // echo '<pre>';
                // var_dump($key);
                // var_dump($value);

                $id = substr($key, 7);
                if ($this->verifQte($id, $value)) {
                    $this->updateStock($id, $value);
                } else{
                    $retour=false;
                }
            }
        }
        return $retour;
    }

    public function verifQte($id_produit, $quantite)
    {

            $requete = $this->connexion->prepare("SELECT qte_stock FROM produit WHERE id_produit = :id_produit");

            $requete->bindParam(':id_produit', $id_produit);
            $requete->execute();
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);

// var_dump($resultat);

            if ($resultat['qte_stock'] < $quantite) {
                return false;
            } else{
                return true;
            }
    }
//------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------
public function getPanier()
{
    $panier = array();

    foreach ($_SESSION as $key => $value) {
        // var_dump(strpos($key, 'produit'));

        if (strpos($key, 'produit') !== false) {

            $id = substr($key, 7);
            $panier[] = $this->getProduit($id);
        }
    }
    
    return $panier;
}
//------------------------------------------------------------------------------------------------------------------------
function getProduit($id_produit)
{
    $requete = $this->connexion->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
    $requete->bindParam(':id_produit', $id_produit);

    $result = $requete->execute();

    if ($result) {
        $produit = $requete->fetch(PDO::FETCH_ASSOC);
    }
    // echo'<pre>';
    // var_dump($produit);
    return $produit;
}


    public function updateStock($id_produit, $qty)
    {
        $requete = $this->connexion->prepare("UPDATE produit SET qte_stock = qte_stock-:qty WHERE id_produit = :id_produit");

        $requete->bindParam(':id_produit', $id_produit);
        $requete->bindParam(':qty', $qty);
        $resultat = $requete->execute();
        return $resultat;
    }
//--------------------------------------------------------------------------------------------------------------------------------------
    public function jsonFile($panier)
    {
    

        foreach($panier as $value){
            $nom_produit=$value['nom_produit'];
            $quantite = $_SESSION['produit'.$value['id_produit']];
            $itemTab[$nom_produit]=$quantite;

        }

        $jsonTab["date"] = date("Y-m-d H:i:s");
        $jsonTab["numero_de_commande"] =  $_SESSION['num_commande'];
        $jsonTab["items"] = $itemTab;

        $jsonFile = json_encode($jsonTab);
        file_put_contents("json/".$_SESSION['num_commande'].".json", $jsonFile);
    }

//--------------------------------------------------------------------------------------------------------------------------------------

}
