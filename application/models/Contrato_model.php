<?php
class Contrato_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->library('ion_auth');
    $this->load->model(['funcoes','pagamento_model']);
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
                      codigo,
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
                      p.id as p_id,
                      p.nome as nome_pessoa,
                      tc.id as tc_id,
                      tc.nome as tipo_contrato_nome,
    ");
    $this->db->from('contrato as ct');
    $this->db->join('tipo_contrato as tc', 'tc.id = ct.tipo_contrato_id', 'left');
    $this->db->join('pessoa as p', 'p.id = ct.pessoa_id', 'left');
    if($contrato_id)
    {
      $this->db->where('ct.id',$contrato_id);
    }
    $this->db->where('ct.deleted',FALSE);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_tipo_contrato()
  {
    $this->db->select();
    $this->db->from('tipo_contrato');
    $this->db->where('deleted',0);
    $query = $this->db->get();
    return $query->result();
  }

  public function set_contrato($acao)
  {
    $this->db->trans_start();
    $dt_inicio = $this->input->post('inicio_contrato') ? date('Y-m-d', strtotime($this->input->post('inicio_contrato'))) : NULL;
    $dt_fim = $this->input->post('fim_contrato') ? date('Y-m-d', strtotime($this->input->post('fim_contrato'))) : NULL;
    $valor = $this->input->post('valor') ? $this->funcoes->valor_sql($this->input->post('valor')) : NULL;
    $data = array(
      'tipo_contrato_id' => addslashes($this->input->post('tipo_contrato_id')),
      'escopo' => addslashes($this->input->post('escopo')),
      'formalizado' => addslashes($this->input->post('formalizado')),
      'situacao' => addslashes($this->input->post('situacao')),
      'valor' => $valor,
      'forma_pagamento' => addslashes($this->input->post('forma_pagamento')),
      'inicio_contrato' => $dt_inicio,
      'fim_contrato' => $dt_fim,
      'observacao' => $this->input->post('observacao') ? addslashes($this->input->post('observacao')) : NULL,
      'fiscal' => $this->input->post('fiscal') ? addslashes($this->input->post('fiscal')) : NULL,
      'pessoa_id' => addslashes($this->input->post('pessoa_id')),
    );

    if($acao == 'create')
    {
      $codigo = $this->gerar_codigo_contrato(addslashes($this->input->post('pessoa_id')));
      $data['codigo'] = $codigo;
      $this->db->insert('contrato',$data);
    }
    else
    {
      // unset($data['pessoa_id']);
      $this->db->where('id', $this->input->post('contrato_id'));
      $this->db->update('contrato',$data);
    }
    
    $this->db->trans_complete();

  }

  public function delete_contrato($contrato_id)
  {
    //Criar função de verificação da pessoa se possui contrato vigente

    $this->db->set('dt_delete',date('Y-m-d G:i:s'));
    $this->db->set('deleted', '1');
    $this->db->where('id', $contrato_id);
    $this->db->update('contrato');
  }

  private function gerar_codigo_contrato($pessoa_id)
  {
    $parametro_ano_atual = '-' . date("Y");

    $this->db->select('count(*) as linhas')
    ->from('contrato')
    ->where("pessoa_id = $pessoa_id AND codigo like '%$parametro_ano_atual%' ");
    $query = $this->db->get();
    $quantidade_cts = $query->row()->linhas;
    if ($quantidade_cts == 0)
    {
      $codigo_numero = '01';
    }
    else
    {
      $codigo_numero = sprintf("%02d", ++$quantidade_cts);
    }

    $this->db->select('sigla');
    $this->db->from('pessoa');
    $this->db->where('id', $pessoa_id);
    $query = $this->db->get();
    $sigla_pessoa = $query->row();
    $codigo = $sigla_pessoa->sigla . $parametro_ano_atual . $codigo_numero;

    return $codigo;

  }

  public function get_saldo_contrato($contrato_id)
  {
    $this->db->select('valor');
    $this->db->from('contrato');
    $this->db->where('id', $contrato_id);
    $query = $this->db->get();
    $valor_contrato = $query->result_array()[0]['valor'];
    $gastos_contrato = $this->pagamento_model->get_pagamentos_contrato($contrato_id);
    $saldo_contrato = $valor_contrato - $gastos_contrato;

    return $saldo_contrato;
  }

}
