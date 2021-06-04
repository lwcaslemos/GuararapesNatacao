<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="http://localhost/guararapesnatacao/css/style/imagens/Icon.png">
    
    <title>Login</title>
    
    <link href="http://localhost/guararapesnatacao/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/guararapesnatacao/css/style/Login style.css" rel="stylesheet">
  </head>

  <body class="text-center bg-light">
    <form class="form-signin" action="http://localhost/guararapesnatacao/login/validaLogin" method="post">
      <a href="http://localhost/guararapesnatacao/home">
        <img class="rounded-circle" src="http://localhost/guararapesnatacao/css/style/imagens/Icon.png" alt="Generic placeholder image" width="65" height="65">
	    </a> 
	    <br><br><h1 class="h3 mb-3 font-weight-normal">Faça seu login</h1>
        <label for="email" class="sr-only">Email:</label>
        <input type="text" id="email" name="email" class="form-control" maxlength="40" placeholder="E-mail" required autofocus>
	      <label for="senha" class="sr-only">Senha:</label>
        <input type="password" id="senha" name="senha" class="form-control" maxlength="40" placeholder="Senha" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Lembre-me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	      <br><a href="http://localhost/guararapesnatacao/login/cadastro">Não é cadastrado? Cadastre-se!</a>
        <p class="mt-5 mb-3 text-muted">&copy; Guararapes Natação</p>
    </form>
  </body>
</html>