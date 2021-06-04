<?php

class AdminController extends Controller{
    
    public function index() {
        $this->carregarTemplate('Adminbar', 'AdminConsultaAluno');
    }

    public function perfil() {
        $this->carregarTemplate('Adminbar', 'AdminPerfil');
    }

    public function cadastroaluno() {
        $this->carregarTemplate('Adminbar', 'Cadastro');
    }

    public function consultaaluno() {
        $this->carregarTemplate('Adminbar', 'AdminConsultaAluno');
    }

    public function cadastrofuncionario() {
        $this->carregarTemplate('Adminbar', 'AdminCadastro');
    }

    public function consultafuncionario() {
        $this->carregarTemplate('Adminbar', 'AdminConsultaFuncionario');
    }

    public function relatoriostatus() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioStatus');
    }

    public function alteraaluno() {
        $this->carregarTemplate('Adminbar', 'AdminAlteraAluno');
    }

    public function alterafuncionario() {
        $this->carregarTemplate('Adminbar', 'AdminAlteraFuncionario');
    }

    public function consultaplanocomprado() {
        $this->carregarTemplate('Adminbar', 'AdminConsultaPlano');
    }

    public function consultahistoricoplanos() {
        $this->carregarTemplate('Adminbar', 'AdminConsultaPlanoCancelado');
    }

    public function assinaplano() {
        $this->carregarTemplate('Adminbar', 'AdminAssinarPlano');
    }

    public function selecionaplanoaluno() {
        $this->carregarTemplate('Adminbar', 'AdminSelecionaPlano');
    }

    public function ajustevalorplano() {
        $this->carregarTemplate('Adminbar', 'AdminAjusteValorPlano');
    }

    public function consultapagamento() {
        $this->carregarTemplate('Adminbar', 'AdminConsultaPagamento');
    }

    public function mensagensnaorespondidas() {
        $this->carregarTemplate('Adminbar', 'AdminMensagemNaoRespondida');
    }

    public function mensagemaluno() {
        $this->carregarTemplate('Adminbar', 'AdminMensagensAluno');
    }

    public function enviarmensagem() {
        $this->carregarTemplate('Adminbar', 'AdminEnviaMensagem');
    }

    public function cadastropagamento() {
        $this->carregarTemplate('Adminbar', 'AdminCadastroPagamento');
    }

    public function somapagamentos() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioSomaPagamentos');
    }

    public function quantidadepagamentos() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioQuantidadePagamento');
    }

    public function quantidadeassinaturas() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioAssinaturas');
    }

    public function cancelamentos() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioCancelamentos');
    }

    public function alunosbairro() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioBairro');
    }

    public function alunosidade() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioIdade');
    }

    public function pagamentosesperados() {
        $this->carregarTemplate('Adminbar', 'AdminRelatorioPagamentosEsperados');
    }

    public function cadastraraluno(){
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
                window.location.replace('http://localhost/guararapesnatacao/admin/');
                </script>";
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao cadastrar aluno!');
                window.location.replace('http://localhost/guararapesnatacao/admin/cadastroaluno');
                </script>"; 
        }
    }

    public function cadastrarfuncionario(){
        $f = new Funcionario();
        
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
        $funcao = $_POST['funcao'];
        $admin = $_POST['admin'];
        $CEP = preg_replace( '/[^0-9]/is', '', $_POST['CEP']);
        $endereco = $_POST['rua'].', '.$_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $observacao = $_POST['observacoes'];

        $valid = $f->inserirFuncionario($criacao, $modificacao, $nome, $email, $senha, $telefone, $data_nascimento, 
        $funcao, $admin, $CPF, $RG, $CEP, $endereco, $bairro, $cidade, $estado, $observacao);

        if($valid == true){
            $dadosfuncionario = $f->selecionaLoginFuncionario2($email, $senha);
            
            if(isset($_FILES['fotoperfil'])){
                $ext = '.jpg';
                $dir = 'C:/xampp/htdocs/guararapesnatacao/upload/funcionarios/';
                move_uploaded_file($_FILES['fotoperfil']['tmp_name'], $dir.$dadosfuncionario[0]['id'].$ext);
            }

            echo "<script>
            alert('Funcionário cadastrado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/admin/consultafuncionario');
                </script>";
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao cadastrar funcionário!');
                window.location.replace('http://localhost/guararapesnatacao/admin/cadastrofuncionario');
                </script>"; 
        }
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
        $funcao = $_POST['funcao'];
        $observacao = $_POST['observacoes'];

        $f = new Funcionario();
        $valid = $f->alteraPerfil($nome, $id, $telefone, $CEP, $endereco, $bairro, $cidade, $estado, $funcao, $observacao);

        if($valid == true){
            echo "<script>
            alert('Perfil alterado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/admin/perfil');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao alterar perfil!');
                window.location.replace('http://localhost/guararapesnatacao/admin/perfil');
                </script>"; 
        } 
    }

    public function excluir(){
        $id = $_SESSION['id'];

        $f = new Funcionario();
        $valid = $f->deletePerfil($id);

        if($valid == true){
            echo "<script> alert('Perfil excluido com sucesso!'); </script>"; 
            $this->logout();
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao excluir perfil!');
                window.location.replace('http://localhost/guararapesnatacao/admin');
                </script>"; 
        } 
    }

    public function excluirAluno(){
        $url = explode('/', $_GET['pag']);
        $id = end($url);

        $a = new Aluno();
        $valid = $a->deletePerfil($id);

        if($valid == true){
            echo "<script> 
            alert('Aluno excluido com sucesso!'); 
                window.location.replace('http://localhost/guararapesnatacao/admin');
                </script>";                
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao excluir aluno!');
                window.location.replace('http://localhost/guararapesnatacao/admin');
                </script>"; 
        } 
    }
    
    public function alteraCadastroAluno(){
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
            alert('Cadastro de aluno alterado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/admin/consultaaluno');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao alterar cadastro de aluno!');
                window.location.replace('http://localhost/guararapesnatacao/admin/consultaaluno');
                </script>"; 
        } 
    }

    public function alteraCadastroFuncionario(){
        $nome = $_POST['nome'];
        $id = $_POST['idaltera'];
        $telefone = $_POST['telefone'];
        $CEP = preg_replace( '/[^0-9]/is', '', $_POST['CEP']);
        $endereco = $_POST['rua'].', '.$_POST['numero'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $funcao = $_POST['funcao'];
        $observacao = $_POST['observacoes'];

        $f = new Funcionario();
        $valid = $f->alteraPerfil($nome, $id, $telefone, $CEP, $endereco, $bairro, $cidade, $estado, $funcao, $observacao);

        if($valid == true){
            echo "<script>
            alert('Cadastro de funcionário alterado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/admin/consultafuncionario');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao alterar cadastro de funcionário!');
                window.location.replace('http://localhost/guararapesnatacao/admin/consultafuncionario');
                </script>"; 
        } 
    }

    public function excluirFuncionario(){
        $url = explode('/', $_GET['pag']);
        $id = end($url);

        $f = new Funcionario();
        $valid = $f->deletePerfil($id);

        if($valid == true){
            if($_SESSION['id'] != $id){
                echo "<script> alert('Funcionário excluido com sucesso!'); 
                window.location.replace('http://localhost/guararapesnatacao/admin');
                </script>";                
            }
            else{
                echo "<script> alert('Funcionário excluido com sucesso!'); </script>"; 
                $this->logout();
            }
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao excluir funcionário!');
                window.location.replace('http://localhost/guararapesnatacao/admin');
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

    public function assinarPlanoAluno(){
        $p = new Plano();
        $a = new Aluno();

        date_default_timezone_set('America/Recife');
        $date = new DateTime(date('Y-m-d'));

        $url = explode('/', $_GET['pag']);
        $clienteplanoid = end($url);

        $url2 = explode('@', $clienteplanoid);
        $aluno_id = $url2[0];
        $plano_id = $url2[1];

        $dadosplano = $p->selecionaPlano($plano_id);
        $dadosaluno = $a->selecionaAluno($aluno_id);

        $nomeaux = explode(' ', $dadosaluno['nome']);
        $nome = ucfirst($nomeaux[0]);

        $criacao = date("Y-m-d H:i:s");
        $modificacao = date("Y-m-d H:i:s");
        $inicio_ciclo = date("Y-m-d");
        $aux = 'P'.$dadosplano[0]['periodicidade'].'M';
        $date->add(new DateInterval($aux));
        $fim_ciclo = $date->format('Y-m-d');
        $valor = $dadosplano[0]['valor_mensalidade']*$dadosplano[0]['periodicidade'];
        $turno = $_POST['turno'];
        $status = 'Pagamento pendente';

        $permissao = $p->verificarPlano($aluno_id);

        if($permissao[0]['qntd'] == 0){
            $valid = $p->inserirPlanoComprado($criacao, $modificacao, $inicio_ciclo, $fim_ciclo, $valor, $turno, $status, $aluno_id, $plano_id);
            
            if($valid == true){
                $email = $dadosaluno['email'];
                $assunto = "Guararapes Natação - Você contratou o plano ".lcfirst($dadosplano[0]['nome']);
                $mensagem = "Oi ".$nome.",\n\nObrigado por contratar o plano ".lcfirst($dadosplano[0]['nome'])."!\n\nSeu plano se encontra pendente de pagamento, para ativa-lo é necessário que realize o pagamento da sua mensalidade de forma presencial em nossa unidade.\n\nA cobrança no valor de R$".number_format((float)($dadosplano[0]['valor_mensalidade']*$dadosplano[0]['periodicidade']), 2, ',', '')." pode ser realizada de forma à vista ou parcelada em até ".$dadosplano[0]['periodicidade']."x no cartão de crédito.\n\nPara mais informações, favor entrar em contato conosco por meio de mensagem via site.\n\nAtenciosamente,\nGuararapes Natação";
                $autor = "From: Guararapes Natação";

                if (mail($email, utf8_decode($assunto), $mensagem, $autor)) {
                    echo "<script>
                    alert('Plano assinado com sucesso! Enviamos um e-mail para você com mais informações.');
                        window.location.replace('http://localhost/guararapesnatacao/admin/consultaplanocomprado');
                        </script>"; 
                } else {
                    echo "<script>
                    alert('Plano assinado com sucesso mas houve um erro no envio do e-mail.');
                        window.location.replace('http://localhost/guararapesnatacao/admin/assinaplano');
                        </script>";
                }
            }
            else if($valid == false){
                echo "<script>
                alert('Erro ao assinar plano. Favor tente novamente mais tarde.');
                    window.location.replace('http://localhost/guararapesnatacao/admin/assinaplano');
                    </script>"; 
            }
        }
        
        else if($permissao[0]['qntd'] > 0){
            echo "<script>
            alert('Você já possui um plano ativo! É necessário cancelar o anterior antes de contratar um novo.');
                window.location.replace('http://localhost/guararapesnatacao/admin/assinaplano');
                </script>"; 
        }
    }

    public function alterarValorPlano(){
        $id = $_POST['id_alt'];
        $valormensal = $_POST['valormensal'];

        $p = new Plano();
        $valid = $p->alteraValorPlano($id, $valormensal);

        if($valid == true){
            echo "<script>
            alert('Ajuste do valor do plano realizado com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/admin/ajustevalorplano');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao realizar ajuste no valor do plano!');
                window.location.replace('http://localhost/guararapesnatacao/admin/ajustevalorplano');
                </script>"; 
        } 
    }

    public function enviaMensagemAdmin(){
        date_default_timezone_set('America/Recife');
        $m = new Mensagem();
        $a = new Aluno();

        $criacao = date("Y-m-d H:i:s");
        $modificacao = date("Y-m-d H:i:s");
        $autor = 'Guararapes Natação';
        $texto = $_POST['texto'];
        $aluno_id = $_POST['id_aluno'];

        $dadosaluno = $a->selecionaAluno($aluno_id);
        $valid = $m->inserirMensagem($criacao, $modificacao, $autor, $texto, $aluno_id);
        
        $nomeaux = explode(' ', $dadosaluno['nome']);
        $nome = ucfirst($nomeaux[0]);

        if(!empty($dadosaluno)){
            if($valid == true){
                $email = $dadosaluno['email'];
                $assunto = "Guararapes Natação - Você recebeu uma mensagem";
                $mensagem = "Oi ".$nome.",\n\nVocê recebeu uma mensagem!\n\nPara ler, favor acessar nosso site na aba de Mensagens.\n\nAtenciosamente,\nGuararapes Natação";
                $autor = "From: Guararapes Natação";

                if (mail($email, utf8_decode($assunto), $mensagem, $autor)) {
                    echo "<script>
                    alert('Mensagem enviada. Um e-mail foi enviado para o aluno comunicando a resposta.');
                        window.location.replace('http://localhost/guararapesnatacao/admin/mensagemaluno/$aluno_id');
                        </script>"; 
                } else {
                    echo "<script>
                    alert('Mensagem enviada, porém ocorreu um erro ao enviar e-mail comunicando a resposta ao aluno.');
                        window.location.replace('http://localhost/guararapesnatacao/admin/mensagemaluno/$aluno_id');
                        </script>";
                }
            }
            else if($valid == false){
                echo "<script>
                alert('Erro ao enviar mensagem.');
                    window.location.replace('http://localhost/guararapesnatacao/admin/mensagemaluno/$aluno_id');
                    </script>"; 
            }
        }
        
        else{
            echo "<script>
            alert('Erro ao enviar mensagem.');
                window.location.replace('http://localhost/guararapesnatacao/admin/mensagemaluno/$aluno_id');
                </script>";  
        } 
    }

    public function alterarplanocomprado(){
        if(!empty($_POST['Cancelar'])){
            date_default_timezone_set('America/Recife');
            $modificacao = date("Y-m-d H:i:s");
            $id = $_POST['id_alt'];

            $p = new Plano();
            $valid = $p->cancelarPlano($modificacao, $id, 'Cancelado');
    
            if($valid == true){
                echo "<script>
                alert('Plano cancelado com sucesso!');
                    window.location.replace('http://localhost/guararapesnatacao/admin/consultaplanocomprado');
                    </script>"; 
            }
            else if($valid == false){
                echo "<script>
                alert('Erro ao cancelar plano!');
                    window.location.replace('http://localhost/guararapesnatacao/admin/consultaplanocomprado');
                    </script>"; 
            }
        }
        else{
            $id = $_POST['id_alt'];
            $valortotal = $_POST['valortotal'];
            $turno = $_POST['turno'];
    
            $p = new Plano();
            $valid = $p->alterarPlanoComprado($id, $valortotal, $turno);
    
            if($valid == true){
                echo "<script>
                alert('Plano alterado com sucesso!');
                    window.location.replace('http://localhost/guararapesnatacao/admin/consultaplanocomprado');
                    </script>"; 
            }
            else if($valid == false){
                echo "<script>
                alert('Erro ao alterar plano!');
                    window.location.replace('http://localhost/guararapesnatacao/admin/consultaplanocomprado');
                    </script>"; 
            }
        }        
    }

    public function cadastrarPagamento(){
        date_default_timezone_set('America/Recife');
        $date = new DateTime(date('Y-m-d'));

        $pag = new Pagamento();
        $plan = new Plano();
        $a = new Aluno();

        $criacao = date("Y-m-d H:i:s");
        $modificacao = date("Y-m-d H:i:s");
        $inicio_ciclo = date("Y-m-d");
        $inicio_ciclo_ajuste = date("d/m/Y");
        $aux = 'P'.$_POST['periodicidade'].'M';
        $date->add(new DateInterval($aux));
        $fim_ciclo = $date->format('Y-m-d');
        $fim_ciclo_ajuste = $date->format('d/m/Y');
        
        $formapagamento = $_POST['formapagamento'];
        $valor = $_POST['valortotal'];
        
        if($formapagamento == 'Cartão de crédito'){
            $parcela = $_POST['parcela'];
        }
        else{
            $parcela = 1;
        }
        
        $periodicidade = $_POST['periodicidade'];
        $nome_plano = lcfirst($_POST['nome_plano']);
        $aluno_id = $_POST['id_aluno'];
        $plano_comprado_id = $_POST['id_pc'];

        $dadosaluno = $a->selecionaAluno($aluno_id);

        $nomeaux = explode(' ', $dadosaluno['nome']);
        $nome = ucfirst($nomeaux[0]);
        $valorajustado = 'R$'.number_format((float)$valor, 2, ',', '');

        if(!empty($dadosaluno)){
            $insert_pag = $pag->inserirPagamento($criacao, $modificacao, $formapagamento, $valor, $parcela, $aluno_id, $plano_comprado_id);
            
            if($insert_pag == true){
                $update_pc = $plan->alterarPeriodoPlano($plano_comprado_id, $inicio_ciclo, $fim_ciclo);

                if($update_pc == true){
                    $email = $dadosaluno['email'];
                    $assunto = "Guararapes Natação - Você realizou um pagamento";
                    $mensagem = "Oi ".$nome.",\n\nRecebemos seu pagamento do plano ".$nome_plano."!\n\nA cobrança foi realizada via ".lcfirst($formapagamento)." no valor de ".$valorajustado." em ".$parcela."x.\n\nEsse pagamento é referente ao período entre os dias ".$inicio_ciclo_ajuste." e ".$fim_ciclo_ajuste."."."\n\nAtenciosamente,\nGuararapes Natação";
                    $autor = "From: Guararapes Natação";

                    if (mail($email, utf8_decode($assunto), $mensagem, $autor)) {
                        echo "<script>
                        alert('Pagamento realizado. Um e-mail foi enviado para o aluno informando os detalhes do pagamento.');
                            window.location.replace('http://localhost/guararapesnatacao/admin/consultapagamento');
                            </script>"; 
                    } 
                    else {
                        echo "<script>
                        alert('Pagamento realizado, porém ocorreu um erro ao enviar e-mail comunicando os detalhes do pagamento ao aluno.');
                            window.location.replace('http://localhost/guararapesnatacao/admin/consultapagamento');
                            </script>";
                    } 
                }
                else if($update_pc == false){
                    echo "<script>
                    alert('Pagamento realizado mas ocorreu um erro no ajuste do período de uso do cliente! É necessário ajuste!');
                        window.location.replace('http://localhost/guararapesnatacao/admin/consultapagamento');
                        </script>"; 
                }
            }
            else if($insert_pag == false){
                echo "<script>
                alert('Erro ao realizar pagamento!');
                    window.location.replace('http://localhost/guararapesnatacao/admin/cadastropagamento');
                    </script>"; 
            }
        }
        else{
            echo "<script>
            alert('Erro ao realizar pagamento.');
                window.location.replace('http://localhost/guararapesnatacao/admin/cadastropagamento');
                </script>";  
        } 
    }

    public function alterarSenhaAluno(){
        $url = explode('/', $_GET['pag']);
        $id = end($url);

        $senha = md5($_POST['senha']);
        
        $a = new Aluno();
        $valid = $a->resetaSenha($id, $senha);

        if($valid == true){
            echo "<script>
            alert('Senha alterada com sucesso!');
                window.location.replace('http://localhost/guararapesnatacao/admin/consultaaluno');
                </script>"; 
        }
        else if($valid == false){
            echo "<script>
            alert('Erro ao atualizar senha!');
                window.location.replace('http://localhost/guararapesnatacao/admin/consultaaluno');
                </script>"; 
        }
    }
}