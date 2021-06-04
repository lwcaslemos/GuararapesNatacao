<?php

spl_autoload_register(function($nome_arquivo){

    if(file_exists('app/Controller/'.$nome_arquivo.'.php')){
        require 'app/Controller/'.$nome_arquivo.'.php';
    }
    else if(file_exists('app/Model/'.$nome_arquivo.'.php')){
        require 'app/Model/'.$nome_arquivo.'.php';
    }
    else if(file_exists('app/Core/'.$nome_arquivo.'.php')){
        require 'app/Core/'.$nome_arquivo.'.php';
    }
});

?>