<?php
    $url = explode('/', $_GET['pag']);
    $id = end($url);
?>

<html>
<body class="bg-light">	
	<div class="container">
		<div class="py-4">
        <a href="http://localhost/guararapesnatacao/admin">
            <img class="rounded-circle" src="http://localhost/guararapesnatacao/upload/funcionarios/<?php echo $_SESSION['id'].'.jpg'?>" alt="image" width="100" height="100"><br><br>
		</a>         
        <h2>Altera perfil</h2>
		</div>		
			<?php $f = new Funcionario();
			$dados = $f->selecionaFuncionario($id);?>

            <form action="http://localhost/guararapesnatacao/admin/alteraCadastroFuncionario" method="POST">	 
            <div class="col-md-8 order-md-1">				
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>" class="form-control" id="nome" maxlength="60" required>
                </div>	   	
            </div>		

            <div class="row">		
                <div class="col-md-6 mb-3">
                    <label for="email">Email:</label>
                    <input type="text" name="email" value="<?php echo $dados["email"];?>" class="form-control" id="email"  disabled="disabled" required>
                </div>	

                <div class="col-md-6 mb-3">
				    <label for="datanasc">Data de nascimento:</label>
				    <input type="date" name="datanasc" value="<?php echo $dados["data_nascimento"];?>" class="form-control" disabled="disabled"  id="datanasc" required>
				 </div>
            </div>		

            <div class="row">
                <div class="col-md-6 mb-3">
			        <label for="cpf">CPF:</label>
				    <input type="text" value="<?php echo $dados["cpf"];?>" disabled="disabled" class="form-control" id="cpf" required>
				</div>

				<div class="col-md-6 mb-3">
		    		<label for="rg">RG:</label>
			  	    <input type="text" name="RG" value="<?php echo $dados["rg"];?>" disabled="disabled" class="form-control" id="rg" required>
				</div>
			</div>

            
            <div class="row">
                <div class="col-md-6 mb-3">
			        <label for="funcao">Função:</label>
				    <input type="text" value="<?php echo $dados["funcao"];?>" class="form-control" name="funcao" id="funcao" required>
				</div>

				<div class="col-md-6 mb-3">
                    <?php if($dados["admin"] == 1){
                        $texto = 'Sim';
                    }
                    else{
                        $texto = 'Não';
                    }?>
		    		<label for="admin">Acesso ADMIN:</label>
                    <input type="text" value="<?php echo $texto;?>" disabled="disabled" class="form-control" id="acesso" required>
                  </div>
			</div>

            <div class="row">						
				<div class="col-md-6 mb-3">
					<label for="telefone">Telefone:</label>
					<input type="text" name="telefone" value="<?php echo $dados["telefone"];?>" class="form-control" id="telefone" maxlength="14" required>
				</div>

                <div class="col-md-6 mb-3">
                    <label for="CEP">CEP: </label>
                    <input type="text" class="form-control" id="CEP" maxlength="15" value="<?php echo $dados["cep"];?>" name="CEP" onblur="pesquisacep(this.value);" required>
                    <div class="invalid-feedback">
                    O preenchimento do campo "CEP" é obrigatório
                    </div>
                </div>

				<?php $endereco = explode(',', $dados["endereco"]); ?>

                <div class="col-md-10 mb-3">
                <label for="rua">Rua: </label>
                <input type="text" class="form-control" value="<?php echo $endereco[0];?>" id="rua" maxlength="120" name="rua" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Rua" é obrigatório
                </div>
                </div>

                <div class="col-md-2 mb-3">
                <label for="numero">Nº: </label>
                <input type="text" class="form-control" id="numero" value="<?php echo $endereco[1];?>" maxlength="120" name="numero" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Número" é obrigatório
                </div>
                </div>
            </div>    

            <div class="row">
                <div class="col-md-5 mb-3">
                <label for="bairro">Bairro: </label>
                <input type="text" class="form-control" value="<?php echo $dados["bairro"];?>" id="bairro" maxlength="120" name="bairro" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Bairro" é obrigatório
                </div>
                </div>

                <div class="col-md-5 mb-3">
                <label for="cidade">Cidade: </label>
                <input type="text" class="form-control" value="<?php echo $dados["cidade"];?>" id="cidade" maxlength="120" name="cidade" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Cidade" é obrigatório
                </div>
                </div>

                <div class="col-md-2 mb-3">
                <label for="estado">Estado: </label>
                <input type="text" class="form-control" id="estado" value="<?php echo $dados["estado"];?>" maxlength="120" name="estado" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Estado" é obrigatório
                </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="nome">Observações:</label>
                    <input type="text" name="observacoes" id="observacoes" value="<?php echo $dados['observacao'];?>" class="form-control" id="observacoes" maxlength="200" required>
                </div>	   	
            </div>		
						
							<br>
							<div class="row"> 
							<div class="col-md-9 mb-2">
									<button class="btn btn-outline btn-primary" value="<?php echo $id?>" name="idaltera">Salvar alterações</button>
							</div>  
							</div>	
							
					
					</div>
					</div>
				</form>

		</div>	
	</body>

  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
	<script>
    function limpa_formulário_cep() {
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } 
        else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');

        if (cep != "") {
            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                document.body.appendChild(script);
            } 
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } 
        else {
            limpa_formulário_cep();
        }
    };
    </script>
</html>