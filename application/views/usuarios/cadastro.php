<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=" <?= base_url("css/bootstrap.css") ?>">
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

			<h1>Cadastrar Colaborador</h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="">
					<div class="navbar-nav">
					<?= anchor("produtos/index", "Inicio", array("class" => "btn btn-primary")) ?>
					<?= anchor("usuarios/index", "Colaboradores", array("class" => "btn btn-primary")) ?>
					</div>
				</div>
			</nav>

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