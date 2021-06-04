<?php 
	$m = new Mensagem();

	if(isset($_POST['buscar'])){
		$busca = $_POST['buscar'];

		$resultados = $m->selecionaHistoricoMensagensPorNome($busca);
	}
	else{
		$resultados = $m->selecionaHistoricoMensagens();
	}
?>

<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Enviar mensagens</h1>
    <p class="fs-4 text-muted">Buscar ou enviar mensagens pelo nome do aluno</p>
  </div>
<body>
	<div class="container topo">
		<div class="form-group">
			<div class="input-group">
			<form action="http://localhost/guararapesnatacao/admin/enviarmensagem" class="w-100 me-3" method="post">
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
                <th scope="col">CPF</th>
				<th scope="col">Total de mensagens</th> 
				<th scope="col"> </th> 
				</tr>	
			<?php 
			foreach ($resultados as $dado){ ?>
				<tr>
				<td ><?php echo $dado["nome_aluno"];?></td>
				<td ><?php echo $dado["email_aluno"];?></td>
                <td ><?php echo $dado["cpf_aluno"];?></td>
				<td ><?php echo $dado["qntd_msg"];?></td>
				<th scope="col">
					<a href="http://localhost/guararapesnatacao/admin/mensagemaluno/<?php echo $dado["id_aluno"];?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
					</a>
				</th> 
				</tr>
			<?php } ?>
			</table>
			</div>
		</div>
	</div>
</body>

<script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>