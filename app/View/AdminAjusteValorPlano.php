<?php 
	$p = new Plano();

    $planos = $p->selecionaTodos();
?>

<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Ajustar valor dos planos</h1>
    <p class="fs-4 text-muted">Altere o valor cobrado dos planos existentes</p>
  </div>
<body>
    <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Plano</th>
          <th scope="col">Período</th>
          <th scope="col">Valor mensal</th>
          <th scope="col">Valor total</th>	  
          <th scope="col"> </th>		  
        </tr>	
      <?php 
      foreach ($planos as $dado){ 
          
      $aux2 = $dado["valor_mensalidade"] * $dado["periodicidade"];
          ?>
        <tr>
          <td ><?php echo $dado["nome"];?></td>
          <td ><?php if($dado["periodicidade"] == 1){$aux = 'mês';}else{$aux = 'meses';} echo $dado["periodicidade"].' '.$aux;?></td>
          <td ><?php echo 'R$'.number_format((float)$dado["valor_mensalidade"], 2, ',', '');?></td>
          <td ><?php echo 'R$'.number_format((float)$aux2, 2, ',', '');?></td>
          <td >
            <a href="http://localhost/guararapesnatacao/admin/alterarValorPlano" data-toggle="modal" data-target="#exampleModal<?php echo $dado["id"];?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg>
            </a>

            <div class="modal fade" id="exampleModal<?php echo $dado["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $dado["id"];?>" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel<?php echo $dado["id"];?>">Altere o valor do plano <?php echo lcfirst($dado["nome"]);?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<div class="file-loading">
          <form action="http://localhost/guararapesnatacao/admin/alterarValorPlano" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-md-4 order-md-1">
          <label for="valormensal">Valor mensal: </label>
          <input type="number" class="form-control" id="valormensal" name="valormensal" required>
             <div class="invalid-feedback">
                O preenchimento do campo "Valor mensal" é obrigatório
             </div>
        </div>
          <input type="hidden" name='id_alt' value="<?php echo $dado["id"];?>"> 
        <br>
          </div>
		  </div>
          </div>
				  <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Alterar</button>
				  </div>
				</div>
			  </div>
      </form>
			</div>
			</div>

          </td>
        </tr>
      <?php } ?>
    </table>    
    </body>

    

<script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>