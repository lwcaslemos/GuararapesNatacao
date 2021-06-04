<?php
require_once 'Conexao.php';

class Pagamento {

    private $con;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function selecionaPagamentosPlano($plano_comprado_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pag.*, p.nome as nome_plano
                                    FROM pagamento_t pag,
                                        plano_comprado_t pc,
                                        plano_t p 
                                    WHERE 1=1
                                    AND pag.plano_comprado_id = pc.id
                                    AND pc.plano_id = p.id
                                    AND pag.plano_comprado_id = :plano_comprado_id 
                                    ORDER BY pag.criacao DESC');
        $sql->bindValue(':plano_comprado_id', $plano_comprado_id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaTodos(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pag.*, 
                                           p.nome as nome_plano,
                                           a.nome as nome_aluno,
                                           a.email as email_aluno
                                    FROM pagamento_t pag,
                                        plano_comprado_t pc,
                                        plano_t p,
                                        aluno_t a 
                                    WHERE 1=1
                                    AND pag.plano_comprado_id = pc.id
                                    AND pc.plano_id = p.id
                                    AND a.id = pc.aluno_id 
                                    ORDER BY pag.criacao DESC');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaPagamentoPorNome($nome){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pag.*, 
                                           p.nome as nome_plano,
                                           a.nome as nome_aluno,
                                           a.email as email_aluno
                                    FROM pagamento_t pag,
                                        plano_comprado_t pc,
                                        plano_t p,
                                        aluno_t a 
                                    WHERE 1=1
                                    AND pag.plano_comprado_id = pc.id
                                    AND pc.plano_id = p.id
                                    AND a.id = pc.aluno_id 
                                    AND a.nome LIKE :nome
                                    ORDER BY pag.criacao DESC');

        $sql->bindValue(':nome', "%$nome%");                            
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaUltimoPagamento($plano_comprado_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT * 
                                    FROM pagamento_t pag2
                                    WHERE pag2.id IN (
                                        SELECT MAX(pag.id)
                                        FROM pagamento_t pag,
                                            plano_comprado_t pc
                                        WHERE pag.plano_comprado_id = pc.id
                                        AND pag.plano_comprado_id = :plano_comprado_id)');
        $sql->bindValue(':plano_comprado_id', $plano_comprado_id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaPagamento($id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT * 
                                    FROM pagamentos_t 
                                    WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function inserirPagamento($criacao, $modificacao, $formapagamento, $valor, $parcela, $aluno_id, $plano_comprado_id){
        $dados = array();
        
        $sql = $this->con->prepare('INSERT INTO pagamento_t (criacao, modificacao, forma_pagamento, parcela, valor, 
                                    aluno_id, plano_comprado_id)
                                    VALUES (:criacao, :modificacao, :forma_pagamento, :parcela, :valor, 
                                    :aluno_id, :plano_comprado_id)');
        $sql->bindValue(':criacao', $criacao); 
        $sql->bindValue(':modificacao', $modificacao);
        $sql->bindValue(':forma_pagamento', $formapagamento); 
        $sql->bindValue(':parcela', $parcela);
        $sql->bindValue(':valor', $valor);  
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