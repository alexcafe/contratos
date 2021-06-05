<?php
class Pessoa_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->library('ion_auth');
    //$this->load->helper('url');
  }

  public function get_pessoa()
  {
    $this->db->select("
                      id,
                      nome,
                      cpf_cnpj,
                      CASE WHEN tipo_pessoa = 'f' THEN 'Pessoa Física'
                      ELSE 'Pessoa Jurídica' END AS tipo_pessoa,
                      ie,
                      logradouro,
                      numero,
                      complemento,
                      bairro,
                      cep,
                      cidade,
                      estado,
                      telefone,
                      celular,
                      email,
                      responsavel
    ");
    $this->db->from('pessoa');
    $this->db->where('deleted',FALSE);
    $query = $this->db->get();
		return $query->result();
  }

}