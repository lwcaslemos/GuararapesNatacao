<?php
require_once 'Conexao.php';

class Relatorio {

    private $con;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function alunosPorBairro(){
        $dados = array();

        $sql = $this->con->query('SELECT bairro, cidade, count(*) quantidade
                                  FROM aluno_t 
                                  GROUP BY bairro, cidade
                                  ORDER BY bairro');
        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function alunosPorIdade(){
        $dados = array();

        $sql = $this->con->query('SELECT YEAR(FROM_DAYS(TO_DAYS(NOW()) - TO_DAYS(data_nascimento))) idade, 
                                         count(*) quantidade
                                  FROM aluno_t
                                  GROUP BY idade
                                  ORDER BY idade');
        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function pagamentosEsperadosDia(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(pc.fim_ciclo, "%d/%m/%Y") data_pagamento,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t pc 
                                WHERE pc.status = "Ativo"
                                GROUP BY pc.fim_ciclo
                                ORDER BY pc.fim_ciclo');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function pagamentosEsperadosMes(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(fim_ciclo, "%m/%Y") data_pagamento,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t 
                                WHERE status = "Ativo"
                                GROUP BY DATE_FORMAT(fim_ciclo, "%m/%Y")
                                ORDER BY DATE_FORMAT(fim_ciclo, "%m/%Y")');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function pagamentosEsperadosAno(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(fim_ciclo, "%Y") data_pagamento,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t 
                                WHERE status = "Ativo"
                                GROUP BY DATE_FORMAT(fim_ciclo, "%Y")
                                ORDER BY DATE_FORMAT(fim_ciclo, "%Y")');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function pagamentosRecebidosDia(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(criacao, "%d/%m/%Y") data_pagamento,
                                      forma_pagamento,
                                      COUNT(*) quantidade
                                  FROM pagamento_t
                                  GROUP BY DATE_FORMAT(criacao, "%d/%m/%Y"),
                                      forma_pagamento
                                  ORDER BY criacao,
                                      forma_pagamento ASC');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }
    
    public function pagamentosRecebidosMes(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(criacao, "%m/%Y") data_pagamento,
                                    forma_pagamento,
                                    COUNT(*) quantidade
                                FROM pagamento_t
                                GROUP BY DATE_FORMAT(criacao, "%m/%Y"),
                                    forma_pagamento
                                ORDER BY DATE_FORMAT(criacao, "%m/%Y"),
                                    forma_pagamento');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function pagamentosRecebidosAno(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(criacao, "%Y") data_pagamento,
                                    forma_pagamento,
                                    COUNT(*) quantidade
                                FROM pagamento_t
                                GROUP BY DATE_FORMAT(criacao, "%Y"),
                                    forma_pagamento
                                ORDER BY DATE_FORMAT(criacao, "%Y"),
                                    forma_pagamento');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }    
    
    public function somaPagamentosDia(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(criacao, "%d/%m/%Y") data_pagamento,
                                    forma_pagamento,
                                    SUM(valor) valor_total
                                FROM pagamento_t
                                GROUP BY DATE_FORMAT(criacao, "%d/%m/%Y"),
                                    forma_pagamento
                                ORDER BY DATE_FORMAT(criacao, "%d/%m/%Y"),
                                    forma_pagamento');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function somaPagamentosMes(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(criacao, "%m/%Y") data_pagamento,
                                    forma_pagamento,
                                    SUM(valor) valor_total
                                FROM pagamento_t
                                GROUP BY DATE_FORMAT(criacao, "%m/%Y"),
                                    forma_pagamento
                                ORDER BY DATE_FORMAT(criacao, "%m/%Y"),
                                    forma_pagamento');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }
    
    public function somaPagamentosAno(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(criacao, "%Y") data_pagamento,
                                    forma_pagamento,
                                    SUM(valor) valor_total
                                FROM pagamento_t
                                GROUP BY DATE_FORMAT(criacao, "%Y"),
                                    forma_pagamento
                                ORDER BY DATE_FORMAT(criacao, "%Y"),
                                    forma_pagamento');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }    
    
    public function cancelamentosDia(){
        $dados = array();

        $sql = $this->con->query('SELECT p.nome, 
                                    DATE_FORMAT(pc.modificacao, "%d/%m/%Y") data_cancelamento,                                    
                                    COUNT(*) quantidade
                                FROM plano_comprado_t pc
                                INNER JOIN plano_t p ON p.id = pc.plano_id
                                WHERE pc.status = "Cancelado"
                                GROUP BY DATE_FORMAT(pc.modificacao, "%d/%m/%Y"),
                                    p.nome
                                ORDER BY DATE_FORMAT(pc.modificacao, "%d/%m/%Y"),
                                    p.nome');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function cancelamentosMes(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(pc.modificacao, "%m/%Y") data_cancelamento,
                                    p.nome,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t pc
                                INNER JOIN plano_t p ON p.id = pc.plano_id
                                WHERE pc.status = "Cancelado"
                                GROUP BY DATE_FORMAT(pc.modificacao, "%m/%Y"),
                                    p.nome
                                ORDER BY DATE_FORMAT(pc.modificacao, "%m/%Y"),
                                    p.nome');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function cancelamentosAno(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(pc.modificacao, "%Y") data_cancelamento,
                                    p.nome,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t pc
                                INNER JOIN plano_t p ON p.id = pc.plano_id
                                WHERE pc.status = "Cancelado"
                                GROUP BY DATE_FORMAT(pc.modificacao, "%Y"),
                                    p.nome
                                ORDER BY DATE_FORMAT(pc.modificacao, "%Y"),
                                    p.nome');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }    
    
    public function contratacoesDia(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(pc.criacao, "%d/%m/%Y") data_compra,
                                    p.nome,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t pc
                                INNER JOIN plano_t p ON p.id = pc.plano_id
                                GROUP BY DATE_FORMAT(pc.criacao, "%d/%m/%Y"),
                                    p.nome
                                ORDER BY DATE_FORMAT(pc.criacao, "%d/%m/%Y"),
                                    p.nome');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function contratacoesMes(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(pc.criacao, "%m/%Y") data_compra,
                                    p.nome,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t pc
                                INNER JOIN plano_t p ON p.id = pc.plano_id
                                GROUP BY DATE_FORMAT(pc.criacao, "%m/%Y"),
                                    p.nome
                                ORDER BY DATE_FORMAT(pc.criacao, "%m/%Y"),
                                    p.nome');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function contratacoesAno(){
        $dados = array();

        $sql = $this->con->query('SELECT DATE_FORMAT(pc.criacao, "%Y") data_compra,
                                    p.nome,
                                    COUNT(*) quantidade
                                FROM plano_comprado_t pc
                                INNER JOIN plano_t p ON p.id = pc.plano_id
                                GROUP BY DATE_FORMAT(pc.criacao, "%Y"),
                                    p.nome
                                ORDER BY DATE_FORMAT(pc.criacao, "%Y"),
                                    p.nome');

        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }
}