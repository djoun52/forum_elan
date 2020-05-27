<?php
    namespace App;

    abstract class AbstractEntity
    {
        
        protected static function hydrate($data, $object){
            
            foreach($data as $field => $value){
                $fieldArray = explode("_", $field); // ['grade', 'id']

                if(isset($fieldArray[1]) && $fieldArray[1] === "id"){
                    $classname = "Model\\".ucfirst($fieldArray[0])."Manager";
                    $manager = new $classname;
                    $field = $fieldArray[0];//devient grade
                    $value = $manager->findOneById($value);//devient un objet Grade
                }
                
                $method = "set".ucfirst($field);
                if(method_exists($object, $method)){
                    $object->$method($value);
                }
            }
        }
    }