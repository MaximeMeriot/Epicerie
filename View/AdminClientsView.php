<?php


class AdminClientsView extends MotherView {



//--------------------------------------------------------------------------------------------------------------------------------------
public function displayList($list){

    $table='
    <div class="row justify-content-center">
    <a class="btn btn-primary my-5 mx-2 btn-block btn-lg" href="index.php?controller=User&action=add" role="button">Ajouter un item</a>
    </div>';



    $table.= "<h5> Base de données - Utilisateurs -</h5>";
    $table.='
    <div class="row">
    <table class="table my-5">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Article</th>
            <th scope="col">Description</th>
            <th scope="col">Photo</th> 
            <th scope="col">Prix unitaire</th> 
            <th scope="col">Quantité en stock</th> 
            <th scope="col"></th>         
          </tr>
        </thead>
        <tbody>                        
    ';

    foreach($list as $value){
        $table.='
        <tr>        
            <td>'.$value["id_produit"].'</td>
            <td>'.$value["nom_produit"].'</td>
            <td>'.$value["description"].'</td>
            <td>'.$value["photo"].'</td>
            <td>'.$value["prix_unitaire"].'</td>
            <td>'.$value["qte_stock"].'</td>
            <td><a class="btn btn-danger" href="index.php?controller=User&action=delete&id='.$value["id_produit"].'" role="button">Supprimer</a>
            <a class="btn btn-primary" href="index.php?controller=User&action=update&id='.$value["id_produit"].'" role="button">Modifier</a>
            </td>

        <tr>';
    

    }

    $table.='                       
        </tbody>
        </table>
        </div>';

    $this->page.=$table;
    $this->display();

}
//--------------------------------------------------------------------------------------------------------------------------------------

}