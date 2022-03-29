<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=" <?= base_url( "css/bootstrap.css") ?>">
	<title>Editar Formulário</title>
</head>
<body>
<div class="container">

	<?php if($this->session->flashdata("success")) : ?>
		<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
	<?php endif ?>

	<?php if($this->session->flashdata("danger")) : ?>
		<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
	<?php endif ?>

		<h1>Editar Produto</h1>

		<?php		
        echo form_open("produtos/atualizar/{$produto['id']}");

		echo form_label("Nome", "nome");
		echo form_input(array(
			"name" => "nome",
			"id" => "nome",
			"class" => "form-control",
			"maxlength" => "255"
		),$produto['nome']);
        
		echo form_error("nome", "");

		echo form_label("Preço", "preco");
		echo form_input(array(
			"name" => "preco",
			"id" => "preco",
			"class" => "form-control",
			"maxlength" => "255"
		),$produto['preco']);
		echo form_error("preco", "");

		echo form_label("Descrição", "descricao");
		echo 	form_textarea(array(
			"name" => "descricao",
			"id" => "descricao",
			"class" => "form-control",
			"maxlength" => "255"
		),$produto['descricao']);
		echo form_error("descricao", "");

		echo form_button(array(
			"class" => "btn btn-primary",
			"type" => "submit",
			"content" => "Editar"
		));

		echo anchor("produtos/index", "Voltar", array('class' => 'btn btn-primary'));

		echo form_close();
		?>


</div>
</body>
</html>
