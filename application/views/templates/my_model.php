{tag}
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Model gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais: https://www.codeigniter.com/user_guide/general/models.html
*/
class {name} extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_{entity}($unique = FALSE)
    {
        if ($unique === FALSE)
        {
            $query = $this->db->get('{entity}');
            $this->db->where('deleted', 'false');
            return $query->result();
        }
        $query = $this->db->get_where('{entity}', array('id' => $unique));
        $this->db->where('deleted', 'false');
        return $query->row();
    }

    public function set_{entity}($id = FALSE)
    {
        $this->db->set('CAMPO_1', $this->input->post('CAMPO_1'));
        $this->db->set('CAMPO_2', $this->input->post('CAMPO_2'));

        if ($id === FALSE)
        {
            if($this->db->insert('{entity}')){
                return $this->db->insert_id();
            }else{
                return FALSE;
            }
            
        }

        $this->db->where('id', $id);
        $this->db->where('deleted', 'false');
        if($this->db->update('mytable')){
            return $id;
        }else{
            return FALSE;
        }
        
    }

    public function delete_{entity}($id)
    {
        $this->db->set('deleted', true);
        $this->db->where('id', $id);
        return $this->db->update('mytable');
    }

}