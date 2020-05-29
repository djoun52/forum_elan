<?php

namespace Controller;
use App\Session;
use Model\SujetsManager;
use Model\MessageManager;

class TopicsController
{

    public function listeMessage(){
        Session::authenticationRequired("ROLE_USER");
        if ($_GET['topics']){
            $topics = filter_input(INPUT_GET, "topics", FILTER_SANITIZE_STRING);
            $messagemodel = new MessageManager();
            $sujetsmodel = new SujetsManager();

            Session::setTopics($sujetsmodel->findOneBytitre($topics));

            $message = $messagemodel->findMessageByTopics($topics);

            return [
                "view" => "topics.php",
                "data" => [
                    "message" => $message,
                ]
        ]; 
        }
    }

    public function addMessage(){
        Session::authenticationRequired("ROLE_USER");
        if ($_POST['message']) {
            $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
            $model = new MessageManager();
            $idTopics = Session::getTopics()->getId() ;
            $titreTopics = Session::getTopics()->getTitre() ;
            $model->addMessage($message,$idTopics);
            $message = $model->findMessageByTopics($titreTopics);
        }
        return [
            "view" => "topics.php",
            "data" => [
                "message" => $message,
            ]
        ]; 
    

    }

    public function supMessage(){
        Session::authenticationRequired("ROLE_USER");
        if ($_GET['id']){
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        // var_dump($id);
        $model = new MessageManager();
    
        $message= $model->findOneById($id); 
        $topic=$message->getSujets();
        $idTopic=$topic-> getId();
        $titre=$topic->getTitre();
        // var_dump($model->countMessageBySujetsId($idTopic));
        $model->removeMessage($id); 
        $numberMessage=$model->countMessageBySujetsId($idTopic);
        var_dump($numberMessage);
        $sujetsmodel = new SujetsManager();
        
        if($numberMessage > 0){ 
           
            // header("Location: ?ctrl=topics&method=listeMessage&topics=$titre");  
            die();
        }else{
            
            $sujetsmodel->removeSujet($idTopic);
            header("Location: ?ctrl=home&method=listTopics");
           
            die();
        }

        }
    } 
        

    
   


}