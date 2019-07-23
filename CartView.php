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
                        <h5 class='pt-2 price'>$".$price."</h5>
                        
                        <a href='index.php?mode=remove&controller=Cart&action=cart&id=$prod_id'><button type='submit' class='btn mx-2' name='remove' class='remove-cart'>Remove</button> </a>
                    </div>
                    <div class='col-md-3 py-5'>
                        <div>
                        <button type='button ' class='btn less'><i class='fas fa-minus'></i></button>
                        <input type='text' value='1' class='form-control w-25 d-inline qty'>
                        <button type='button' class='btn more'><i class='fas fa-plus'></i></button>
                        <span class='subtotal'></span>
                            <input type='hidden'id='stock' value='$stock'>
                        </div>
                    </div>
                </div>
                </div>  
                
           
        ";
      
    }
    public function displayData($carts){
       
        if (!empty($carts)) {
            $this->page .= " <form action='#' method='Post'>";
            foreach ($carts as $cart) {           
           
              if ($cart) {
                $this->displayCart($cart["photo"],$cart["nom_produit"],$cart["prix_unitaire"]
                ,$cart["id_produit"],$cart["qte_stock"]);
                 
              }
             
            }
    //         $this->page .=' <div class= "col-12 mx-auto text-center py-3"><a href="index.php?controller=ValidPanier&action=ValidPanier" class="btn btn-success text-center" >Valider la commande</a>
    //    </div>’;
            $this->page .= "<button type='button' class='btn btn-succes order'>Valider la commande</button></form> <span id= 'total'></span>";
            
        }else {
            $this->page .= "cart  is empty!";
        }
       
        
        $this->display();        
    }
}
