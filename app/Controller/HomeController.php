<?php

class HomeController extends Controller{
    
    public function index() {
        $this->carregarTemplate('Homebar', 'Home');
    }

    public function planos() {
        $this->carregarTemplate('Homebar', 'Planos');
    }
}