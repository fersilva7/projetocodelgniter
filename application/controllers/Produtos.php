<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	//pagina principal de produtos
	public function index(){
        $this->load->model("produtos_model");
        $lista = $this->produtos_model->buscaTodos();
        $dados = array("produtos" => $lista);
        $this->load->view('produtos/index', $dados);
	}

	//formulário para criar produtos novos
	public function formulario(){
		$this->load->view('produtos/formulario');
	}

	//deixar produtos inativos
	public function produtosInativos(){
        $this->load->model("produtos_model");
        $lista = $this->produtos_model->buscaInativos();
        $dados = array("produtos" => $lista);
        $this->load->view('produtos/inativos', $dados);
	}

	//criar produtos
	public function novo(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("descricao", "descricao", "required");
		$this->form_validation->set_rules("preco", "preco", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

		$sucesso = $this->form_validation->run();
		if($sucesso){
			$usuarioId = $this->session->userdata("usuario_logado");
			$produto = array(
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $usuarioId['id']
			);
			$this->load->model("produtos_model");
			$this->produtos_model->salva($produto);
			$this->session->set_flashdata("success", "Produto cadastrado com sucesso!");
			redirect('/');
		}else {
			$this->load->view("produtos/formulario");
		}
	}

	//inativar produtos existentes
	public function delete($id){
		$this->load->model("produtos_model");
		$this->produtos_model->deletar_produto($id);
		$this->session->set_flashdata("success", "Produto inativado com sucesso!");
		redirect('/');
	}

	//editar produtos
	public function editar($id){
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->retorna($id);
		$dados = array("produto" => $produto);		
		$this->load->view("produtos/editar", $dados);
	}

	//ativar produto (função só funciona quando produto estiver desativado)
	public function ativar($id){
		$this->load->model("produtos_model");
		$this->produtos_model->ativar_produto($id);
		$this->session->set_flashdata("success", "Produto ativado com sucesso!");
		redirect('/');
	}


	//atualizar e salvar produto
	public function atualizar($id){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("descricao", "descricao", "required");
		$this->form_validation->set_rules("preco", "preco", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

		$sucesso = $this->form_validation->run();
		if($sucesso){
			$usuarioId = $this->session->userdata("usuario_logado");
			$produto = array(
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $usuarioId['id']
			);
			$this->load->model("produtos_model");
			$this->produtos_model->atualizar($id, $produto);
			$this->session->set_flashdata("success", "Produto atualizado com sucesso!");
			redirect('/');
		}else {
			$this->load->view("produtos/formulario");
		}
	}

}
