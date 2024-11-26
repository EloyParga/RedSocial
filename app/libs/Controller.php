<?php

class Controller {

    public function model($modelo){

        if(file_exists('../app/models/' . $modelo . '.php')){
            require_once '../app/models/' . $modelo . '.php';

            return new $modelo;
        }else{
            echo "No existe MODEL";
        }

    }

    public function view($view, $datos = []){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            echo "la vista no existe";
        }
    }
}

?>