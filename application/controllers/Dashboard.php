<?php
class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //$this->load->model(['ion_auth_model']);
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
    if ($this->acesso)
    {
      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('usr/dashboard');
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }


}
