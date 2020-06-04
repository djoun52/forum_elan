<?php

namespace Controller;
use App\Session;
use App\Router;
use Model\TopicsManager;
use Model\MessageManager;

class TopicsController
{

    public function listeMessage(){
        Session::authenticationRequired("ROLE_USER");
        if ($_GET['id']){
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
            $messagemodel = new MessageManager();
            $topicssmodel = new TopicsManager();

            Session::setTopics($topicssmodel->findOneById($id));

            $message = $messagemodel->findMessageByTopicsId($id);

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
            $model->addMessage($message,$idTopics);
            $message = $model->findMessageByTopicsId($idTopics);
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
        $topic=$message->getTopics();
        $idTopic=$topic-> getId();
        $model->removeMessage($id); 
        $numberMessage= $model->countMessageByTopicsId($idTopic);
        // var_dump($numberMessage);
        
        if($numberMessage != 0){ 
            Router::redirectTo("topics", "listeMessage",$idTopic);
           
        }else{
            $topicssmodel = new TopicsManager();
            $topicssmodel->removeTopics($idTopic);
            Router::redirectTo("home", "listTopics");
      
        }

        }
    } 
    public function resolveTopic(){
        Session::authenticationRequired("ROLE_USER");
        if ($_GET['id']){
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
            $model = new TopicsManager();

            $model ->resolveTopic($id);
            Router::redirectTo("topics", "listeMessage",$id);
            header("Location: ?ctrl=topics&method=listeMessage&id=$id");  
            die();
        }
    }
    public function EndTopic(){
        Session::authenticationRequired("ROLE_USER");
        if ($_GET['id']){
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
            $model = new TopicsManager();

            $model ->EndTopic($id);
            Router::redirectTo("topics", "listeMessage",$id);
        }
    }


}