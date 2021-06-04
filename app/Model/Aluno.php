<?php
require_once 'Conexao.php';

class Aluno {

    private $con;
    private $email;
    private $senha;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function selecionaTodos(){
        $dados = array();

        $sql = $this->con->query('SELECT * FROM aluno_t');
        $dados = $sql->fetchall(PDO::fetch_assoc);

        return $dados;
    }

    public function selecionaAluno($id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT * FROM aluno_t WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        $dados = $sql->fetch();

        return $dados;
    }

    public function inserirAluno($criacao, $modificacao, $nome, $email, $senha, $telefone, $data_nascimento, 
                                 $cpf, $rg, $cep, $endereco, $bairro, $cidade, $estado, $observacao){
        
        $sql = $this->con->prepare('INSERT INTO aluno_t (criacao, modificacao, nome, email, senha, telefone, data_nascimento, 
                                    cpf, rg, cep, endereco, bairro, cidade, estado, observacao)
                                    VALUES (:criacao, :modificacao, :nome, :email, :senha, :telefone, :data_nascimento,
                                    :cpf, :rg, :cep, :endereco, :bairro, :cidade, :estado, :observacao)');
        $sql->bindValue(':criacao', $criacao); 
        $sql->bindValue(':modificacao', $modificacao); 
        $sql->bindValue(':nome', $nome); 
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);  
        $sql->bindValue(':telefone', $telefone); 
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':cpf', $cpf); 
        $sql->bindValue(':rg', $rg); 
        $sql->bindValue(':cep', $cep); 
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

    public function selecionaLoginAluno($email, $senha){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT id, nome, email FROM aluno_t WHERE email = :email AND senha = :senha');
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function alteraPerfil($nome, $id, $telefone, $CEP, $endereco, $bairro, $cidade, $estado, $observacao){

        $sql = $this->con->prepare('UPDATE aluno_t 
                                    SET modificacao = :modificacao, 
                                    nome = :nome, 
                                    telefone = :telefone,
                                    CEP = :CEP,
                                    endereco = :endereco,
                                    cidade = :cidade,
                                    bairro = :bairro,
                                    estado = :estado,
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

        $sql = $this->con->prepare('DELETE FROM aluno_t WHERE id = :id');
        $sql->bindValue(':id', $id); 
        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function consultarAlunoPlanoPorNome($nome){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno,
                                        p.nome as nome_plano,
                                        pc.id as id_pc,
                                        pc.criacao as criacao_pc,
                                        pc.valor as valor_pc,
                                        pc.turno as turno_pc,
                                        pc.status as status_pc 
                                    FROM aluno_t a
                                    LEFT JOIN plano_comprado_t pc ON pc.aluno_id = a.id
                                    LEFT JOIN plano_t p ON p.id = pc.plano_id
                                    WHERE a.nome LIKE :nome
                                    AND pc.status NOT IN ("Cancelado")
                                    ORDER BY a.nome ASC');
        
        $sql->bindValue(':nome', "%$nome%");
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarAlunoPlanoAll(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno,
                                        p.nome as nome_plano,
                                        pc.id as id_pc,
                                        pc.criacao as criacao_pc,
                                        pc.valor as valor_pc,
                                        pc.turno as turno_pc,
                                        pc.status as status_pc 
                                    FROM aluno_t a
                                    LEFT JOIN plano_comprado_t pc ON pc.aluno_id = a.id
                                    LEFT JOIN plano_t p ON p.id = pc.plano_id
                                    WHERE pc.status NOT IN ("Cancelado")
                                    ORDER BY a.nome ASC');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarAlunoPorNome($nome){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno
                                    FROM aluno_t a
                                    WHERE a.nome LIKE :nome
                                    ORDER BY a.nome ASC');
        
        $sql->bindValue(':nome', "%$nome%");
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarAlunoAll(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno
                                    FROM aluno_t a
                                    ORDER BY a.nome ASC');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarAlunoPlanoCanceladoPorNome($nome){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno,
                                        p.nome as nome_plano,
                                        pc.id as id_pc,
                                        pc.criacao as criacao_pc,
                                        pc.valor as valor_pc,
                                        pc.turno as turno_pc,
                                        pc.status as status_pc 
                                    FROM aluno_t a
                                    INNER JOIN plano_comprado_t pc ON pc.aluno_id = a.id
                                    INNER JOIN plano_t p ON p.id = pc.plano_id
                                    WHERE a.nome LIKE :nome
                                    ORDER BY a.nome, pc.id, pc.status ASC');
        
        $sql->bindValue(':nome', "%$nome%");
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarAlunoPlanoCanceladoAll(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno,
                                        p.nome as nome_plano,
                                        pc.id as id_pc,
                                        pc.criacao as criacao_pc,
                                        pc.valor as valor_pc,
                                        pc.turno as turno_pc,
                                        pc.status as status_pc 
                                    FROM aluno_t a
                                    INNER JOIN plano_comprado_t pc ON pc.aluno_id = a.id
                                    INNER JOIN plano_t p ON p.id = pc.plano_id
                                    ORDER BY a.nome, pc.id, pc.status ASC');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarAlunoSemPlanoPorNome($nome){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno 
                                    FROM aluno_t a
                                    WHERE a.nome LIKE :nome
                                    AND NOT EXISTS (SELECT 1 FROM plano_comprado_t pc WHERE pc.aluno_id = a.id AND pc.status != :canc)
                                    ORDER BY a.nome ASC');
        
        $sql->bindValue(':nome', "%$nome%");
        $sql->bindValue(':canc', 'Cancelado');
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function consultarAlunoSemPlanoAll(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT a.id as id_aluno,
                                        a.criacao as criacao_aluno,
                                        a.nome as nome_aluno,
                                        a.email as email_aluno,
                                        a.cpf as cpf_aluno 
                                    FROM aluno_t a
                                    WHERE NOT EXISTS (SELECT 1 FROM plano_comprado_t pc WHERE pc.aluno_id = a.id AND pc.status != :canc)
                                    ORDER BY a.nome ASC');

        $sql->bindValue(':canc', 'Cancelado');
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function resetaSenha($id, $senha){

        $sql = $this->con->prepare('UPDATE aluno_t 
                                    SET modificacao = :modificacao,
                                    senha = :senha 
                                    WHERE id = :id');

        date_default_timezone_set('America/Recife');
        $sql->bindValue(':modificacao', date("Y-m-d H:i:s")); 
        $sql->bindValue(':id', $id); 
        $sql->bindValue(':senha', $senha);  

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