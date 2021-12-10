<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Model gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais: https://www.codeigniter.com/user_guide/general/models.html
*/
class Pagamento_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model(['funcoes']);
    }

    public function get_pagamento($contrato_id = FALSE, $unique = FALSE)
    {
        if ($unique === FALSE AND $contrato_id != FALSE)
        {
            $this->db->select('*');
            $this->db->from('pagamento');
            $this->db->where('contrato_id', $contrato_id);
            $this->db->where('deleted', 'false');
            $query = $this->db->get();
            return $query->result();
        }
        else if ($unique === FALSE AND $contrato_id === FALSE)
        {
            $this->db->select('*');
            $this->db->from('pagamento');
            $this->db->where('deleted', 'false');
            $query = $this->db->get();
            return $query->result();
        }
        else if ($unique != FALSE AND $contrato_id === FALSE)
        {
            $query = $this->db->get_where('pagamento', array('id' => $unique, 'deleted' => false));
            return $query->row();
        }


        $query = $this->db->get_where('pagamento', array('id' => $unique, 'deleted' => false, 'contrato_id' => $contrato_id));
        return $query->row();
    }

    public function set_pagamento($acao)
    {
        $vencimento = $this->input->post('vencimento') ? date('Y-m-d', strtotime($this->input->post('vencimento'))) : NULL;
        $valor = $this->funcoes->valor_sql($this->input->post('valor'));
        
        $data = array(
            'valor' => $valor,
            'vencimento' => $vencimento,
            'status' => addslashes($this->input->post('status')),
            'forma_pagamento' => addslashes($this->input->post('forma_pagamento')),
            'nota_fiscal' => addslashes($this->input->post('nf')),
            'contrato_id' => addslashes($this->input->post('contrato_id')),
        );

        if($acao == 'create')
        {
            $this->db->insert('pagamento',$data);
        }
        else
        {
            // unset($data['pessoa_id']);
            $this->db->where('id', $this->input->post('pagamento_id'));
            $this->db->update('pagamento',$data);
        }
        
    }

    public function delete_pagamento($id)
    {
        $this->db->set('dt_delete',date('Y-m-d G:i:s'));
        $this->db->set('deleted', '1');
        $this->db->where('id', $id);
        $this->db->update('pagamento');
    }

    public function get_pagamentos_contrato($contrato_id, $tipo = NULL)
    {
        //Retorna valores gastos no contrato
        if($tipo == NULL)
        {
            $tipo = array('Pago','Emitido');
        }

        $this->db->select('sum(valor) as valores_pagos');
        $this->db->from('pagamento');
        $this->db->where('contrato_id', $contrato_id);
        $this->db->where('deleted', 'false');
        $this->db->where_in('status', $tipo);
        $query = $this->db->get();
        
        return $query->result_array()[0]['valores_pagos'];

    }

    public function get_contratoid_with_pagamentoid($pagamento_id)
  {
    $this->db->select('contrato_id');
    $this->db->from('pagamento');
    $this->db->where('id', $pagamento_id);
    $query = $this->db->get();
    return $query->result_array()[0]['contrato_id'];

  }

}