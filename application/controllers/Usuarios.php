<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	//função para cadastrar os usuarios
	public function novo(){
        $usuario = array(
			"nome" => $this->input->post("nome"),
			"email" => $this->input->post("email"),
			"senha" => md5($this->input->post("senha")),
			"nascimento" => $this->input->post("nascimento"),
			"telefone" => $this->input->post("telefone"),
			"cidade" => $this->input->post("cidade"),
			"estado" => $this->input->post("estado")

		);
		$this->load->model("usuarios_model");
		$this->usuarios_model->salvar($usuario);
		$this->load->view('usuarios/novo');
	}

	public function colaboradores(){
		$this->load->view('usuarios/index');
	}

	public function cadastro(){
		$this->load->view('usuarios/cadastro');
	}

	public function colaboradoresInativos(){
		$this->load->view('usuarios/colaboradores');
	}

	//função para listar os colaboradores ativos
	public function index(){	
        $this->load->model("usuarios_model");
        $lista = $this->usuarios_model->buscaColaboradores();
        $dados = array("usuarios" => $lista);
        $this->load->view('usuarios/index', $dados);
	}

	//função para listar os colaboradores inativos
	public function inativos(){			
        $this->load->model("usuarios_model");
        $lista = $this->usuarios_model->consultaInativos();
        $dados = array("usuarios" => $lista);
        $this->load->view('usuarios/colaboradores', $dados);
	}

	//função para inativar os colaboradores
	public function delete($id){
		$this->load->model("usuarios_model");
		$this->usuarios_model->deletar_usuario($id);
		$this->session->set_flashdata("success", "Usuário inativado com sucesso!");
		redirect('/usuarios/index');
	}

	//função para ativar os colaboradores inativos
	public function ativar($id){
		$this->load->model("usuarios_model");
		$this->usuarios_model->ativar_usuario($id);
		$this->session->set_flashdata("success", "Usuário ativado com sucesso!");
		redirect('/usuarios/index');
	}

	//função para editar os colaboradores
	public function editar($id){
		$this->load->model("usuarios_model");
		$usuario = $this->usuarios_model->retorna($id);
		$dados = array("usuarios" => $usuario);	
		$this->load->view("usuarios/editar", $dados);
	}

	//função para salvar os colaboradores
	public function salvar($id){
		$this->load->model("usuarios_model");
		$this->usuarios_model->salvar($id);
		$this->session->set_flashdata('success', 'Cadastro alterado com sucesso!');
		redirect('/');
	}

	//função para atualizar os colaboradores
	public function atualizar($id){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("email", "email", "required");
		$this->form_validation->set_rules("senha", "senha", "required");
		$this->form_validation->set_rules("nascimento", "nascimento", "required");
		$this->form_validation->set_rules("cidade", "cidade", "required");
		$this->form_validation->set_rules("estado", "estado", "required");
		$this->form_validation->set_rules("telefone", "telefone", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

		$sucesso = $this->form_validation->run();
		if($sucesso){
			$usuarios = array(
				"nome" => $this->input->post("nome"),
				"email" => $this->input->post("email"),
				"senha" => $this->input->post("senha"),
				"nascimento" => $this->input->post("nascimento"),
				"cidade" => $this->input->post("cidade"),
				"estado" => $this->input->post("estado"),
				"telefone" => $this->input->post("telefone"),
			);
			$this->load->model("usuarios_model");
			$this->usuarios_model->atualizar($id, $usuarios);
			$this->session->set_flashdata("success", "Usuário atualizado com sucesso!");
			redirect('/usuarios/index');
		}else {
			$this->load->view("usuarios/editar");
		}
	}



}
