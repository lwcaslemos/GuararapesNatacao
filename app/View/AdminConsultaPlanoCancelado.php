<?php 
	$a = new Aluno();

	if(isset($_POST['buscar'])){
		$busca = $_POST['buscar'];

		$resultados = $a->consultarAlunoPlanoCanceladoPorNome($busca);
	}
	else{
		$resultados = $a->consultarAlunoPlanoCanceladoAll();
	}
?>

<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Histórico de planos</h1>
    <p class="fs-4 text-muted">Histórico de planos comprados do aluno buscando pelo nome</p>
  </div>
<body>
	<div class="container topo">
		<div class="form-group">
			<div class="input-group">
			<form action="http://localhost/guararapesnatacao/admin/consultahistoricoplanos" class="w-100 me-3" method="post">
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
				<th scope="col">Data de compra</th> 
				<th scope="col">Plano</th>
                <th scope="col">Turno</th>
                <th scope="col">Valor</th> 
				<th scope="col">Status</th>
				</tr>	
			<?php 
			foreach ($resultados as $dado){ ?>
				<tr>
				<td ><?php echo $dado["nome_aluno"];?></td>
				<td ><?php echo $dado["email_aluno"];?></td>
				<td ><?php $data = new DateTime($dado["criacao_pc"]); echo $data->format('d/m/Y H:i:s');?></td>
				<td ><?php echo $dado["nome_plano"];?></td>
                <td ><?php echo $dado["turno_pc"];?></td>
                <td ><?php echo 'R$'.number_format((float)$dado["valor_pc"], 2, ',', '');?></td>
				<td ><?php echo $dado["status_pc"];?></td>
				</tr>
			<?php } ?>
			</table>
			</div>
		</div>
	</div>
</body>

<script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>