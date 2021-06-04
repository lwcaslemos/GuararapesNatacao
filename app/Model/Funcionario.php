<?php
require_once 'Conexao.php';

class Funcionario {

    private $con;
    private $email;
    private $senha;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function selecionaTodos(){
        $dados = array();

        $sql = $this->con->query('SELECT * FROM funcionario_t');
        $dados = $sql->fetchall(PDO::fetch_assoc);

        return $dados;
    }    

    public function selecionaFuncionario($id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT * FROM funcionario_t WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        $dados = $sql->fetch();

        return $dados;
    }

    public function selecionaLoginFuncionario($email, $senha){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT id, nome, email FROM funcionario_t WHERE email = :email AND senha = :senha AND admin = 1');
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaLoginFuncionario2($email, $senha){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT id, nome, email FROM funcionario_t WHERE email = :email AND senha = :senha');
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaLoginImagem($email, $senha){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT id, nome, email FROM funcionario_t WHERE email = :email AND senha = :senha');
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function inserirFuncionario($criacao, $modificacao, $nome, $email, $senha, $telefone, $data_nascimento, $funcao, $admin, $CPF, $RG, $CEP, $endereco, $bairro, $cidade, $estado, $observacao){
        
        $sql = $this->con->prepare('INSERT INTO funcionario_t (criacao, modificacao, nome, email, senha, telefone, data_nascimento, 
                                    funcao, admin, cpf, rg, cep, endereco, bairro, cidade, estado, observacao)
                                    VALUES (:criacao, :modificacao, :nome, :email, :senha, :telefone, :data_nascimento,
                                    :funcao, :admin, :cpf, :rg, :cep, :endereco, :bairro, :cidade, :estado, :observacao)');
        $sql->bindValue(':criacao', $criacao); 
        $sql->bindValue(':modificacao', $modificacao); 
        $sql->bindValue(':nome', $nome); 
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);  
        $sql->bindValue(':telefone', $telefone); 
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':funcao', $funcao);
        $sql->bindValue(':admin', $admin);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':cpf', $CPF); 
        $sql->bindValue(':rg', $RG); 
        $sql->bindValue(':cep', $CEP); 
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':bairro', $bairro); 
        $sql->bindValue(':cidade', $cidade); 
        $sql->bindValue(':estado', $estado); 
        $sql->bindValue(':observacao', $observacao);

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function consultarFuncionarioPorNome($nome){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_func,
                                        a.criacao as criacao_func,
                                        a.nome as nome_func,
                                        a.email as email_func,
                                        a.funcao as funcao_func,
                                        a.admin as admin_func 
                                    FROM funcionario_t a
                                    WHERE a.nome LIKE :nome
                                    ORDER BY a.nome ASC');
        
        $sql->bindValue(':nome', "%$nome%");
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarFuncionarioAll(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_func,
                                        a.criacao as criacao_func,
                                        a.nome as nome_func,
                                        a.email as email_func,
                                        a.funcao as funcao_func,
                                        a.admin as admin_func 
                                    FROM funcionario_t a
                                    ORDER BY a.nome ASC');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function alteraPerfil($nome, $id, $telefone, $CEP, $endereco, $bairro, $cidade, $estado, $funcao, $observacao){

        $sql = $this->con->prepare('UPDATE funcionario_t 
                                    SET modificacao = :modificacao, 
                                    nome = :nome, 
                                    telefone = :telefone,
                                    CEP = :CEP,
                                    endereco = :endereco,
                                    cidade = :cidade,
                                    bairro = :bairro,
                                    estado = :estado,
                                    funcao = :funcao,
                                    observacao = :observacao 
                                    WHERE id = :id');

        date_default_timezone_set('America/Recife');
        $sql->bindValue(':modificacao', date("Y-m-d H:i:s")); 
        $sql->bindValue(':id', $id); 
        $sql->bindValue(':nome', $nome);  
        $sql->bindValue(':telefone', $telefone); 
        $sql->bindValue(':CEP', $CEP); 
        $sql->bindValue(':endereco', $endereco); 
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':bairro', $bairro); 
        $sql->bindValue(':estado', $estado);
        $sql->bindValue(':funcao', $funcao);
        $sql->bindValue(':observacao', $observacao);

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function deletePerfil($id){

        $sql = $this->con->prepare('DELETE FROM funcionario_t WHERE id = :id');
        $sql->bindValue(':id', $id); 
        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

}