<?php
class CartView extends MotherView 
{
//-----------------------------------------------------------------------------------------------------------------------------------
    // function __construct()
    // {
    //     // $this->page.= "
    //     //     <div class='container-fluid'>
    //     //     <div class='row px-5'>
    //     //     <div class='col-md-7'>
    //     //     <div class='shopping-cart'>
    //     //     <h6>Mon panier</h6>
    //     //     <hr>";
    // }
    public function displayCart($img,$name,$price,$prod_id,$stock){
        
        $this->page .= "
           <div class='border rounded my-1 cart'>
                    <div class='row'>
                        <div class='col-md-3'>
                            <img src='$img' alt='' class='img-fluid'>
                        </div>
                        <div class='col-md-6 pb-2'>
                            <h5 class='pt-2'>$name</h5>
                            <small>seller:Epicerie fine</small>
                            <h5 class='pt-2'>$".$price."</h5>
                            
                            <a href='index.php?mode=remove&controller=Cart&action=cart&id=$prod_id'><button type='submit' class='btn mx-2' name='remove' class='remove-cart'>Remove</button> </a>
                        </div>
                        <div class='col-md-3 py-5'>
                            <div>
                                <select  class='form-control w-25 d-inline qty'></select>
                                <span  class='more'></span>
                                <span  class='subtotal'></span>
                                <input type='hidden'id='stock' value='$stock'>
                            </div>
                        </div>
                    </div>
                    </div>  
                   
                <script src='js/script.js'></script>  
        ";

        
      
    }
    public function displayData($carts){
       
        if (!empty($carts)) {
            foreach ($carts as $cart) {           
           
              if ($cart) {
                $this->displayCart($cart["photo"],$cart["nom_produit"],$cart["prix_unitaire"]
                ,$cart["id_produit"],$cart["qte_stock"]);
                 
              }
             
            }
        }else {
            $this->page .= "cart  is empty!";
        }
       
        $this->page .=' <div class= “col-12 mx-auto text-center py-3”><a href= "index.php?controller=ValidPanier&action=ValidPanier" class=“btn btn-success text-center” id=“idProduit”>Valider la commande</a>
       </div>';
        
        $this->display();        
    }

    
}



