<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Model gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais: https://www.codeigniter.com/user_guide/general/models.html
*/
class Anexo_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_anexo($unique = FALSE)
    {
        if ($unique === FALSE)
        {
            $query = $this->db->get('anexo');
            $this->db->where('deleted', false);
            return $query->result();
        }
        $query = $this->db->get_where('anexo', array('contrato_id' => $unique, 'deleted' => false));
        return $query->result();
    }

    public function set_anexo($arquivo)
    {
        $contrato_id = $this->input->post('contrato_id');
        if($arquivo)
        {
          $anexo_email = array();
          $i = 0;
          if(count($arquivo) > 0)
          {
            foreach ($arquivo as $a)
            {
              $anexo = array(
                'contrato_id' => $contrato_id,
                'anexo' => $a
              );
              $this->db->insert('anexo', $anexo);
              $anexo_email[$i] = './uploads/' . $a;
              $i++;
            }
          }
        }        
    }

    public function delete_anexo($id)
    {
    $this->db->set('dt_delete',date('Y-m-d G:i:s'));
    $this->db->set('deleted', '1');
    $this->db->where('id', $id);
    $this->db->update('anexo');
    }

}