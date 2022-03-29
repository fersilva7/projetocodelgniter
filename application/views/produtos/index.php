<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=" <?= base_url("css/bootstrap.css") ?>">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Projeto</title>
</head>

<body>
	<div class="container">

		<?php if ($this->session->flashdata("success")) : ?>
			<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
		<?php endif ?>

		<?php if ($this->session->flashdata("danger")) : ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
		<?php endif ?>

		<?php if ($this->session->userdata("usuario_logado")) : ?>

			<h1>Produtos</h1>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
				<div class="">
					<div class="navbar-nav">
					<?= anchor("produtos/index", "Inicio", array("class" => "btn btn-primary")) ?>
					<?= anchor("produtos/produtosInativos", "Produtos Inativos", array("class" => "btn btn-primary")) ?>
					<?= anchor("usuarios/index", "Colaboradores", array("class" => "btn btn-primary")) ?>
					</div>
				</div>
			</nav>
			
			<div class="form-group input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
			<input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
			</div>

			<table class="table" id=tabela>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>Opções</th>
				</tr>
				<?php foreach ($produtos as $produto) : ?>
					<tr>
						<td><?= $produto['nome'] ?></td>
						<td><?= $produto['descricao'] ?></td>
						<td>R$ <?= $produto['preco'] ?></td>
						<td>
							<?= anchor("produtos/editar/{$produto['id']}", "Editar", array("class" => "btn btn-primary")) ?>
							<?= anchor("produtos/delete/{$produto['id']}", "Inativar", array("class" => "btn btn-danger")) ?>
						</td>
					</tr>
				<?php endforeach ?>
			</table>

			<script>
            	$('input#txt_consulta').quicksearch('table#tabela tbody tr');
        	</script>

			<?= anchor("produtos/formulario", "Novo Produto", array("class" => "btn btn-primary")) ?>

			<?= anchor("login/logout", "Sair", array("class" => "btn btn-primary")) ?>

		<?php else : ?>

			<h1>Login</h1>

			<?php
			echo form_open("login/autenticar");

			echo form_label("Email", "email");
			echo form_input(array(
				"name" => "email",
				"id" => "email",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_label("Senha", "senha");
			echo 	form_password(array(
				"name" => "senha",
				"id" => "senha",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_button(array(
				"class" => "btn btn-primary",
				"type" => "submit",
				"content" => "Login	"
			));

			echo form_close();
			?>



			<h1>Cadastro</h1>

			<?php
			echo form_open("usuarios/novo");

			echo form_label("Nome", "nome");
			echo form_input(array(
				"name" => "nome",
				"id" => "nome",
				"class" => "form-control",
				"maxlength" => "255"
			));
			echo form_error("nome", "");

			echo form_label("Email", "email");
			echo 	form_input(array(
				"name" => "email",
				"id" => "email",
				"class" => "form-control",
				"maxlength" => "255"
			));
			echo form_error("email", "");

			echo form_label("Senha", "senha");
			echo 	form_password(array(
				"name" => "senha",
				"id" => "senha",
				"class" => "form-control",
				"maxlength" => "255"
			));
			echo form_error("senha", "");


			echo form_label("Nascimento", "nascimento");
			echo form_input(array(
				"name" => "nascimento",
				"id" => "nascimento",
				"class" => "form-control",
				"maxlength" => "255"
			));
			echo form_error("nascimento", "");

			echo form_label("Telefone", "telefone");
			echo form_input(array(
				"name" => "telefone",
				"id" => "telefone",
				"class" => "form-control",
				"maxlength" => "255"
			));
			echo form_error("telefone", "");

			echo form_label("Cidade", "cidade");
			echo form_input(array(
				"name" => "cidade",
				"id" => "cidade",
				"class" => "form-control",
				"maxlength" => "255"
			));
			echo form_error("cidade", "");

			echo form_label("Estado", "estado");
			echo form_input(array(
				"name" => "estado",
				"id" => "estado",
				"class" => "form-control",
				"maxlength" => "2"
			));
			echo form_error("estado", "");

			echo form_button(array(
				"class" => "btn btn-primary",
				"type" => "submit",
				"content" => "Cadastrar"
			));

			echo form_close();
			?>

		<?php endif ?>


	</div>
</body>

</html>