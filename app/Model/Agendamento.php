<?php
require_once 'Conexao.php';

class Agendamento {

    private $con;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function listaAgendamentos($plano_comprado_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT ag.*, p.nome as nome_plano
                                    FROM agendamento_t ag,
                                         plano_comprado_t pc,
                                         plano_t p
                                    WHERE 1=1
                                    AND ag.plano_comprado_id = pc.id
                                    AND pc.plano_id = p.id
                                    AND ag.plano_comprado_id = :plano_comprado_id
                                    AND ag.data > current_date 
                                    ORDER BY ag.criacao DESC');
        $sql->bindValue(':plano_comprado_id', $plano_comprado_id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function validaAgendamentos($data, $plano_comprado_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT *
                                    FROM agendamento_t ag
                                    WHERE 1=1
                                    AND ag.plano_comprado_id = :plano_comprado_id
                                    AND ag.data = :data');
        $sql->bindValue(':plano_comprado_id', $plano_comprado_id);
        $sql->bindValue(':data', $data);
        $sql->execute();
        $dados = $sql->fetch();
        
        return $dados;
    }

    public function alteraAgendamento($id, $data, $hora){
        $sql = $this->con->prepare('UPDATE agendamento_t 
                                    SET modificacao = :modificacao, 
                                        data = :data,
                                        hora = :hora 
                                    WHERE id = :id');

        date_default_timezone_set('America/Recife');
        $sql->bindValue(':modificacao', date("Y-m-d H:i:s")); 
        $sql->bindValue(':id', $id); 
        $sql->bindValue(':data', $data);  
        $sql->bindValue(':hora', $hora); 

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function deletaAgendamento($id){

        $sql = $this->con->prepare('DELETE FROM agendamento_t WHERE id = :id');
        $sql->bindValue(':id', $id); 
        
        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function inserirAgendamento($criacao, $modificacao, $data, $hora, $aluno_id, $plano_comprado_id){
        
        $sql = $this->con->prepare('INSERT INTO agendamento_t (criacao, modificacao, data, hora, aluno_id, plano_comprado_id)
                                    VALUES (:criacao, :modificacao, :data, :hora, :aluno_id, :plano_comprado_id)');
        $sql->bindValue(':criacao', $criacao); 
        $sql->bindValue(':modificacao', $modificacao); 
        $sql->bindValue(':data', $data); 
        $sql->bindValue(':hora', $hora);
        $sql->bindValue(':aluno_id', $aluno_id);
        $sql->bindValue(':plano_comprado_id', $plano_comprado_id); 

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }
}