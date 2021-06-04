<main role="main" class="container" >
<body>

<?php 
    $relatorio = new Relatorio();
    
    if(isset($_POST['periodo'])){
      if($_POST['periodo'] == "Dia"){
        $dadosplano = $relatorio->cancelamentosDia();
      }
      else if($_POST['periodo'] == "Ano"){
        $dadosplano = $relatorio->cancelamentosAno();
      }
      else if($_POST['periodo'] == "Mes"){
        $dadosplano = $relatorio->cancelamentosMes();
      }
    }
    else{
      $dadosplano = $relatorio->cancelamentosDia();
    }
?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Relatório</h1>
    <p class="fs-4 text-muted">Quantidade de assinaturas canceladas por período e por plano</p>
</div>

<form action="http://localhost/guararapesnatacao/admin/cancelamentos" class="w-100 me-3" method="post">
    <div class="row">		
      <div class="col-md-2 mb-3">
        <select class="custom-select d-block w-100" id="periodo" name="periodo" required>
          <option value='Dia'>Dia</option>
          <option value='Mes'>Mês</option>
          <option value='Ano'>Ano</option>
        </select>
      </div>
      <div class="col-md-1 order-md-1">
          <button class="btn btn-primary btn btn-block" type="submit">Filtrar</button>
      </div>
    </div>
  </form>  
     <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Data de cancelamento</th>
          <th scope="col">Plano</th>
          <th scope="col">Quantidade</th>		  
        </tr>	
      <?php 
      foreach ($dadosplano as $dado){ ?>
        <tr>
          <td ><?php echo $dado["data_cancelamento"];?></td>  
          <td ><?php echo $dado["nome"];?></td>
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