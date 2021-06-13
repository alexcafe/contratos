<?php
class Pessoa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['pessoa_model','funcoes']);
    $this->load->database();
    $this->load->helper('url', 'form','url_helper');
    $this->load->library(['ion_auth', 'form_validation']);

    if ($this->ion_auth->logged_in())
    {
      $this->acesso = TRUE;
    }
  }

  public function index()
  {
    if ($this->ion_auth->logged_in())
    {
      $pessoas = $this->pessoa_model->get_pessoa();
      $data['pessoas'] = $pessoas;
      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('pessoa/lista_pessoas', $data);
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function create_pessoa()
  {
    if ($this->ion_auth->logged_in())
    {
      $this->form_validation->set_rules('cpf_cnpj', 'CPF/CNPJ', 'callback_validar_cpf_cnpj');
      // $this->form_validation->set_rules('titulo', 'Título do Curso', 'required|max_length[512]');
      // $this->form_validation->set_rules('data_fim', 'Data Final', 'callback_validar_data');
      if ( ! $this->form_validation->run())
      {
        // $data = $this->security->xss_clean($data);
        $this->load->view('templates/top');
			  $this->load->view('templates/menu');
			  $this->load->view('pessoa/create_pessoa');
      }
      else
      {
        $data = $this->input->post();
        //var_dump($data);die();
        
        $this->pessoa_model->set_pessoa('create');
        $this->session->set_flashdata('message_success_pessoa', 'Pessoa Cadastrada Com Sucesso.');
        redirect('/pessoas');
      }

    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  function validar_cpf_cnpj()
  {
    $cpf_cpnj = NULL;
    $cpf_cnpj = $this->funcoes->limpa_numero($this->input->post('cpf_cnpj'));
    // var_dump($cpf_cnpj);die();
    if($this->pessoa_model->have_cpf_cnpj($cpf_cnpj))
    {
      $this->form_validation->set_message('validar_cpf_cnpj', 'CPF/CNPJ já cadastrado!');
      $return = FALSE;
    }
    else
    {
      $return = TRUE;
    }
    return $return;

  }


}