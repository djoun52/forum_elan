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
            $messagemodel = new MessageManager();
            $idTopics = Session::getTopics()->getId() ;
            $titreTopics = Session::getTopics()->getTitre() ;
            $model->addMessage($message,$idTopics);
            $message = $messagemodel->findMessageByTopics($titreTopics);
        }
        return [
            "view" => "topics.php",
            "data" => [
                "message" => $message,
            ]
        ]; 
    

    }




}