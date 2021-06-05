<?php
class Pessoa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['pessoa_model']);
    $this->load->database();
    $this->load->helper('url', 'form');
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


}