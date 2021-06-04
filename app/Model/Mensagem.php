<?php
require_once 'Conexao.php';

class Mensagem {

    private $con;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function selecionaMensagens($aluno_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT *
                                    FROM mensagem_t 
                                    WHERE aluno_id = :aluno_id 
                                    ORDER BY criacao DESC');
        $sql->bindValue(':aluno_id', $aluno_id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }    
    
    public function selecionaMensagensNaoRespondidas(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT aux.*
                                    FROM (SELECT a.id as id_aluno,
                                            a.nome as nome_aluno,
                                            a.email as email_aluno,
                                            m.criacao as criacao_msg,
                                            m.autor as autor_msg,
                                            m.texto as texto_msg,
                                            MAX(m.criacao) OVER(PARTITION BY m.aluno_id) as max_msg 
                                            FROM aluno_t a,
                                                mensagem_t m
                                            WHERE a.id = m.aluno_id) as aux
                                    WHERE aux.criacao_msg = aux.max_msg
                                    AND aux.autor_msg = :aluno');
        $sql->bindValue(':aluno', 'Aluno');
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaHistoricoMensagens(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT DISTINCT a.id as id_aluno,
                                    a.nome as nome_aluno,
                                    a.email as email_aluno,
                                    a.cpf as cpf_aluno,
                                    (SELECT COUNT(*) FROM mensagem_t m2 WHERE a.id = m2.aluno_id) as qntd_msg
                                    FROM aluno_t a
                                        LEFT JOIN mensagem_t m ON a.id = m.aluno_id');
                                    
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }    
    
    public function selecionaHistoricoMensagensPorNome($nome){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT DISTINCT a.id as id_aluno,
                                    a.nome as nome_aluno,
                                    a.email as email_aluno,
                                    a.cpf as cpf_aluno,
                                    (SELECT COUNT(*) FROM mensagem_t m2 WHERE a.id = m2.aluno_id) as qntd_msg
                                    FROM aluno_t a
                                        LEFT JOIN mensagem_t m ON a.id = m.aluno_id
                                    WHERE a.nome LIKE :nome');

        $sql->bindValue(':nome', "%$nome%");                            
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function inserirMensagem($criacao, $modificacao, $autor, $texto, $aluno_id){
        
        $sql = $this->con->prepare('INSERT INTO mensagem_t (criacao, modificacao, autor, texto, aluno_id)
                                    VALUES (:criacao, :modificacao, :autor, :texto, :aluno_id)');
        $sql->bindValue(':criacao', $criacao); 
        $sql->bindValue(':modificacao', $modificacao); 
        $sql->bindValue(':autor', $autor); 
        $sql->bindValue(':texto', $texto);
        $sql->bindValue(':aluno_id', $aluno_id); 

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }
}