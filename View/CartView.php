<?php
class CartView extends MotherView 
{

//-----------------------------------------------------------------------------------------------------------------------------------

    public function displayCart($img,$name,$description,$price,$prod_id){

        $this->page .= "
           <div class='border rounded my-1'>
                    <div class='row'>
                        <div class='col-md-3'>
                            <img src='images/shop/$img' alt=' class='img-fluid'>
                        </div>
                        <div class='col-md-6 pb-2'>
                            <h5 class='pt-2'>$name</h5>
                            <small>seller:Epicerie fine</small>
                            <h5 class='pt-2'>$".$price."</h5>
                            <button type='submit' class='btn btn-dark'>Save for later</button>
                            <a href='cart.php?action=remove&id=$prod_id'><button type='submit' class='btn mx-2' name='remove' class='remove-cart'>Remove</button> </a>
                        </div>
                        <div class='col-md-3 py-5'>
                            <div>
                                <button type='button ' class='btn less'><i class='fas fa-minus'></i></button>
                                <input type='text' value='1' class='form-control w-25 d-inline qty'>
                                <button type='button' class='btn more'><i class='fas fa-plus'></i></button>
                            </div>
                        </div>
                    </div>
                    <input type='hidden' value='$stock'>
                </div>  
                <script src='js/script.js'></script>
        ";
    }
    public function displayAllCart(){
        foreach ($sessions as $session) {
            displayCart($img,$name,$description,$price,$prod_id);
            $this->display();
        
        }
    }
}
