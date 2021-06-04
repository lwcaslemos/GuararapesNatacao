<main role="main" class="container" >
<body>

<?php 
    $relatorio = new Relatorio();

    $dadosplano = $relatorio->alunosPorBairro(); 
?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Relatório</h1>
    <p class="fs-4 text-muted">Quantidade de alunos cadastrados por bairro</p>
</div>
 
     <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Bairro</th>
          <th scope="col">Cidade</th>
          <th scope="col">Quantidade</th>		  
        </tr>	
      <?php 
      foreach ($dadosplano as $dado){ ?>
        <tr>
          <td ><?php echo $dado["bairro"];?></td>  
          <td ><?php echo $dado["cidade"];?></td>
          <td ><?php echo $dado["quantidade"];?></td>
        </tr>
      <?php } ?>
    </table>
        

</body>
</main>
  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/holder.min.js"></script>
    <script>