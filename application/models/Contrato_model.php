<?php
class Contrato_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->library('ion_auth');
    $this->load->model(['funcoes']);
    //$this->load->helper('url');
  }

  public function get_contrato($contrato_id = NULL)
  {
    $this->db->select("
                      ct.id as id,
                      tipo_contrato_id,
                      escopo,
                      CASE WHEN formalizado = 's' THEN 'Sim'
                      ELSE 'Não' END AS formalizado,
                      situacao,
                      valor,
                      CASE WHEN forma_pagamento = 'u' THEN 'Único'
                      ELSE 'Mensal' END AS forma_pagamento,
                      inicio_contrato,
                      fim_contrato,
                      contrato_anterior_id,
                      observacao,
                      fiscal,
                      pessoa_id,
                      p.nome as nome_pessoa,
                      tc.nome as tipo_contrato_nome,
    ");
    $this->db->from('contrato as ct');
    $this->db->join('tipo_contrato as tc', 'tc.id = ct.tipo_contrato_id', 'left');
    $this->db->join('pessoa as p', 'p.id = ct.pessoa_id', 'left');
    if($contrato_id)
    {
      $this->db->where('id',$contrato_id);
    }
    $this->db->where('ct.deleted',FALSE);
    $query = $this->db->get();
    return $query->result();
  }

}
