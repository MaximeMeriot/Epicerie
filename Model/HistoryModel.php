<?php


class HistoryModel extends MotherModel{


//-----------------------------------------------------------------------------------------------------------------------------------   
  public function getList(){

    $requete = $this->connexion->prepare("SELECT *
    FROM entete_commande WHERE id_client= :id_client
    INNER JOIN client ON entete_commande.id_client=client.id_client");
    $requete->bindParam(":id_client", $SESSION['id']);
    $resultat = $requete->execute();
    $entetes = $requete->fetchAll(PDO::FETCH_ASSOC);
    
    $requete = "SELECT *
    FROM detail_commande
    INNER JOIN produit ON detail_commande.id_produit=produit.id_produit";
    $resultat = $this->connexion->query($requete);
    $items = $resultat->fetchAll(PDO::FETCH_ASSOC);


    return $this->buildTabCommandes($entetes,$items);

}
//-----------------------------------------------------------------------------------------------------------------------------------   
public function buildTabCommandes($entetes,$items){

    /* Construction du tableau de commandes suivant le modèle:
        $tabCommandes[n]    ->[en_tete]->   infos en tete
                            ->[items]->     [n]->   infos items
    */
    foreach($entetes as $key => $value){
        $tabCommandes[$key]['entete']=$value;

        foreach($items as $itemKey=>$value){

            if($value['num_commande']==$tabCommandes[$key]['entete']['num_commande']){
                $tabCommandes[$key]['items'][$itemKey]=$value;
            }    
        }    
    }

    return $tabCommandes;
}
//-----------------------------------------------------------------------------------------------------------------------------------   







}