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
                      sigla,
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
    $data = array(
      'nome' => addslashes($this->input->post('nome')),
      'sigla' => addslashes($this->input->post('sigla')),
      'cpf_cnpj' => $this->funcoes->limpa_numero(addslashes($this->input->post('cpf_cnpj'))),
      'tipo_pessoa' => addslashes($this->input->post('tipo_pessoa')),
      'ie' => addslashes($this->input->post('ie')),
      'logradouro' => addslashes($this->input->post('logradouro')),
      'numero' => addslashes($this->input->post('numero')),
      'complemento' => addslashes($this->input->post('complemento')),
      'bairro' => addslashes($this->input->post('bairro')),
      'cep' => $this->funcoes->limpa_numero(addslashes($this->input->post('cep'))),
      'cidade' => addslashes($this->input->post('cidade')),
      'estado' => addslashes($this->input->post('estado')),
      'telefone' => $this->input->post('telefone') ? $this->funcoes->limpa_numero(addslashes($this->input->post('telefone'))) : NULL,
      'celular' => $this->funcoes->limpa_numero(addslashes($this->input->post('celular'))),
      'email' => addslashes($this->input->post('email')),
      'responsavel' => addslashes($this->input->post('responsavel')),
    );

    if($acao == 'create')
    {
      $this->db->insert('pessoa',$data);
    }
    else
    {
      unset($data['cpf_cnpj']);
      unset($data['sigla']);
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

  public function have_sigla($sigla)
  {
    $this->db->select('count(*) as linhas')
    ->from('pessoa')
    ->where('sigla',$sigla);
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