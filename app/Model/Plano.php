<?php
require_once 'Conexao.php';

class Plano {

    private $con;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function selecionaTodos(){
        $dados = array();

        $sql = $this->con->query('SELECT * FROM plano_t ORDER BY id ASC');
        $sql->execute();
        $dados = $sql->fetchall();

        return $dados;
    }

    public function selecionaPlano($id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT nome, periodicidade, valor_mensalidade FROM plano_t WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function verificarPlano($aluno_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT COUNT(*) AS qntd
                                    FROM plano_comprado_t 
                                    WHERE aluno_id = :aluno_id 
                                    AND status != "Cancelado"');
        $sql->bindValue(':aluno_id', $aluno_id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaPlanoComprado($aluno_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pc.*, p.nome as nome_plano
                                    FROM plano_comprado_t pc,
                                        plano_t p
                                    WHERE 1=1
                                    AND pc.plano_id = p.id
                                    AND pc.aluno_id = :aluno_id 
                                    AND status != "Cancelado"');
        $sql->bindValue(':aluno_id', $aluno_id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaCountPagPendente(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT count(*) as qntd
                                    FROM plano_comprado_t
                                    WHERE 1=1 
                                    AND status = "Pagamento pendente"');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaPagPendente(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pc.*, 
                                           a.nome as nome_aluno,
                                           a.email as email_aluno,
                                           p.nome as nome_plano
                                    FROM plano_comprado_t pc,
                                        plano_t p,
                                        aluno_t a
                                    WHERE 1=1
                                    AND pc.plano_id = p.id
                                    AND pc.aluno_id = a.id 
                                    AND status = "Pagamento pendente"
                                    ORDER BY criacao DESC');
                                    
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaCountAtivo(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT count(*) as qntd
                                    FROM plano_comprado_t
                                    WHERE 1=1 
                                    AND status = "Ativo"');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaAtivo(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pc.*, 
                                           a.nome as nome_aluno,
                                           a.email as email_aluno,
                                           p.nome as nome_plano
                                    FROM plano_comprado_t pc,
                                        plano_t p,
                                        aluno_t a
                                    WHERE 1=1
                                    AND pc.plano_id = p.id
                                    AND pc.aluno_id = a.id 
                                    AND status = "Ativo"
                                    ORDER BY criacao DESC');
                                    
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaCountSuspenso(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT count(*) as qntd
                                    FROM plano_comprado_t
                                    WHERE 1=1 
                                    AND status = "Suspenso"');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaSuspenso(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pc.*, 
                                           a.nome as nome_aluno,
                                           a.email as email_aluno,
                                           p.nome as nome_plano
                                    FROM plano_comprado_t pc,
                                        plano_t p,
                                        aluno_t a
                                    WHERE 1=1
                                    AND pc.plano_id = p.id
                                    AND pc.aluno_id = a.id 
                                    AND status = "Suspenso"
                                    ORDER BY criacao DESC');
                                    
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaCountCancelado(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT count(*) as qntd
                                    FROM plano_comprado_t
                                    WHERE 1=1 
                                    AND status = "Cancelado"');

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaCancelado(){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT pc.*, 
                                           a.nome as nome_aluno,
                                           a.email as email_aluno,
                                           p.nome as nome_plano
                                    FROM plano_comprado_t pc,
                                        plano_t p,
                                        aluno_t a
                                    WHERE 1=1
                                    AND pc.plano_id = p.id
                                    AND pc.aluno_id = a.id 
                                    AND status = "Cancelado"
                                    ORDER BY criacao DESC');
                                    
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaPlanoAtivo($aluno_id){
        $dados = array();
        
        $sql = $this->con->prepare('SELECT *
                                    FROM plano_comprado_t 
                                    WHERE aluno_id = :aluno_id 
                                    AND status = "Ativo"');
        $sql->bindValue(':aluno_id', $aluno_id);
        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function inserirPlanoComprado($criacao, $modificacao, $inicio_ciclo, $fim_ciclo, $valor, 
                                         $turno, $status, $aluno_id, $plano_id){
        
        $sql = $this->con->prepare('INSERT INTO plano_comprado_t (criacao, modificacao, inicio_ciclo, fim_ciclo, valor, 
                                    turno, status, aluno_id, plano_id)
                                    VALUES (:criacao, :modificacao, :inicio_ciclo, :fim_ciclo, :valor, 
                                    :turno, :status, :aluno_id, :plano_id)');
        $sql->bindValue(':criacao', $criacao); 
        $sql->bindValue(':modificacao', $modificacao); 
        $sql->bindValue(':inicio_ciclo', $inicio_ciclo); 
        $sql->bindValue(':fim_ciclo', $fim_ciclo);
        $sql->bindValue(':valor', $valor);  
        $sql->bindValue(':turno', $turno); 
        $sql->bindValue(':status', $status);
        $sql->bindValue(':aluno_id', $aluno_id);
        $sql->bindValue(':plano_id', $plano_id); 

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

    public function cancelarPlano($modificacao, $planoatual, $status){

        $sql = $this->con->prepare('UPDATE plano_comprado_t 
                                    SET modificacao = :modificacao, 
                                    status = :status 
                                    WHERE id = :id');

        $sql->bindValue(':id', $planoatual); 
        $sql->bindValue(':status', $status);  
        $sql->bindValue(':modificacao', $modificacao); 

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function alteraValorPlano($id, $valormensalidade){

        $sql = $this->con->prepare('UPDATE plano_t 
                                    SET modificacao = :modificacao, 
                                    valor_mensalidade = :valormensalidade 
                                    WHERE id = :id');

        date_default_timezone_set('America/Recife');
        $sql->bindValue(':modificacao', date("Y-m-d H:i:s")); 
        $sql->bindValue(':id', $id); 
        $sql->bindValue(':valormensalidade', $valormensalidade);  

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function alterarPlanoComprado($id, $valor, $turno){

        $sql = $this->con->prepare('UPDATE plano_comprado_t 
                                    SET modificacao = :modificacao, 
                                    valor = :valor,
                                    turno = :turno 
                                    WHERE id = :id');

        date_default_timezone_set('America/Recife');
        $sql->bindValue(':modificacao', date("Y-m-d H:i:s")); 
        $sql->bindValue(':id', $id); 
        $sql->bindValue(':valor', $valor);  
        $sql->bindValue(':turno', $turno);

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function selecionaPlanoPagavel($dataatual){

        $sql = $this->con->prepare('SELECT a.id id_aluno, 
                                        a.nome nome_aluno,
                                        a.email email_aluno,
                                        a.cpf cpf_aluno,
                                        plan.nome nome_plano,
                                        plan.periodicidade parcela_plano,
                                        pc.id id_pc,
                                        pc.criacao criacao_pc,
                                        pc.inicio_ciclo inicio_pc,
                                        pc.fim_ciclo fim_pc,
                                        pc.valor valor_pc,
                                        pc.turno turno_pc,
                                        pc.status status_pc
                                    FROM plano_comprado_t pc
                                    INNER JOIN plano_t plan ON plan.id = pc.plano_id
                                    INNER JOIN aluno_t a ON a.id = pc.aluno_id
                                    WHERE pc.fim_ciclo <= :dataatual
                                    AND pc.status NOT IN (:cancelado)
                                        
                                    UNION ALL
                                    
                                    SELECT a.id id_aluno, 
                                        a.nome nome_aluno,
                                        a.email email_aluno,
                                        a.cpf cpf_aluno,
                                        plan.nome nome_plano,
                                        plan.periodicidade parcela_plano,
                                        pc.id id_pc,
                                        pc.criacao criacao_pc,
                                        pc.inicio_ciclo inicio_pc,
                                        pc.fim_ciclo fim_pc,
                                        pc.valor valor_pc,
                                        pc.turno turno_pc,
                                        pc.status status_pc
                                    FROM plano_comprado_t pc
                                    INNER JOIN plano_t plan ON plan.id = pc.plano_id
                                    INNER JOIN aluno_t a ON a.id = pc.aluno_id
                                    WHERE pc.status IN (:pagpendente)');

        $sql->bindValue(':cancelado', 'Cancelado'); 
        $sql->bindValue(':pagpendente', 'Pagamento pendente');  
        $sql->bindValue(':dataatual', $dataatual);

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function selecionaPlanoPagavelPorNome($dataatual, $nome){

        $sql = $this->con->prepare('SELECT a.id id_aluno, 
                                        a.nome nome_aluno,
                                        a.email email_aluno,
                                        a.cpf cpf_aluno,
                                        plan.nome nome_plano,
                                        plan.periodicidade parcela_plano,
                                        pc.id id_pc,
                                        pc.criacao criacao_pc,
                                        pc.inicio_ciclo inicio_pc,
                                        pc.fim_ciclo fim_pc,
                                        pc.valor valor_pc,
                                        pc.turno turno_pc,
                                        pc.status status_pc
                                    FROM plano_comprado_t pc
                                    INNER JOIN plano_t plan ON plan.id = pc.plano_id
                                    INNER JOIN aluno_t a ON a.id = pc.aluno_id
                                    WHERE pc.fim_ciclo <= :dataatual
                                    AND pc.status NOT IN (:cancelado)
                                    AND a.nome LIKE :nome

                                    UNION ALL
                                    
                                    SELECT a.id id_aluno, 
                                        a.nome nome_aluno,
                                        a.email email_aluno,
                                        a.cpf cpf_aluno,
                                        plan.nome nome_plano,
                                        plan.periodicidade parcela_plano,
                                        pc.id id_pc,
                                        pc.criacao criacao_pc,
                                        pc.inicio_ciclo inicio_pc,
                                        pc.fim_ciclo fim_pc,
                                        pc.valor valor_pc,
                                        pc.turno turno_pc,
                                        pc.status status_pc
                                    FROM plano_comprado_t pc
                                    INNER JOIN plano_t plan ON plan.id = pc.plano_id
                                    INNER JOIN aluno_t a ON a.id = pc.aluno_id
                                    WHERE pc.status IN (:pagpendente)
                                    AND a.nome LIKE :nome');

        $sql->bindValue(':cancelado', 'Cancelado'); 
        $sql->bindValue(':pagpendente', 'Pagamento pendente');  
        $sql->bindValue(':dataatual', $dataatual);
        $sql->bindValue(':nome', "%$nome%");

        $sql->execute();
        $dados = $sql->fetchall();
        
        return $dados;
    }

    public function alterarPeriodoPlano($plano_comprado_id, $inicio_ciclo, $fim_ciclo){

        $sql = $this->con->prepare('UPDATE plano_comprado_t 
                                    SET modificacao = :modificacao, 
                                    inicio_ciclo = :inicio_ciclo,
                                    fim_ciclo = :fim_ciclo, 
                                    status = :ativo
                                    WHERE id = :id');

        date_default_timezone_set('America/Recife');
        $sql->bindValue(':modificacao', date("Y-m-d H:i:s"));  
        $sql->bindValue(':id', $plano_comprado_id); 
        $sql->bindValue(':inicio_ciclo', $inicio_ciclo);
        $sql->bindValue(':fim_ciclo', $fim_ciclo);
        $sql->bindValue(':ativo', 'Ativo');  

        $res = $sql->execute();

        if($res == 0){
            return false;
        }
        else{
            return true;
        }
    }
}