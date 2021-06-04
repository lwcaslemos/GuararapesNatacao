<?php

class AlunoController extends Controller{
    
    public function index(){
        $this->carregarTemplate('Alunobar', 'SelecionaPlano');
    }

    public function perfil(){
        $this->carregarTemplate('Alunobar', 'Perfil');
    }

    public function assine(){
        $this->carregarTemplate('Alunobar', 'SelecionaPlano');
    }

    public function pagamentos(){
        $this->carregarTemplate('Alunobar', 'Pagamentos');
    }

    public function agendamento(){
        $this->carregarTemplate('Alunobar', 'Agendamentos');
    }

    public function mensagens(){
        $this->carregarTemplate('Alunobar', 'Mensagens');
    }

    public function home(){
        $this->carregarTemplate('Alunobar', 'AlunoHome');
    }

    public function salvarAlteracoes(){
        $nome = $_POST['nome'];
        $id = $_POST['idaltera'];
        $telefone = $_POST['telefone'];
        $CEP = preg_replace( '/[^0-9]/is', '', $_POST['CEP']);
        $endereco = $_POST['rua'].', '.$_POST['numero'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $observacao = $_POST['observacoes'];

        $u = new Aluno();
        $valid = $u->alteraPerfil($nome, $id, $telefone, $CEP, $endereco, $bairro, $cidade, $estado, $observacao);

        if($valid == true){
            echo "<script>
            alert('Perfil alterado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/aluno');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao alterar perfil!');
                window.location.replace('http://localhost/guararapesnatacao/aluno');
                </script>"; 
        } 
    }

    public function excluir(){
        $id = $_SESSION['id'];

        $u = new Aluno();
        $valid = $u->deletePerfil($id);

        if($valid == true){
            echo "<script> alert('Perfil excluido com sucesso!'); </script>"; 
            $this->logout();
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao excluir perfil!');
                window.location.replace('http://localhost/guararapesnatacao/aluno');
                </script>"; 
        } 
    }

    public function logout(){
        unset($_SESSION['email']);
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        session_destroy();

        echo "<script>
            window.location.replace('http://localhost/guararapesnatacao');
        </script>"; 
    }

    public function assinar(){
        $p = new Plano();
        
        date_default_timezone_set('America/Recife');
        $date = new DateTime(date('Y-m-d'));

        $url = explode('/', $_GET['pag']);
        $plano_id = end($url);
        $dadosplano = $p->selecionaPlano($plano_id);

        $criacao = date("Y-m-d H:i:s");
        $modificacao = date("Y-m-d H:i:s");
        $inicio_ciclo = date("Y-m-d");
        $aux = 'P'.$dadosplano[0]['periodicidade'].'M';
        $date->add(new DateInterval($aux));
        $fim_ciclo = $date->format('Y-m-d');
        $valor = $dadosplano[0]['valor_mensalidade']*$dadosplano[0]['periodicidade'];
        $turno = $_POST['turno'];
        $status = 'Pagamento pendente';
        $aluno_id = $_SESSION['id'];

        $permissao = $p->verificarPlano($_SESSION['id']);

        if($permissao[0]['qntd'] == 0){
            $valid = $p->inserirPlanoComprado($criacao, $modificacao, $inicio_ciclo, $fim_ciclo, $valor, $turno, $status, $aluno_id, $plano_id);
            
            if($valid == true){
                $email = $_SESSION['email'];
                $assunto = "Guararapes Natação - Você contratou o plano ".lcfirst($dadosplano[0]['nome']);
                $mensagem = "Oi ".$_SESSION['nome'].",\n\nObrigado por contratar o plano ".lcfirst($dadosplano[0]['nome'])."!\n\nSeu plano se encontra pendente de pagamento, para ativa-lo é necessário que realize o pagamento da sua mensalidade de forma presencial em nossa unidade.\n\nA cobrança no valor de R$".number_format((float)($dadosplano[0]['valor_mensalidade']*$dadosplano[0]['periodicidade']), 2, ',', '')." pode ser realizada de forma à vista ou parcelada em até ".$dadosplano[0]['periodicidade']."x no cartão de crédito.\n\nPara mais informações, favor entrar em contato conosco por meio de mensagem via site.\n\nAtenciosamente,\nGuararapes Natação";
                $autor = "From: Guararapes Natação";

                if (mail($email, utf8_decode($assunto), $mensagem, $autor)) {
                    echo "<script>
                    alert('Plano assinado com sucesso! Enviamos um e-mail para você com mais informações.');
                        window.location.replace('http://localhost/guararapesnatacao/aluno');
                        </script>"; 
                } else {
                    echo "<script>
                    alert('Plano assinado com sucesso mas houve um erro no envio do e-mail. Favor entrar em contato conosco via mensagem para mais informações.');
                        window.location.replace('http://localhost/guararapesnatacao/aluno');
                        </script>"; 
                }
            }
            else if($valid == false){
                echo "<script>
                alert('Erro ao assinar plano. Favor tente novamente mais tarde.');
                    window.location.replace('http://localhost/guararapesnatacao/aluno/assine');
                    </script>"; 
            }
        }
        
        else if($permissao[0]['qntd'] > 0){
            echo "<script>
            alert('Você já possui um plano ativo! É necessário cancelar o anterior antes de contratar um novo.');
                window.location.replace('http://localhost/guararapesnatacao/aluno/home');
                </script>"; 
        }
    }

    public function agendarAula(){
        date_default_timezone_set('America/Recife');
        $a = new Agendamento();

        $criacao = date("Y-m-d H:i:s");
        $modificacao = date("Y-m-d H:i:s");
        $data = $_POST['data_agendamento'];
        $hora = $_POST['hora_agendamento'];
        $aluno_id = $_SESSION['id'];
        $plano_comprado_id = $_POST['plano_comprado_id'];    
        
        $aux = $a->validaAgendamentos($data, $plano_comprado_id);

        if($data > date("Y-m-d")){
            if(empty($aux)){
                $valid = $a->inserirAgendamento($criacao, $modificacao, $data, $hora, $aluno_id, $plano_comprado_id);

                if($valid == true){
                    echo "<script>
                    alert('Aula agendada com sucesso!');
                        window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                        </script>";
                }
                else if($valid == false){
                    echo "<script>
                    alert('Erro ao agendar aula!');
                        window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                        </script>"; 
                } 
            }
            else{
                echo "<script>
                alert('Você já possui uma aula agendada para esse dia!');
                    window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                    </script>"; 
            }
        }
        else{
            echo "<script>
            alert('Não é possível agendar aulas para o mesmo dia ou para dias já passados!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                </script>"; 
        }


    }

    public function alteraAgendamento(){
        date_default_timezone_set('America/Recife');
        $a = new Agendamento();

        $id = $_POST['id_alt'];
        $data = $_POST['data_alt'];
        $hora = $_POST['hora_alt'];

        if($data >= date("Y-m-d")){
            $valid = $a->alteraAgendamento($id, $data, $hora);
            
            if($valid == true){
                echo "<script>
                alert('Agendamento alterado com sucesso!');
                    window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                    </script>"; 
            }
            else if($valid == false){
                echo "<script>
                alert('Erro ao alterar agendamento!');
                    window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                    </script>"; 
            }
        }
        else{
            echo "<script>
            alert('Erro ao alterar, selecione uma data válida!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                </script>"; 
        } 
    }

    public function removeAgendamento(){
        $url = explode('/', $_GET['pag']);
        $id = end($url);

        $a = new Agendamento();
        $valid = $a->deletaAgendamento($id);

        if($valid == true){
            echo "<script>
            alert('Agendamento excluído com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao excluir agendamento!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/agendamento');
                </script>"; 
        } 
    }

    public function enviaMensagemAluno(){
        date_default_timezone_set('America/Recife');
        $m = new Mensagem();

        $criacao = date("Y-m-d H:i:s");
        $modificacao = date("Y-m-d H:i:s");
        $autor = 'Aluno';
        $texto = $_POST['texto'];
        $aluno_id = $_SESSION['id'];
        
        $valid = $m->inserirMensagem($criacao, $modificacao, $autor, $texto, $aluno_id);

        if($valid == true){
            echo "<script>
            alert('Mensagem enviada com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/mensagens');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao enviar mensagem!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/mensagens');
                </script>"; 
        } 
    }

    public function cancelaPlano(){   
        date_default_timezone_set('America/Recife');
        $p = new Plano();

        $modificacao = date("Y-m-d H:i:s");
        $planoatual = $_POST['id_alt'];
        $status = 'Cancelado';

        $valid = $p->cancelarPlano($modificacao, $planoatual, $status);

        if($valid == true){
            echo "<script>
            alert('Plano cancelado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/home');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao cancelar plano!');
                window.location.replace('http://localhost/guararapesnatacao/aluno/home');
                </script>"; 
        } 
    }
}