<?php
class Produtos_model extends CI_Model {
    //Buscar todos os produtos ativos
    public function buscaTodos() {
        return $this->db->where("ativo", true)->get("produtos")->result_array();
    }

    //Buscar todos os produtos inativos
    public function buscaInativos() {
        return $this->db->where("ativo", false)->get("produtos")->result_array();
    }

    //salvar produtos
	public function salva($produto){
		$this->db->insert("produtos", $produto);
	}

    //Inativar produtos
    public function deletar_produto($id){
        return $this->db->where('id', $id)->set("ativo", false)->update('produtos');
    }

    //Ativar produtos (funciona somente quando o produto estiver inativo)
    public function ativar_produto($id){
        return $this->db->where('id', $id)->set("ativo", true)->update('produtos');
    }

    //função para editar os produtos
    public function retorna($id){
        return $this->db->get_where("produtos", array(
            "id" => $id
        ))->row_array();
    }


    //função para atualizar os produtos
    public function atualizar($id, $produto){    

        $this->db->where('id', $id);
        return $this->db->update('produtos', $produto);
    }

}
