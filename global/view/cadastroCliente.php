<?php error_reporting(0)?>
<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>
<?php include(HEADER_TEMPLATE); ?>
<?php include_once '../model/cliente.php';?>
<?php include '../controller/clientes.php'?>
<div class="container bd-navbar">
	<form id="cadastroDeCliente" action="../?controller=clientes&action=createupdate" method="post">
	
	<div class="row">
		<div class="form-group col-md-9">
			<label for="nome">Nome :</label> <input type="text"
				class="form-control" name="nome" value="<?=$nome?>" id="nome"
				/>
		</div>

		<div class="form-group col-md-3">
			<label for="cpf">CPF:</label> <input type="text" class="form-control"
				name="cpf" id="cpf" value="<?=$cpf?>" placeholder="Informe o CPF" />
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-9">
			<label for="endereco">Endereco:</label> <input type="text" class="form-control"
				name="endereco" id="endereco" value="<?=$endereco?>" placeholder="Informe o endereço" />
		</div>

		<div class="form-group col-md-3">
			<label for="bairro">Bairro:</label> <input type="text" class="form-control"
				name="bairro" id="bairro" value="<?=$bairro?>" placeholder="Informe o bairro" />
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-md-3">
			<label for="CEP">CEP:</label> <input type="text" class="form-control"
				name="cep" id="cep" value="<?=$cep?>" placeholder="Informe o CEP" />
		</div>
		
		<div class="form-group col-md-7">
			<label for="cidade">Cidade:</label> <input type="text" class="form-control"
				name="cidade" id="cidade" value="<?=$cidade?>" placeholder="Informe a cidade" />
		</div>
		
		<div class="form-group col-md-2">
			<label for="estado">Estado:</label> <input type="text" class="form-control"
				name="estado" id="estado" value="<?=$estado?>" placeholder="Informe o estado" />
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-md-4">
			<label for="telefone">telefone residencial / comercial :</label> <input type="text" class="form-control"
				name="cep" id="cep" value="<?=$telefone?>" placeholder="Informe o telefone" />
		</div>
		
		<div class="form-group col-md-4">
			<label for="celular">Celular:</label> <input type="text" class="form-control"
				name="celular" id="celular" value="<?=$celular?>" placeholder="Informe o celular" />
		</div>
		
	</div>
	
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="controller" value="clientes"> 
		<input type="hidden" name="action" value="createupdate">
		
		<div style="text-align: center;">
			<button type="submit" class="btn btn-success">Salvar</button>
			<button type="reset" class="btn btn-warning">Limpar</button>
		</div>
	</form>
	<br />
</div>
<?php include(FOOTER_TEMPLATE); ?>