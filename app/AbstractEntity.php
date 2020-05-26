<?php
    namespace App;

    abstract class AbstractEntity
    {
        
        protected static function hydrate($data, $object){

            foreach($data as $field => $value){
                $method = "set".ucfirst($field);
                if(method_exists($object, $method)){
                    $object->$method($value);
                }
            }

        }
    }