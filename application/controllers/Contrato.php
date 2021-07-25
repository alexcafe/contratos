<?php
class Contrato extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['funcoes','contrato_model']);
    $this->load->database();
    $this->load->helper('url','form','url_helper');
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
      $contratos = $this->contrato_model->get_contrato();
      $data['contratos'] = $contratos;

      //Laço para inserir máscaras
      $i = 0;
      foreach ($contratos as $key => $c) {
        $data['contratos'][$i]->valor = $this->funcoes->valor_view($c->valor );
        $i++;
      }

      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('contrato/lista_contratos', $data);
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }
}
