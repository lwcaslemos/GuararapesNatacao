<!doctype html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="http://localhost/guararapesnatacao/css/style/imagens/Icon.png">
        <title>Área do admin - <?php echo ucfirst($_SESSION['nome']) ?></title>
        <link href="http://localhost/guararapesnatacao/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/guararapesnatacao/css/style/navbar style.css" rel="stylesheet">
    </head>

    <header>
        <nav class="navbar navbar-expand-md navbar fixed-top flex-md-nowrap p-0 shadow">
            <a class="navbar-left" href="http://localhost/guararapesnatacao/admin">
            <img alt="Brand" src="http://localhost/guararapesnatacao/css/style/imagens/Icon.png" class="img-responsive">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/guararapesnatacao/admin/perfil">Perfil</a>
                    </li>
                    <li class="nav-item dropdown" id="usuario">
                        <a class="nav-link dropdown-toggle" href="#" id="usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuários</a>
                        <div class="dropdown-menu" aria-labelledby="usuario">
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/cadastroaluno">Cadastrar aluno</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/consultaaluno">Consultar aluno</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/cadastrofuncionario">Cadastrar funcionário</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/consultafuncionario">Consultar funcionário</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" id="planos">
                        <a class="nav-link dropdown-toggle" href="#" id="planos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Planos</a>
                        <div class="dropdown-menu" aria-labelledby="planos">
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/assinaplano">Assinar plano</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/consultaplanocomprado">Consultar plano atual</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/consultahistoricoplanos">Histórico de planos comprados</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/ajustevalorplano">Ajustar valores dos planos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" id="pagamentos">
                        <a class="nav-link dropdown-toggle" href="#" id="pagamentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pagamentos</a>
                        <div class="dropdown-menu" aria-labelledby="pagamentos">
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/cadastropagamento">Cadastrar pagamento</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/consultapagamento">Consultar pagamento</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" id="mensagens">
                        <a class="nav-link dropdown-toggle" href="#" id="mensagens" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mensagens</a>
                        <div class="dropdown-menu" aria-labelledby="mensagens">
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/enviarmensagem">Enviar mensagem</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/mensagensnaorespondidas">Mensagens não respondidas</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" id="relatorios">
                        <a class="nav-link dropdown-toggle" href="#" id="relatorios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios</a>
                        <div class="dropdown-menu" aria-labelledby="relatorios">
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/relatoriostatus/ativo">Clientes ativos</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/relatoriostatus/suspenso">Clientes suspensos</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/relatoriostatus/pagamentopendente">Clientes pendentes</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/relatoriostatus/cancelado">Clientes cancelados</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/alunosbairro">Alunos por bairro</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/alunosidade">Alunos por idade</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/cancelamentos">Alunos cancelados</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/quantidadeassinaturas">Planos assinados</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/pagamentosesperados">Pagamentos esperados</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/quantidadepagamentos">Pagamentos recebidos</a>
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/somapagamentos">Pagamentos recebidos (Valor total)</a>                        
                        </div>
                    </li>
                </ul>
            
                <ul class="navbar-nav right-auto"> 
                    <li class="nav-item" id="lidireita">
                        <img class="rounded-circle" src="http://localhost/guararapesnatacao/upload/funcionarios/<?php echo $_SESSION['id'].'.jpg'?>" alt="image" width="37" height="37">
                    </li>
                    <li class="nav-item dropdown" id="lidireita">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['nome'])?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/admin/logout">Sair</a>
                        </div>
                    </li>
                </ul>
                
            </div>
        </nav>
    </header>
	
        <body class="bg-light">
            <?php $this->carregarView($view, $model); ?> 
        </body>
</html>
	
    

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
	
  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
  <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
  <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript"> google.load("jquery", "1.4.2");</script>