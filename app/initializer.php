<?php


    //Llamada a config
    require_once "config/config.php";

    //Llamada a url helper
    require_once "helpers/url_helper.php";

    //Llamada libs
    spl_autoload_register(function($files) {
        include_once "libs/" . $files . ".php";
    });


?>