<!doctype html>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="icon" href="http://localhost/guararapesnatacao/css/style/imagens/Icon.png">
    <title>Guararapes Natação</title>
    <link href="http://localhost/guararapesnatacao/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/guararapesnatacao/css/style/Homepage usuario style.css" rel="stylesheet">   
  </head>

  <header>
    <nav class="navbar navbar fixed-top bg-white flex-md-nowrap p-0 shadow">
      <a href="http://localhost/guararapesnatacao/home">
      <img class="rounded-circle" src="http://localhost/guararapesnatacao/css/style/imagens/Icon.png" alt="image" width="100" height="48">	   
      </a> 
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="http://localhost/guararapesnatacao/login">Faça seu login</a>
        </li>
      </ul>
    </nav>
  </header>
	
	<body class="bg-light"> 
    <?php $this->carregarView($view, $model); ?> 
  </body>
	
  <footer class="container">
    <p class="float-right"><a href="#">Volte ao topo</a></p>
    <p>&copy; Guararapes Natação &middot;
  </footer>
	
  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
  <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
  <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
</html>