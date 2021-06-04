<?php 
	$p = new Pagamento();

	if(isset($_POST['buscar'])){
		$busca = $_POST['buscar'];

		$pagamentos = $p->selecionaPagamentoPorNome($busca);
	}
	else{
		$pagamentos = $p->selecionaTodos();
	}
?>

<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Consulta de pagamentos</h1>
    <p class="fs-4 text-muted">Buscar pagamentos pelo nome</p>
  </div>
<body>
	<div class="container topo">
		<div class="form-group">
			<div class="input-group">
			<form action="http://localhost/guararapesnatacao/admin/consultapagamento" class="w-100 me-3" method="post">
				<input type="search" name="buscar" id="buscar" placeholder="Digite o nome" class="form-control" />
			</form>
			</div>
		</div>
		<div>
			<div id="resultado">
		    <table class="table table-bordered border-primary table-sm">
                <tr >	
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Plano</th>
                <th scope="col">Data do pagamento</th>
                <th scope="col">Forma de pagamento</th>
                <th scope="col">Valor</th>
                <th scope="col">Parcela(s)</th>		  
                </tr>	
            <?php 
            foreach ($pagamentos as $dado){ ?>
                <tr>
                <td ><?php echo $dado["nome_aluno"];?></td>
                <td ><?php echo $dado["email_aluno"];?></td>
                <td ><?php echo $dado["nome_plano"];?></td>
                <td ><?php $data = new DateTime($dado["criacao"]); echo $data->format('d/m/Y');?></td>
                <td ><?php echo $dado["forma_pagamento"];?></td>
                <td ><?php echo 'R$'.number_format((float)$dado["valor"], 2, ',', '');?></td>
                <td ><?php echo $dado["parcela"].'x';?></td>
                </tr>
            <?php } ?>
            </table>
			</div>
		</div>
	</div>
</body>

<script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>