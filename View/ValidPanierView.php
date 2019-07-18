<?php



class ValidPanierView extends MotherView
{
    public function displayValid()
    {
        
        $this->page .= '
        <div class="card col-md-12 col-sm-6 text-center my-5  bg-light">
            <div class="card-body">
                <h3 class="card-title text-center">Votre commande est validée, <br /> un email vous a été envoyé</h3>
            </div>
        </div><br />';

        $this->display();
    }

    
}