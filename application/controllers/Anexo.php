<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Controller gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais: https://www.codeigniter.com/user_guide/general/controllers.html
*/

class Anexo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('anexo_model');
        $this->load->model('funcoes');
        $this->load->model('contrato_model');
        $this->load->helper('url_helper','url');
        $this->load->library(['ion_auth','upload']);
    }

    public function create()
    {
        if ($this->ion_auth->logged_in())
        {
            $contrato_id = intval($this->uri->segment(3));
            $this->load->helper('form');
            $this->load->library('form_validation');
            $contrato = $this->contrato_model->get_contrato($contrato_id);

            //Laço para inserir máscaras
            $contrato[0]->valor = $this->funcoes->valor_view($contrato[0]->valor);

            $data['contrato'] = $contrato[0];    

            $this->form_validation->set_rules('anexo[]', 'Anexos', 'callback_validar_upload');

            if ($this->form_validation->run() === FALSE)
            {
                //Configuração de uma mensagem de alerta para o caso de ja ter subido anexo anteriormente e voltar ao formulário para exibição de algum form_validation
                $data['msg_anexo'] = NULL;
                if(isset( $_FILES['anexos']))
                    if($_FILES['anexos']['name'][0] != NULL AND ! $this->session->has_userdata('msg_error'))
                    {
                    $data['msg_anexo'] = "Foram inseridos anexos anteriormente. Insira novamente no campo <strong>Anexo</strong>.";
                    //Caso o form_validation tenha dado false, é preciso excluir também do servidor os anexos que foram descartados, evitando duplicidade de arquivo
                    if ( $this->session->has_userdata('anexo'))
                    {
                        foreach ($this->session->userdata('anexo') as $key => $value) {
                        $arq = './uploads/' . $value;
                        unlink($arq);
                        }
                        $this->session->unset_userdata('anexo');
                        
                    }
                    }
                
                $this->session->unset_userdata('msg_error');
                $this->load->view('templates/top');
                $this->load->view('templates/menu');
                $this->load->view('anexo/upload_anexo', $data);

            }
            else
            {
                $arquivo = $this->session->userdata('anexo');
                $this->anexo_model->set_anexo($arquivo);
                $this->session->set_flashdata('message_success_contrato', 'Anexo(s) inserido(s) com sucesso.');
                redirect("/contratos/editar/{$contrato_id}");
            }
        }
        else
        {
          $this->session->set_flashdata('message', 'Acesso negado.');
          redirect("login", 'refresh');
        }
    }

    function delete($id)
  {
    if ($this->ion_auth->logged_in())
    {
        $contrato_id = intval($this->uri->segment(3));
        $this->anexo_model->delete_anexo($id);
        $this->session->set_flashdata('message_success_contrato', 'Anexo excluído com sucesso.');
        redirect("/contratos/editar/{$contrato_id}");
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

    public function validar_upload()
    {
      date_default_timezone_set($this->config->item('hora_brasilia'));
      $anexos = $_FILES['anexo']['name'];
      if (!empty($anexos))
      {
        $countfiles = count($_FILES['anexo']['name']);

        if ($countfiles > 5)
        {
          $this->form_validation->set_message('validar_upload', 'É possível carregar até 5 arquivos.');
          //indica que há erros a exibir e não é necessário mostrar o aviso para subir anexos novamente
          $this->session->set_userdata('msg_error' , TRUE);
          return FALSE;
        }
        $arquivos = array();
        for($i = 0; $i < $countfiles; $i++)
        {
          if(!empty($_FILES['anexo']['name'][$i])){
            // Define new $_FILES array - $_FILES['file']
            $_FILES['file']['name'] = $_FILES['anexo']['name'][$i];
            $_FILES['file']['type'] = $_FILES['anexo']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['anexo']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['anexo']['error'][$i];
            $_FILES['file']['size'] = $_FILES['anexo']['size'][$i];

            $file_ext = strtolower($this->upload->get_extension($_FILES['anexo']['name'][$i]));
            // Set preference
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
            $config['max_size'] = '10000'; // max_size in kb
            $config['file_name'] = date('d-m-Y G-i-s').'_'.md5($_FILES['anexo']['name'][$i].microtime()).$file_ext;

            //Load upload library
            //$this->load->library('upload',$config);
            $this->upload->initialize($config);

            // File upload
            if($this->upload->do_upload('file')){
              // Get data about the file
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];

              // Initialize array
              $arquivos[] = $filename;
            }
          }
        }
        if ($countfiles > 0 AND $_FILES['anexo']['name'][0] != '')
        {
          $this->session->set_userdata('anexo' , $arquivos);
        }

        if ($this->upload->display_errors())
        {
          $this->form_validation->set_message('validar_upload', $this->upload->display_errors());
          //indica que há erros a exibir e não é necessário mostrar o aviso para subir anexos novamente
          $this->session->set_userdata('msg_error' , TRUE);
          return FALSE;
        }
        else
        {
            return TRUE;
        }

      }
      else
      {
          return TRUE;
      }
    }

}