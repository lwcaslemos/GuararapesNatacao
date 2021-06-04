<?php

class Controller{
    
    public $dados;

    public function __construct(){
        $this->dados = array();
    }

    public function carregarTemplate($template, $view, $model = array()){
        $this->dados = $model;
        require 'app/View/'.$template.'.php';
    }

    public function carregarView($view, $model = array()){
        extract($model);
        require 'app/View/'.$view.'.php';
    }
}