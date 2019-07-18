<?php
class CartView extends MotherView 
{

//-----------------------------------------------------------------------------------------------------------------------------------

    public function displayCart($img,$name,$price,$prod_id){
        
        $this->page .= "
           <div class='border rounded my-1'>
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
                                <button type='button ' class='btn less'><i class='fas fa-minus'></i></button>
                                <input type='text' value='1' class='form-control w-25 d-inline qty'>
                                <button type='button' class='btn more'><i class='fas fa-plus'></i></button>
                            </div>
                        </div>
                    </div>
                    </div>  
                   
                <script src='js/script.js'></script>
        ";
       
    }
    public function displayData($carts){

        foreach ($carts as $cart) {           

            $this->displayCart($cart["photo"],$cart["nom_produit"],$cart["prix_unitaire"]
            ,$cart["id_produit"]);
             
        }
        
        $this->display();        
    }
}
