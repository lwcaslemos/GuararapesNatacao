<?php

class Core {

    private $email;
    private $tipo;
    
    public function __construct(){
        $this->email = $_SESSION['email'] ?? null;
        $this->tipo = $_SESSION['tipo'] ?? null;
        $this->run();
    }

    public function run(){

        $parametros = array();

        if(isset($_GET['pag'])){
            $url = $_GET['pag'];
        }

        if(!empty($url)){
            $url = explode('/', $url);
            $controller = ucfirst($url[0].'Controller');
            array_shift($url);

            if(isset($url[0]) && !empty($url[0])){
                $metodo = $url[0];
                array_shift($url);
            }
            else{
                $metodo = 'index';
            }

            if(count($url) > 0){
                $parametros = $url;
            }
        }
        else{
            $controller = 'HomeController';
            $metodo = 'index';
        }

        if($this->email){
            $permissoesAluno = ['AlunoController'];
            $permissoesAdmin = ['AdminController'];

            if($this->tipo == 'Aluno'){
                if(!isset($controller) || !in_array($controller, $permissoesAluno)){
                    unset($_SESSION['email']);
                    unset($this->email);
                    unset($this->tipo);
                    unset($_SESSION['nome']);
                    unset($_SESSION['id']);
                    unset($_SESSION['tipo']);
                    session_destroy();
                }
            }
            else if($this->tipo == 'Admin'){
                if(!isset($controller) || !in_array($controller, $permissoesAdmin)){
                    unset($_SESSION['email']);
                    unset($this->email);
                    unset($this->tipo);
                    unset($_SESSION['nome']);
                    unset($_SESSION['id']);
                    unset($_SESSION['tipo']);
                    session_destroy();
                }
            }

        }
        else{
            $permissoes = ['HomeController', 'LoginController'];

            if(!isset($controller) || !in_array($controller, $permissoes)){
                $controller = 'HomeController';
                $metodo = 'index';

                unset($_SESSION['email']);
                unset($this->email);
                unset($_SESSION['nome']);
                unset($_SESSION['id']);
                unset($_SESSION['tipo']);
                session_destroy();
                
                //echo "<script>window.location.replace('http://localhost/guararapesnatacao');</script>";
            }
        }

        $caminho = 'guararapesnatacao/app/Controller/'.$controller.'.php';

        if(!file_exists($caminho) && !method_exists($controller, $metodo)){
            $controller = 'HomeController';
            $metodo = 'index';
        }

        $instancia = new $controller;
        
        call_user_func_array(array($instancia, $metodo), $parametros);
    }

}