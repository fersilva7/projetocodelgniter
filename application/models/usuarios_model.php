<?php
class Usuarios_model extends CI_Model{
	public function salvar($usuario){
		$this->db->insert("usuarios", $usuario);
	}

	public function logarUsuarios($email, $senha){
		$this->db->where("email", $email);
		$this->db->where("senha", $senha);
		$usuario = $this->db->get("usuarios")->row_array();
		return $usuario;
	}

    //realizar busca de colaboradores ativos
	public function buscaColaboradores() {
        return $this->db->where("ativo", true)->get("usuarios")->result_array();
    }

    //realizar busca de colaboradores inativos
	public function consultaInativos() {
        return $this->db->where("ativo", false)->get("usuarios")->result_array();
    }

    //função para editar os colaboradores
	public function retorna($id){
        return $this->db->get_where("usuarios", array(
            "id" => $id
        ))->row_array();
    }

    //inativar colaboradores
	public function deletar_usuario($id){
        return $this->db->where('id', $id)->set("ativo", false)->update('usuarios');
    }


    //ativar colaboradores
	public function ativar_usuario($id){
        return $this->db->where('id', $id)->set("ativo", true)->update('usuarios');
    }

    //atualizar colaboradores
	public function atualizar($id, $usuarios){    

        $this->db->where('id', $id);
        return $this->db->update('usuarios', $usuarios);
    }
}
