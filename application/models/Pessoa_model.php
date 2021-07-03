<?php
class Pessoa_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->library('ion_auth');
    $this->load->model(['funcoes']);
    //$this->load->helper('url');
  }

  public function get_pessoa($pessoa_id = NULL)
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
    if($pessoa_id)
    {
      $this->db->where('id',$pessoa_id);
    }
    $this->db->where('deleted',FALSE);
    $query = $this->db->get();
		return $query->result();
  }

  public function set_pessoa($acao)
  {
    //$this->input->post('autor_defesa')
    $data = array(
      'nome' => $this->input->post('nome'),
      'cpf_cnpj' => $this->funcoes->limpa_numero($this->input->post('cpf_cnpj')),
      'tipo_pessoa' => $this->input->post('tipo_pessoa'),
      'ie' => $this->input->post('ie'),
      'logradouro' => $this->input->post('logradouro'),
      'numero' => $this->input->post('numero'),
      'complemento' => $this->input->post('complemento'),
      'bairro' => $this->input->post('bairro'),
      'cep' => $this->funcoes->limpa_numero($this->input->post('cep')),
      'cidade' => $this->input->post('cidade'),
      'estado' => $this->input->post('estado'),
      'telefone' => $this->input->post('telefone') ? $this->funcoes->limpa_numero($this->input->post('telefone')) : NULL,
      'celular' => $this->funcoes->limpa_numero($this->input->post('celular')),
      'email' => $this->input->post('email'),
      'responsavel' => $this->input->post('responsavel'),
    );

    if($acao == 'create')
    {
      $this->db->insert('pessoa',$data);
    }
    else
    {
      unset($data['cpf_cnpj']);
      $this->db->where('id', $this->input->post('pessoa_id'));
      $this->db->update('pessoa',$data);
    }
    
  }

  public function delete_pessoa($pessoa_id)
  {
    //Criar função de verificação da pessoa se possui contrato vigente

    $this->db->set('dt_delete',date('Y-m-d G:i:s'));
    $this->db->set('deleted', '1');
    $this->db->where('id', $pessoa_id);
    $this->db->update('pessoa');
  }

  public function have_cpf_cnpj($cpf_cnpj)
  {
    $this->db->select('count(*) as linhas')
    ->from('pessoa')
    ->where('cpf_cnpj',$cpf_cnpj);
    $query = $this->db->get();
    if ($query->row()->linhas == 0)
    $return = false;
    else
    {
      $return = true;
    }
    //echo var_dump($this->db->last_query());
    return $return;
  }

}