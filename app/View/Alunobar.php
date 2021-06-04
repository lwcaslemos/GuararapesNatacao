<!doctype html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="http://localhost/guararapesnatacao/css/style/imagens/Icon.png">
        <title>Área do aluno - <?php echo ucfirst($_SESSION['nome']) ?></title>
        <link href="http://localhost/guararapesnatacao/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/guararapesnatacao/css/style/navbar style.css" rel="stylesheet">
    </head>

    <header>
        <nav class="navbar navbar-expand-md navbar fixed-top flex-md-nowrap p-0 shadow">
            <a class="navbar-left" href="http://localhost/guararapesnatacao">
            <img alt="Brand" src="http://localhost/guararapesnatacao/css/style/imagens/Icon.png" class="img-responsive">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/guararapesnatacao/aluno/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/guararapesnatacao/aluno/perfil">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/guararapesnatacao/aluno/pagamentos">Pagamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/guararapesnatacao/aluno/agendamento">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/guararapesnatacao/aluno/mensagens">Mensagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/guararapesnatacao/aluno/assine">Assine</a>
                    </li>
                </ul>
            
                <ul class="navbar-nav right-auto"> 
                    <li class="nav-item" id="lidireita">
                        <img class="rounded-circle" src="http://localhost/guararapesnatacao/upload/alunos/<?php echo $_SESSION['id'].'.jpg'?>" alt="image" width="37" height="37">
                    </li>
                    <li class="nav-item dropdown" id="lidireita">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['nome'])?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="http://localhost/guararapesnatacao/aluno/logout">Sair</a>
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