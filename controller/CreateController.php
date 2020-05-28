<?php

namespace Controller;
use App\Session;
use Model\SujetsManager;


class CreateController
{
    public function create()
    {
        Session::authenticationRequired("ROLE_USER");

        if (!empty($_POST)){

            
         
                
            
        }else {
            header('Location: ?ctrl=home&method=create');
        }
    
    }

   
}



?> 

check catégoire 
si nom categorie existe alors mettre id catégoire dans une varriable 
sinon add nex catégorie et mettre id catégoire dans une varriable 

add topics


recuperer l'id de nouceaux topics
add message 

