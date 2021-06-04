<?php

class LoginController extends Controller{
    
    public function index(){
        $this->carregarTemplate('Login', 'Login');
    }

    public function cadastro(){
        $this->carregarTemplate('Cadastro', 'Cadastro');
    }

    public function cadastrarAluno(){
        $u = new Aluno();
        
        date_default_timezone_set('America/Recife');
        $criacao = date("Y-m-d H:i:s");
        $modificacao = date("Y-m-d H:i:s");
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $RG = preg_replace( '/[^0-9]/is', '', $_POST['RG']);
        $CPF = preg_replace( '/[^0-9]/is', '', $_POST['CPF']);
        $telefone = preg_replace( '/[^0-9]/is', '', $_POST['telefone']);
        $data_nascimento = $_POST['data_nascimento'];
        $CEP = preg_replace( '/[^0-9]/is', '', $_POST['CEP']);
        $endereco = $_POST['rua'].', '.$_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $observacao = $_POST['observacoes'];

        $valid = $u->inserirAluno($criacao, $modificacao, $nome, $email, $senha, $telefone, $data_nascimento, 
        $CPF, $RG, $CEP, $endereco, $bairro, $cidade, $estado, $observacao);

        if($valid == true){
            $dadosaluno = $u->selecionaLoginAluno($email, $senha);
            
            if(isset($_FILES['fotoperfil'])){
                $ext = '.jpg';
                $dir = 'C:/xampp/htdocs/guararapesnatacao/upload/alunos/';
                move_uploaded_file($_FILES['fotoperfil']['tmp_name'], $dir.$dadosaluno[0]['id'].$ext);
            }

            echo "<script>
            alert('Cadastro realizado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/login');
                </script>";
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao cadastrar aluno!');
                window.location.replace('http://localhost/guararapesnatacao/login');
                </script>"; 
        }
    }

    public function validaLogin(){
        $u = new Aluno();
        $u->setEmail($_POST['email']);
        $u->setSenha(md5($_POST['senha']));

        $valid = $u->selecionaLoginAluno($u->getEmail(), $u->getSenha());

        if(!empty($valid)){
            $dados = explode(' ', $valid[0]['nome']);
            $_SESSION['nome'] = ucfirst($dados[0]);
            $_SESSION['id'] = $valid[0]['id'];
            $_SESSION['email'] = $valid[0]['email'];
            $_SESSION['tipo'] = 'Aluno';

            echo "<script>
                window.location.replace('http://localhost/guararapesnatacao/aluno');
                </script>"; 
        }
        else{
            $f = new Funcionario();
            $f->setEmail($_POST['email']);
            $f->setSenha(md5($_POST['senha']));
    
            $validfuncionario = $f->selecionaLoginFuncionario($f->getEmail(), $f->getSenha());

            if(!empty($validfuncionario)){
                unset($_SESSION['email']);
                unset($_SESSION['nome']);
                unset($_SESSION['id']);

                $dados2 = explode(' ', $validfuncionario[0]['nome']);
                $_SESSION['nome'] = ucfirst($dados2[0]);
                $_SESSION['id'] = $validfuncionario[0]['id'];
                $_SESSION['email'] = $validfuncionario[0]['email'];
                $_SESSION['tipo'] = 'Admin';
    
                echo "<script>
                    window.location.replace('http://localhost/guararapesnatacao/admin');
                    </script>"; 
            }
            else{
                echo "<script>
                alert('Erro ao realizar login!');
                    window.location.replace('http://localhost/guararapesnatacao/login');
                    </script>"; 
            }
        } 
    }
}